
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pesanan - WEARLY</title>

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
            text-decoration: none;
            color: #e3d8cc;
            font-size: 14px;
            padding: 13px 15px;
            border-radius: 10px;
            transition: all .3s ease;
        }

        .menu a:hover {
            background: rgba(245, 233, 216, .13);
            color: white;
            transform: translateX(4px);
        }

        .menu a.active {
            background: linear-gradient(120deg, #f5e9d8, #d6b98c);
            color: #2f2925;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .12);
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
            background: rgba(255, 255, 255, .05);
            border: 1px solid #b99b76;
            border-radius: 10px;
            text-align: center;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all .3s ease;
        }

        .logout-button:hover {
            background: linear-gradient(120deg, #d6b98c, #f5e9d8);
            color: #2f2925;
            border-color: transparent;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 38px 45px;
            min-height: 100vh;
        }

        .topbar {
            margin-bottom: 25px;
        }

        .page-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 32px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 7px;
            letter-spacing: -.8px;
        }

        .page-subtitle {
            color: #756a63;
            font-size: 14px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #493c33;
            background: #f5e9d8;
            padding: 10px 16px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 22px;
            transition: .3s;
        }

        .back-button:hover {
            background: #d6b98c;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 22px;
        }

        .card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .04);
        }

        .card-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 18px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #eee5da;
            font-size: 13px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #81766e;
            flex-shrink: 0;
        }

        .info-value {
            color: #2f2925;
            font-weight: 600;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #f5e9d8;
            color: #896b4d;
            font-size: 11px;
            font-weight: 700;
        }

        .items-card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .04);
        }

        .items-header {
            padding: 23px 25px;
            border-bottom: 1px solid #eee5da;
        }

        .items-header h2 {
            font-family: 'DM Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th {
            background: #f5e9d8;
            color: #493c33;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            padding: 15px 20px;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid #eee5da;
            font-size: 13px;
            color: #665b54;
        }

        .product-name {
            color: #2f2925;
            font-weight: 700;
        }

        .subtotal {
            color: #896b4d;
            font-weight: 700;
        }

        .total-row td {
            border-bottom: none;
            background: #faf7f3;
        }

        .total-label {
            text-align: right;
            font-weight: 800;
            color: #2f2925;
        }

        .total-price {
            font-size: 17px;
            font-weight: 800;
            color: #896b4d;
        }

        .action-area {
            margin-top: 22px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-status {
            display: inline-block;
            text-decoration: none;
            background: linear-gradient(120deg, #493c33, #76583d);
            color: #fff;
            padding: 12px 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-status:hover {
            background: linear-gradient(120deg, #896b4d, #b99569);
            transform: translateY(-2px);
        }

        @media (max-width: 1150px) {
            .main {
                padding: 30px;
            }
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
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
                font-size: 24px;
            }

            .card {
                padding: 18px;
            }

            .info-row {
                flex-direction: column;
                gap: 6px;
            }

            .info-value {
                text-align: left;
            }

            .action-area {
                justify-content: stretch;
            }

            .btn-status {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

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

            <a href="{{ route('admin.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}">
                Produk
            </a>

            <a href="{{ route('admin.categories.index') }}">
                Kategori
            </a>

            <a href="{{ route('admin.orders.index') }}" class="active">
                Pesanan
            </a>

            <a href="{{ route('admin.users.index') }}">
                User
            </a>

        </nav>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ url('/logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    <main class="main">

        <div class="topbar">
            <h1 class="page-title">
                Detail Pesanan #{{ $order->id }}
            </h1>

            <p class="page-subtitle">
                Informasi lengkap pesanan pelanggan.
            </p>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="back-button">
            ← Kembali ke Pesanan
        </a>

        <div class="grid">

            <!-- INFORMASI PELANGGAN -->
            <div class="card">

                <h2 class="card-title">
                    Informasi Pelanggan
                </h2>

                <div class="info-row">
                    <span class="info-label">Nama</span>
                    <span class="info-value">
                        {{ $order->user->name ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-value">
                        {{ $order->user->email ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Tanggal Pesanan</span>
                    <span class="info-value">
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Status</span>
                    <span class="info-value">
                        <span class="status">
                            {{ $order->status }}
                        </span>
                    </span>
                </div>

            </div>

            <!-- INFORMASI PENGIRIMAN -->
            <div class="card">

                <h2 class="card-title">
                    Informasi Pengiriman
                </h2>

                <div class="info-row">
                    <span class="info-label">Nama Penerima</span>
                    <span class="info-value">
                        {{ $order->nama_penerima ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">No. HP</span>
                    <span class="info-value">
                        {{ $order->no_hp ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Alamat</span>
                    <span class="info-value">
                        {{ $order->alamat ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Metode Pengiriman</span>
                    <span class="info-value">
                        {{ $order->metode_pengiriman ?? '-' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Ongkos Kirim</span>
                    <span class="info-value">
                        Rp {{ number_format($order->ongkir ?? 0, 0, ',', '.') }}
                    </span>
                </div>

            </div>

        </div>

        <!-- PRODUK PESANAN -->
        <div class="items-card">

            <div class="items-header">
                <h2>Produk Pesanan</h2>
            </div>

            <div class="table-wrapper">
                <table>

                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($order->items as $item)

                            <tr>
                                <td>
                                    <span class="product-name">
                                        {{ $item->product->nama ?? 'Produk tidak tersedia' }}
                                    </span>
                                </td>

                                <td>
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    {{ $item->jumlah }}
                                </td>

                                <td>
                                    <span class="subtotal">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </span>
                                </td>
                            </tr>

                        @endforeach

                        <tr class="total-row">
                            <td colspan="3">
                                <div class="total-label">
                                    Total Pembayaran
                                </div>
                            </td>

                            <td>
                                <span class="total-price">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>

        <div class="action-area">
            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn-status">
                Ubah Status Pesanan
            </a>
        </div>

    </main>

</body>
</html>
