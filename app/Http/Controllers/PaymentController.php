<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Throwable;

class PaymentController extends Controller
{
    private function configureMidtrans(): void
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = (bool) config('midtrans.is_production');
        Config::$isSanitized = (bool) config('midtrans.is_sanitized');
        Config::$is3ds = (bool) config('midtrans.is_3ds');
    }

    public function notification(Request $request)
    {
        try {

            // Konfigurasi Midtrans
            $this->configureMidtrans();

            // Ambil notifikasi dan verifikasi status melalui Midtrans
            $notification = new Notification();

            $orderCode = $notification->order_id ?? null;
            $grossAmount = $notification->gross_amount ?? null;
            $transactionStatus = $notification->transaction_status ?? null;
            $fraudStatus = $notification->fraud_status ?? null;

            // Pastikan format ID pesanan sesuai
            if (!preg_match('/^WEARLY-(\d+)$/', (string) $orderCode, $matches)) {
                return response()->json([
                    'message' => 'Order ID tidak valid.'
                ], 400);
            }

            $order = Order::find($matches[1]);

            if (!$order) {
                return response()->json([
                    'message' => 'Pesanan tidak ditemukan.'
                ], 404);
            }

            // Pastikan nominal pembayaran sesuai dengan pesanan
            if (
                round((float) $grossAmount, 2) !==
                round((float) $order->total_harga, 2)
            ) {
                Log::warning('Nominal pembayaran Midtrans tidak sesuai.', [
                    'order_id' => $order->id,
                    'gross_amount' => $grossAmount,
                    'total_order' => $order->total_harga,
                ]);

                return response()->json([
                    'message' => 'Nominal pembayaran tidak sesuai.'
                ], 403);
            }

            DB::transaction(function () use (
                $order,
                $transactionStatus,
                $fraudStatus
            ) {

                $lockedOrder = Order::whereKey($order->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                // Jangan menurunkan status pesanan yang sudah lunas
                if ($lockedOrder->payment_status === 'paid') {
                    return;
                }

                // PEMBAYARAN BERHASIL
                if (
                    $transactionStatus === 'settlement' ||
                    (
                        $transactionStatus === 'capture' &&
                        $fraudStatus === 'accept'
                    )
                ) {
                    $lockedOrder->payment_status = 'paid';
                    $lockedOrder->save();

                    return;
                }

                // PEMBAYARAN MASIH MENUNGGU
                if ($transactionStatus === 'pending') {
                    $lockedOrder->payment_status = 'pending';
                    $lockedOrder->save();

                    return;
                }

                // PEMBAYARAN DALAM PEMERIKSAAN
                if (
                    $transactionStatus === 'capture' &&
                    $fraudStatus === 'challenge'
                ) {
                    $lockedOrder->payment_status = 'challenge';
                    $lockedOrder->save();

                    return;
                }

                // PEMBAYARAN GAGAL, DIBATALKAN, ATAU KEDALUWARSA
                if (in_array($transactionStatus, [
                    'deny',
                    'cancel',
                    'expire',
                ])) {

                    $lockedOrder->payment_status = $transactionStatus;

                    // Kembalikan stok hanya satu kali
                    if (!$lockedOrder->stock_released) {

                        $lockedOrder->load('items');

                        foreach ($lockedOrder->items as $item) {

                            Product::whereKey($item->product_id)
                                ->lockForUpdate()
                                ->increment('stok', $item->jumlah);
                        }

                        $lockedOrder->stock_released = true;
                    }

                    $lockedOrder->save();
                }
            });

            return response()->json([
                'message' => 'Notifikasi pembayaran berhasil diproses.'
            ], 200);

        } catch (Throwable $e) {

            Log::error('Gagal memproses notifikasi Midtrans.', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan saat memproses pembayaran.'
            ], 500);
        }
    }
}
