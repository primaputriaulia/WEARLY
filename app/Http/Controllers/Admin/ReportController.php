<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class ReportController extends Controller
{
    public function index()
    {
        // Ringkasan transaksi
        $totalOrders = Order::count();

        $paidQuery = Order::where('payment_status', 'paid');

        $paidOrders = (clone $paidQuery)->count();

        $totalRevenue = (clone $paidQuery)->sum('total_harga');

        $completedOrders = Order::where('status', 'Selesai')->count();

        $pendingOrders = Order::where('status', 'Menunggu')->count();

        $processingOrders = Order::where('status', 'Diproses')->count();

        $shippingOrders = Order::where('status', 'Dikirim')->count();

        // Total produk terjual dari transaksi yang sudah dibayar
        $totalItemsSold = OrderItem::whereHas('order', function ($query) {
            $query->where('payment_status', 'paid');
        })->sum('jumlah');

        // Grafik pendapatan enam bulan terakhir
        $startDate = now()->startOfMonth()->subMonths(5);
        $endDate = now();

        $salesRows = Order::where('payment_status', 'paid')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw("
                DATE_FORMAT(created_at, '%Y-%m') as bulan,
                SUM(total_harga) as pendapatan
            ")
            ->groupBy('bulan')
            ->pluck('pendapatan', 'bulan');

        $salesLabels = [];
        $salesData = [];

        for ($i = 0; $i < 6; $i++) {
            $date = $startDate->copy()->addMonths($i);
            $monthKey = $date->format('Y-m');

            $salesLabels[] = $date->translatedFormat('F Y');
            $salesData[] = (float) ($salesRows[$monthKey] ?? 0);
        }

        // Lima produk terlaris dari transaksi yang sudah dibayar
        $topProducts = OrderItem::with('product')
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 'paid');
            })
            ->selectRaw("
                product_id,
                SUM(jumlah) as total_terjual,
                SUM(subtotal) as total_penjualan
            ")
            ->groupBy('product_id')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        // Riwayat transaksi
        $orders = Order::with(['user', 'items.product'])
            ->latest()
            ->get();

        return view('admin.reports.index', compact(
            'totalOrders',
            'paidOrders',
            'totalRevenue',
            'completedOrders',
            'pendingOrders',
            'processingOrders',
            'shippingOrders',
            'totalItemsSold',
            'salesLabels',
            'salesData',
            'topProducts',
            'orders'
        ));
    }
}
