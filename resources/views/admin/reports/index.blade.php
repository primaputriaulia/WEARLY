
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reports - WEARLY</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

        .logout-button {
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

        .logout-button:hover {
            background: linear-gradient(120deg, #d6b98c, #f5e9d8);
            color: #2f2925;
            border-color: transparent;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 38px 45px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 7px;
            letter-spacing: -0.8px;
        }

        .subtitle {
            color: #756a63;
            font-size: 14px;
        }

        .print-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(120deg, #493c33, #76583d);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .print-button:hover {
            background: linear-gradient(120deg, #76583d, #9a7651);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(47, 41, 37, 0.15);
        }

        /* PRINT HEADER */
        .print-header {
            display: none;
        }

        /* SUMMARY */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 23px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, 0.04);
        }

        .summary-card::after {
            content: '';
            position: absolute;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: rgba(214, 185, 140, 0.13);
            right: -22px;
            top: -25px;
        }

        .summary-label {
            position: relative;
            z-index: 1;
            font-size: 12px;
            font-weight: 600;
            color: #81766e;
            margin-bottom: 13px;
        }

        .summary-value {
            position: relative;
            z-index: 1;
            font-size: 27px;
            font-weight: 800;
            color: #2f2925;
            overflow-wrap: anywhere;
        }

        .summary-value.revenue {
            font-size: 21px;
        }

        .summary-note {
            position: relative;
            z-index: 1;
            color: #8b7d70;
            font-size: 11px;
            margin-top: 8px;
        }

        /* CONTENT */
        .content-card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, 0.04);
        }

        .card-title {
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 5px;
        }

        .card-subtitle {
            color: #8b7d70;
            font-size: 12px;
            margin-bottom: 22px;
        }

        /* STATUS */
        .status-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .status-card {
            background: linear-gradient(145deg, #f8f5f0, #f3ece3);
            border: 1px solid #eee3d7;
            border-radius: 13px;
            padding: 19px;
        }

        .status-name {
            font-size: 13px;
            font-weight: 600;
            color: #81766e;
            margin-bottom: 9px;
        }

        .status-number {
            font-size: 26px;
            font-weight: 800;
            color: #493c33;
        }

        /* SALES CHART */
        .chart-list {
            display: flex;
            flex-direction: column;
            gap: 17px;
        }

        .chart-item {
            display: grid;
            grid-template-columns: 100px 1fr 150px;
            align-items: center;
            gap: 15px;
        }

        .chart-month {
            font-size: 12px;
            font-weight: 700;
            color: #665b54;
        }

        .chart-track {
            width: 100%;
            height: 13px;
            background: #eee7df;
            border-radius: 20px;
            overflow: hidden;
        }

        .chart-fill {
            height: 100%;
            min-width: 0;
            background: linear-gradient(90deg, #493c33, #b99569);
            border-radius: 20px;
        }

        .chart-amount {
            font-size: 12px;
            font-weight: 700;
            color: #493c33;
            text-align: right;
            white-space: nowrap;
        }

        .chart-empty {
            padding: 25px;
            text-align: center;
            color: #8b7d70;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #f5eee5;
        }

        th {
            text-align: left;
            color: #665b54;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            padding: 15px 14px;
            border-bottom: 1px solid #e1d5c8;
            white-space: nowrap;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #eee8e1;
            color: #4b433e;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #fcfaf7;
        }

        .order-id {
            color: #493c33;
            font-weight: 800;
        }

        .order-total {
            font-weight: 700;
            color: #493c33;
            white-space: nowrap;
        }

        .product-name {
            font-weight: 700;
            color: #493c33;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
            background: #eee5da;
            color: #665b54;
        }

        .status.menunggu {
            background: #f5ead9;
            color: #987342;
        }

        .status.diproses {
            background: #eee5da;
            color: #76583d;
        }

        .status.dikirim {
            background: #e9e1d8;
            color: #604d3d;
        }

        .status.selesai {
            background: #e9e5dc;
            color: #5c654e;
        }

        .status.lunas {
            background: #e9e5dc;
            color: #5c654e;
        }

        .status.pending {
            background: #f5ead9;
            color: #987342;
        }

        .status.gagal {
            background: #f2e1dc;
            color: #9b5143;
        }

        .empty-state {
            text-align: center;
            padding: 30px !important;
            color: #8b7d70;
        }

        /* REPORT FOOTER */
        .report-footer {
            border-top: 1px solid #e1d5c8;
            padding-top: 18px;
            margin-top: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            color: #81766e;
            font-size: 11px;
        }

        .report-conclusion {
            background: linear-gradient(145deg, #f5eee5, #eee3d5);
            border: 1px solid #e5d6c4;
            border-radius: 13px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .report-conclusion h3 {
            color: #493c33;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .report-conclusion p {
            color: #665b54;
            font-size: 12px;
            line-height: 1.7;
        }

        /* RESPONSIVE */
        @media (max-width: 1150px) {
            .main {
                padding: 30px;
            }

            .summary-grid {
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

            .page-title {
                font-size: 27px;
            }

            .chart-item {
                grid-template-columns: 75px 1fr;
            }

            .chart-amount {
                grid-column: 2;
                text-align: left;
                margin-top: -10px;
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

            .summary-grid,
            .status-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .summary-card,
            .content-card {
                padding: 18px;
            }

            .page-title {
                font-size: 24px;
            }

            .subtitle {
                font-size: 12px;
            }

            .summary-value {
                font-size: 24px;
            }

            .summary-value.revenue {
                font-size: 19px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        /* PRINT */
        @media print {
            @page {
                size: A4 landscape;
                margin: 12mm;
            }

            body {
                background: white !important;
                color: #2f2925 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .sidebar,
            .topbar,
            .no-print {
                display: none !important;
            }

            .main {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                min-height: auto !important;
            }

            .print-header {
                display: block !important;
                margin-bottom: 22px;
                padding-bottom: 15px;
                border-bottom: 2px solid #493c33;
            }

            .print-header h1 {
                font-size: 23px;
                letter-spacing: 1px;
                margin-bottom: 5px;
                color: #2f2925;
            }

            .print-header p {
                font-size: 10px;
                color: #756a63;
                margin-top: 4px;
            }

            .summary-grid {
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 10px;
                margin-bottom: 18px;
            }

            .summary-card,
            .content-card {
                box-shadow: none !important;
                break-inside: avoid;
                border: 1px solid #d9cec2;
            }

            .summary-card {
                padding: 15px;
            }

            .summary-value {
                font-size: 21px;
            }

            .summary-value.revenue {
                font-size: 17px;
            }

            .status-grid {
                grid-template-columns: repeat(4, 1fr) !important;
            }

            .status-card {
                padding: 12px;
            }

            .content-card {
                padding: 17px;
                margin-bottom: 16px;
            }

            .card-title {
                font-size: 15px;
            }

            .card-subtitle {
                margin-bottom: 14px;
            }

            .table-wrapper {
                overflow: visible !important;
            }

            table {
                min-width: 0 !important;
                width: 100% !important;
            }

            th,
            td {
                padding: 8px 9px !important;
                font-size: 9px !important;
            }

            thead {
                display: table-header-group;
            }

            tr {
                break-inside: avoid;
            }

            .report-conclusion {
                break-inside: avoid;
            }

            .report-footer {
                break-inside: avoid;
            }

            .chart-item {
                grid-template-columns: 90px 1fr 130px;
            }

            .chart-amount {
                grid-column: auto;
                text-align: right;
                margin-top: 0;
            }
        }
    </style>
</head>

<body>

    @php
        $maxSales = collect($salesData)->max() ?? 0;

        $paymentLabels = [
            'paid' => ['Lunas', 'lunas'],
            'pending' => ['Menunggu', 'pending'],
            'failed' => ['Gagal', 'gagal'],
            'deny' => ['Ditolak', 'gagal'],
            'expire' => ['Kedaluwarsa', 'gagal'],
            'cancel' => ['Dibatalkan', 'gagal'],
        ];
    @endphp

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="logo">
                WEAR<span>LY</span>
            </div>

            <div class="admin-label">
                ADMIN PANEL
            </div>

            <div class="menu-title">
                Menu
            </div>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}">Products</a>
                <a href="{{ route('admin.categories.index') }}">Categories</a>
                <a href="{{ route('admin.users.index') }}">Users</a>
                <a href="{{ route('admin.orders.index') }}">Orders</a>
                <a href="{{ route('admin.reports.index') }}" class="active">Reports</a>
            </nav>
        </div>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ url('/logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <h1 class="page-title">Reports</h1>
                <p class="subtitle">
                    Ringkasan transaksi dan aktivitas toko WEARLY.
                </p>
            </div>

            <button type="button" class="print-button" onclick="window.print()">
                <span>▤</span>
                Cetak Laporan
            </button>
        </div>

        <!-- PRINT HEADER -->
        <div class="print-header">
            <h1>WEARLY</h1>
            <p><strong>LAPORAN PENJUALAN DAN TRANSAKSI</strong></p>
            <p>Periode:
                {{ now()->startOfMonth()->subMonths(5)->translatedFormat('F Y') }}
                sampai {{ now()->translatedFormat('F Y') }}
            </p>
            <p>Tanggal Cetak: {{ now()->translatedFormat('d F Y, H:i') }}</p>
        </div>

        <!-- SUMMARY -->
        <div class="summary-grid">

            <div class="summary-card">
                <div class="summary-label">Total Pesanan</div>
                <div class="summary-value">
                    {{ number_format($totalOrders, 0, ',', '.') }}
                </div>
                <div class="summary-note">Seluruh pesanan yang tercatat</div>
            </div>

            <div class="summary-card">
                <div class="summary-label">Transaksi Lunas</div>
                <div class="summary-value">
                    {{ number_format($paidOrders, 0, ',', '.') }}
                </div>
                <div class="summary-note">Pembayaran berhasil</div>
            </div>

            <div class="summary-card">
                <div class="summary-label">Produk Terjual</div>
                <div class="summary-value">
                    {{ number_format($totalItemsSold, 0, ',', '.') }}
                </div>
                <div class="summary-note">Dari transaksi yang sudah dibayar</div>
            </div>

            <div class="summary-card">
                <div class="summary-label">Total Pendapatan</div>
                <div class="summary-value revenue">
                    Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </div>
                <div class="summary-note">Dari transaksi yang sudah dibayar</div>
            </div>

        </div>

        <!-- STATUS PESANAN -->
        <div class="content-card">
            <h2 class="card-title">Rekapitulasi Status Pesanan</h2>
            <p class="card-subtitle">
                Jumlah pesanan berdasarkan status pemrosesan saat ini.
            </p>

            <div class="status-grid">

                <div class="status-card">
                    <div class="status-name">Menunggu</div>
                    <div class="status-number">
                        {{ number_format($pendingOrders, 0, ',', '.') }}
                    </div>
                </div>

                <div class="status-card">
                    <div class="status-name">Diproses</div>
                    <div class="status-number">
                        {{ number_format($processingOrders, 0, ',', '.') }}
                    </div>
                </div>

                <div class="status-card">
                    <div class="status-name">Dikirim</div>
                    <div class="status-number">
                        {{ number_format($shippingOrders, 0, ',', '.') }}
                    </div>
                </div>

                <div class="status-card">
                    <div class="status-name">Selesai</div>
                    <div class="status-number">
                        {{ number_format($completedOrders, 0, ',', '.') }}
                    </div>
                </div>

            </div>
        </div>

        <!-- GRAFIK PENJUALAN -->
        <div class="content-card">
            <h2 class="card-title">Grafik Pendapatan Bulanan</h2>
            <p class="card-subtitle">
                Perbandingan pendapatan dari transaksi lunas selama enam bulan terakhir.
            </p>

            @if ($maxSales > 0)
                <div class="chart-list">
                    @foreach ($salesLabels as $index => $label)
                        @php
                            $amount = $salesData[$index] ?? 0;
                            $percentage = $maxSales > 0 ? ($amount / $maxSales) * 100 : 0;
                        @endphp

                        <div class="chart-item">
                            <div class="chart-month">{{ $label }}</div>

                            <div class="chart-track">
                                <div class="chart-fill"
                                    style="width: {{ $percentage }}%;">
                                </div>
                            </div>

                            <div class="chart-amount">
                                Rp {{ number_format($amount, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="chart-empty">
                    Belum terdapat pendapatan dari transaksi lunas pada periode ini.
                </div>
            @endif
        </div>

        <!-- PRODUK TERLARIS -->
        <div class="content-card">
            <h2 class="card-title">Produk Terlaris</h2>
            <p class="card-subtitle">
                Lima produk dengan jumlah penjualan tertinggi dari transaksi lunas.
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Terjual</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($topProducts as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td class="product-name">
                                    {{ $item->product->nama_produk ?? $item->product->nama ?? 'Produk tidak tersedia' }}
                                </td>

                                <td>
                                    {{ number_format($item->total_terjual, 0, ',', '.') }} pcs
                                </td>

                                <td class="order-total">
                                    Rp {{ number_format($item->total_penjualan, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    Belum ada data produk terjual.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RIWAYAT TRANSAKSI -->
        <div class="content-card">
            <h2 class="card-title">Riwayat Transaksi</h2>
            <p class="card-subtitle">
                Daftar pesanan beserta informasi pelanggan, pengiriman, dan pembayaran.
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Penerima</th>
                            <th>Pengiriman</th>
                            <th>Total</th>
                            <th>Status Pesanan</th>
                            <th>Pembayaran</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $order)
                            @php
                                $statusClass = match ($order->status) {
                                    'Menunggu' => 'menunggu',
                                    'Diproses' => 'diproses',
                                    'Dikirim' => 'dikirim',
                                    'Selesai' => 'selesai',
                                    default => '',
                                };

                                $payment = $paymentLabels[$order->payment_status ?? ''] ?? [
                                    ($order->payment_status ?: 'Belum Dibayar'),
                                    'pending'
                                ];
                            @endphp

                            <tr>
                                <td class="order-id">#{{ $order->id }}</td>

                                <td>
                                    {{ $order->user->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $order->nama_penerima ?? '-' }}
                                </td>

                                <td>
                                    {{ $order->metode_pengiriman ?? '-' }}
                                </td>

                                <td class="order-total">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="status {{ $statusClass }}">
                                        {{ $order->status }}
                                    </span>
                                </td>

                                <td>
                                    <span class="status {{ $payment[1] }}">
                                        {{ $payment[0] }}
                                    </span>
                                </td>

                                <td>
                                    {{ $order->created_at->format('d/m/Y') }}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="empty-state">
                                    Belum ada transaksi yang tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- KESIMPULAN -->
        <div class="report-conclusion">
            <h3>Ringkasan Hasil Penjualan</h3>

            <p>
                Berdasarkan data transaksi toko WEARLY, tercatat sebanyak
                <strong>{{ number_format($totalOrders, 0, ',', '.') }} pesanan</strong>
                dengan
                <strong>{{ number_format($paidOrders, 0, ',', '.') }} transaksi lunas</strong>.
                Total produk yang terjual dari transaksi yang telah dibayar adalah
                <strong>{{ number_format($totalItemsSold, 0, ',', '.') }} produk</strong>,
                dengan total pendapatan sebesar
                <strong>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</strong>.
                Data ini dapat digunakan sebagai bahan evaluasi penjualan dan pengelolaan
                toko WEARLY.
            </p>
        </div>

        <!-- FOOTER -->
        <div class="report-footer">
            <div>
                <strong>WEARLY</strong><br>
                Laporan Penjualan dan Transaksi
            </div>

            <div style="text-align: right;">
                Dicetak pada {{ now()->translatedFormat('d F Y, H:i') }}<br>
                Dokumen laporan administrasi WEARLY
            </div>
        </div>

    </main>

</body>
</html>
