<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function index()
    {
        // STATISTIK UTAMA
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalUsers = User::where('role', 'user')->count();

        $totalOrders = Order::count();

        // Hanya pembayaran yang berhasil dihitung sebagai pendapatan
        $paidQuery = Order::where('payment_status', 'paid');

        $paidOrders = (clone $paidQuery)->count();

        $totalRevenue = (clone $paidQuery)->sum('total_harga');

        // STATUS PESANAN
        $pendingOrders = Order::where('status', 'Menunggu')->count();

        $processingOrders = Order::where('status', 'Diproses')->count();

        $shippingOrders = Order::where('status', 'Dikirim')->count();

        $completedOrders = Order::where('status', 'Selesai')->count();

        // PESANAN TERBARU
        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        // GRAFIK PENJUALAN 6 BULAN TERAKHIR
        $startDate = now()->startOfMonth()->subMonths(5);
        $endDate = now();

        $salesRows = Order::where('payment_status', 'paid')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, SUM(total_harga) as pendapatan")
            ->groupBy('bulan')
            ->pluck('pendapatan', 'bulan');

        $salesLabels = [];
        $salesData = [];

        for ($i = 0; $i < 6; $i++) {
            $date = $startDate->copy()->addMonths($i);
            $monthKey = $date->format('Y-m');

            $salesLabels[] = $date->format('M Y');
            $salesData[] = (float) ($salesRows[$monthKey] ?? 0);
        }

        // 5 PRODUK TERLARIS DARI PESANAN YANG SUDAH DIBAYAR
        $topProducts = OrderItem::with('product')
            ->whereHas('order', function ($query) {
                $query->where('payment_status', 'paid');
            })
            ->selectRaw('product_id, SUM(jumlah) as total_terjual, SUM(subtotal) as total_penjualan')
            ->groupBy('product_id')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'paidOrders',
            'totalRevenue',
            'pendingOrders',
            'processingOrders',
            'shippingOrders',
            'completedOrders',
            'latestOrders',
            'salesLabels',
            'salesData',
            'topProducts'
        ));
    }
}
