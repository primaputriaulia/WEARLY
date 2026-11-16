
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WEARLY - Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f5f0;
            color: #2f2925;
        }

        a {
            text-decoration: none;
        }

        .layout {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(160deg, #211914 0%, #38271e 48%, #76583d 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            padding: 32px 20px;
            display: flex;
            flex-direction: column;
            box-shadow: 5px 0 25px rgba(47, 41, 37, 0.12);
            z-index: 10;
        }

        .logo {
            color: #f5e9d8;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-left: 10px;
        }

        .logo span {
            color: #d6b98c;
        }

        .admin-label {
            color: #c5b5a5;
            font-size: 11px;
            letter-spacing: 2px;
            margin: 6px 0 40px 11px;
        }

        .menu-title {
            color: #b8a898;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 0 12px 12px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu a {
            color: #e3d8cc;
            font-size: 14px;
            padding: 13px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .menu a:hover {
            background: rgba(245, 233, 216, 0.13);
            color: white;
            transform: translateX(4px);
        }

        .menu a.active {
            background: linear-gradient(120deg, #f5e9d8, #d6b98c);
            color: #2f2925;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }

        .sidebar-bottom {
            margin-top: auto;
            width: 100%;
        }

        .logout-form {
            width: 100%;
            margin: 0;
        }

        .logout-form button {
            display: block;
            width: 100%;
            padding: 12px 20px;
            color: #f5e9d8;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid #b99b76;
            border-radius: 10px;
            text-align: center;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-form button:hover {
            background: linear-gradient(120deg, #d6b98c, #f5e9d8);
            color: #2f2925;
            border-color: transparent;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 38px 45px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 32px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 7px;
            letter-spacing: -0.8px;
        }

        .page-subtitle {
            color: #756a63;
            font-size: 14px;
        }

        .admin-profile {
            background: linear-gradient(120deg, #ffffff, #f5e9d8);
            border: 1px solid #e8d8c3;
            border-radius: 30px;
            padding: 11px 20px;
            font-size: 13px;
            color: #665b54;
            box-shadow: 0 4px 12px rgba(47, 41, 37, 0.04);
            white-space: nowrap;
        }

        .admin-profile strong {
            color: #493c33;
        }

        /* STATISTICS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 22px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(
                135deg,
                #493c33 0%,
                #654c39 50%,
                #896b4d 100%
            );
            border: 1px solid rgba(214, 185, 140, 0.35);
            border-radius: 17px;
            padding: 25px;
            min-height: 135px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(47, 41, 37, 0.12);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(47, 41, 37, 0.2);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-title {
            color: #e8d8c3;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-number {
            color: #ffffff;
            font-size: 32px;
            font-weight: 800;
        }

        .stat-note {
            color: #d6b98c;
            font-size: 11px;
            margin-top: 7px;
        }

        /* PANELS */

        .panel {
            background: linear-gradient(145deg, #ffffff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, 0.04);
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .panel-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
        }

        .panel-subtitle {
            color: #8b7d70;
            font-size: 12px;
            margin-top: 5px;
        }

        .chart-panel {
            margin-bottom: 22px;
        }

        .chart-wrapper {
            position: relative;
            width: 100%;
            height: 310px;
        }

        /* ORDER STATUS */

        .status-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .status-card {
            background: linear-gradient(135deg, #fff, #f3e9dc);
            border: 1px solid #eadfd2;
            border-radius: 13px;
            padding: 17px;
        }

        .status-card span {
            display: block;
            color: #756a63;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .status-card strong {
            color: #493c33;
            font-size: 23px;
            font-weight: 800;
        }

        /* LOWER CONTENT */

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            margin-bottom: 22px;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 580px;
        }

        th {
            text-align: left;
            color: #8b7d70;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 13px 10px;
            border-bottom: 1px solid #eadfd2;
        }

        td {
            color: #493c33;
            font-size: 12px;
            padding: 15px 10px;
            border-bottom: 1px solid #f0e9e1;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fcf8f2;
        }

        .order-code {
            font-weight: 800;
            color: #493c33;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-menunggu,
        .payment-pending {
            background: #fff0d5;
            color: #98651e;
        }

        .status-diproses {
            background: #e8e0f5;
            color: #674a91;
        }

        .status-dikirim {
            background: #e0edf8;
            color: #37688e;
        }

        .status-selesai,
        .payment-paid {
            background: #e4f0e4;
            color: #46734a;
        }

        .payment-challenge {
            background: #f5e6d8;
            color: #8b5b2b;
        }

        .payment-failed {
            background: #f8e2df;
            color: #a44338;
        }

        .empty-state {
            text-align: center;
            padding: 28px 10px;
            color: #9a8d81;
            font-size: 13px;
        }

        /* TOP PRODUCTS */

        .product-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .product-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #f0e9e1;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-info {
            min-width: 0;
        }

        .product-name {
            color: #493c33;
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .product-detail {
            color: #94877b;
            font-size: 11px;
            margin-top: 5px;
        }

        .product-sold {
            color: #76583d;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        /* QUICK ACCESS */

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .quick-menu a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(120deg, #f8f5f0, #f1e7da);
            border: 1px solid #eadfd2;
            border-radius: 11px;
            color: #493c33;
            font-size: 12px;
            font-weight: 700;
            padding: 15px;
            transition: all 0.3s ease;
        }

        .quick-menu a:hover {
            background: linear-gradient(120deg, #e8d8c3, #d6b98c);
            border-color: #d6b98c;
            transform: translateY(-3px);
        }

        .arrow {
            color: #9a7651;
            font-size: 17px;
            font-weight: bold;
        }

        .footer-note {
            text-align: center;
            color: #a09387;
            font-size: 11px;
            margin-top: 25px;
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .main {
                padding: 30px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .quick-menu {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 190px;
                padding: 25px 13px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
                padding: 24px 18px;
            }

            .status-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 550px) {
            .sidebar {
                width: 155px;
                padding: 22px 10px;
            }

            .logo {
                font-size: 23px;
            }

            .menu a {
                font-size: 12px;
                padding: 12px 10px;
            }

            .main {
                margin-left: 155px;
                width: calc(100% - 155px);
                padding: 20px 12px;
            }

            .page-title {
                font-size: 25px;
            }

            .page-subtitle {
                font-size: 12px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                min-height: 125px;
                padding: 19px;
            }

            .stat-number {
                font-size: 25px;
            }

            .status-grid {
                grid-template-columns: 1fr 1fr;
                gap: 9px;
            }

            .panel {
                padding: 17px;
            }

            .quick-menu {
                grid-template-columns: 1fr;
            }

            .chart-wrapper {
                height: 240px;
            }

            .admin-profile {
                font-size: 11px;
                padding: 9px 13px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>
            <div class="logo">WEAR<span>LY</span></div>

            <div class="admin-label">ADMIN PANEL</div>

            <div class="menu-title">Menu</div>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
                <a href="{{ route('admin.products.index') }}">Products</a>
                <a href="{{ route('admin.categories.index') }}">Categories</a>
                <a href="{{ route('admin.users.index') }}">Users</a>
                <a href="{{ route('admin.orders.index') }}">Orders</a>
                <a href="{{ route('admin.reports.index') }}">Reports</a>
            </nav>
        </div>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ url('/logout') }}" class="logout-form">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">
                    Ringkasan aktivitas dan performa toko online WEARLY.
                </p>
            </div>

            <div class="admin-profile">
                Admin · <strong>{{ auth()->user()->name }}</strong>
            </div>
        </div>

        <!-- STATISTICS -->
        <section class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">TOTAL PRODUCTS</div>
                        <div class="stat-number">{{ number_format($totalProducts) }}</div>
                        <div class="stat-note">Produk dalam katalog</div>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">TOTAL USERS</div>
                        <div class="stat-number">{{ number_format($totalUsers) }}</div>
                        <div class="stat-note">Pengguna terdaftar</div>
                    </div>
                    
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">TOTAL ORDERS</div>
                        <div class="stat-number">{{ number_format($totalOrders) }}</div>
                        <div class="stat-note">{{ number_format($paidOrders) }} pesanan sudah dibayar</div>
                    </div>
                    
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">TOTAL REVENUE</div>
                        <div class="stat-number" style="font-size: 22px;">
                            Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                        </div>
                        <div class="stat-note">Dari pembayaran berhasil</div>
                    </div>
                    <div class="stat-icon">💰</div>
                </div>
            </div>

        </section>

        <!-- SALES CHART -->
        <section class="panel chart-panel">

            <div class="panel-heading">
                <div>
                    <h2 class="panel-title">Sales Overview</h2>
                    <p class="panel-subtitle">
                        Pendapatan dari transaksi berhasil selama 6 bulan terakhir
                    </p>
                </div>
            </div>

            <div class="chart-wrapper">
                <canvas id="salesChart"></canvas>
            </div>

        </section>

        <!-- ORDER STATUS -->
        <section class="status-grid">

            <div class="status-card">
                <span>Menunggu</span>
                <strong>{{ number_format($pendingOrders) }}</strong>
            </div>

            <div class="status-card">
                <span>Diproses</span>
                <strong>{{ number_format($processingOrders) }}</strong>
            </div>

            <div class="status-card">
                <span>Dikirim</span>
                <strong>{{ number_format($shippingOrders) }}</strong>
            </div>

            <div class="status-card">
                <span>Selesai</span>
                <strong>{{ number_format($completedOrders) }}</strong>
            </div>

        </section>

        <!-- LATEST ORDERS & TOP PRODUCTS -->
        <section class="content-grid">

            <!-- LATEST ORDERS -->
            <div class="panel">

                <div class="panel-heading">
                    <div>
                        <h2 class="panel-title">Recent Orders</h2>
                        <p class="panel-subtitle">Lima pesanan terbaru di WEARLY</p>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($latestOrders as $order)
                                @php
                                    $statusClass = match($order->status) {
                                        'Menunggu' => 'status-menunggu',
                                        'Diproses' => 'status-diproses',
                                        'Dikirim' => 'status-dikirim',
                                        'Selesai' => 'status-selesai',
                                        default => ''
                                    };

                                    $paymentClass = match($order->payment_status) {
                                        'paid' => 'payment-paid',
                                        'pending' => 'payment-pending',
                                        'challenge' => 'payment-challenge',
                                        'deny', 'cancel', 'expire' => 'payment-failed',
                                        default => ''
                                    };
                                @endphp

                                <tr>
                                    <td class="order-code">#{{ $order->id }}</td>

                                    <td>
                                        {{ $order->user->name ?? $order->nama_penerima }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <span class="status-badge {{ $statusClass }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="status-badge {{ $paymentClass }}">
                                            {{ ucfirst($order->payment_status ?? 'pending') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-state">
                                        Belum ada pesanan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- TOP PRODUCTS -->
            <div class="panel">

                <div class="panel-heading">
                    <div>
                        <h2 class="panel-title">Best Selling Products</h2>
                        <p class="panel-subtitle">Produk terlaris dari pesanan yang sudah dibayar</p>
                    </div>
                </div>

                <div class="product-list">

                    @forelse($topProducts as $item)
                        <div class="product-item">

                            <div class="product-info">
                                <div class="product-name">
                                    {{ $item->product->nama ?? 'Produk tidak tersedia' }}
                                </div>

                                <div class="product-detail">
                                    Penjualan: Rp {{ number_format($item->total_penjualan, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="product-sold">
                                {{ number_format($item->total_terjual) }} terjual
                            </div>

                        </div>
                    @empty
                        <div class="empty-state">
                            Belum ada data penjualan produk.
                        </div>
                    @endforelse

                </div>

            </div>

        </section>

        <!-- QUICK ACCESS -->
        <section class="panel">

            <div class="panel-heading">
                <div>
                    <h2 class="panel-title">Quick Access</h2>
                    <p class="panel-subtitle">Akses cepat pengelolaan toko</p>
                </div>
            </div>

            <div class="quick-menu">

                <a href="{{ route('admin.products.index') }}">
                    <span>Manage Products</span>
                    <span class="arrow">→</span>
                </a>

                <a href="{{ route('admin.categories.index') }}">
                    <span>Manage Categories</span>
                    <span class="arrow">→</span>
                </a>

                <a href="{{ route('admin.users.index') }}">
                    <span>Manage Users</span>
                    <span class="arrow">→</span>
                </a>

                <a href="{{ route('admin.orders.index') }}">
                    <span>View Orders</span>
                    <span class="arrow">→</span>
                </a>

            </div>

        </section>

        <div class="footer-note">
            © {{ date('Y') }} WEARLY Admin Panel · Fashion & Lifestyle
        </div>

    </main>

</div>

<script>
    const salesLabels = @json($salesLabels);
    const salesData = @json($salesData);

    const chartContext = document.getElementById('salesChart');

    new Chart(chartContext, {
        type: 'line',

        data: {
            labels: salesLabels,

            datasets: [{
                label: 'Pendapatan',
                data: salesData,

                borderColor: '#8b6848',
                backgroundColor: 'rgba(214, 185, 140, 0.22)',

                borderWidth: 3,
                fill: true,
                tension: 0.4,

                pointBackgroundColor: '#493c33',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Pendapatan: Rp ' +
                                new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            },

            scales: {
                y: {
                    beginAtZero: true,

                    ticks: {
                        callback: function(value) {
                            return 'Rp ' +
                                new Intl.NumberFormat('id-ID', {
                                    notation: 'compact'
                                }).format(value);
                        }
                    },

                    grid: {
                        color: 'rgba(118, 91, 69, 0.09)'
                    }
                },

                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>

</body>
</html>
