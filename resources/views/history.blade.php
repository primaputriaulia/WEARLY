
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Belanja - WEARLY</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --dark: #302720;
            --brown: #493c33;
            --mocha: #765b46;
            --gold: #c7a77e;
            --cream: #f5eee5;
            --bg: #f8f5f0;
            --white: #fffdfa;
            --muted: #96877a;
            --border: #ece3d9;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--dark);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* NAVBAR */
        .navbar {
            position: sticky;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
            height: 76px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg);
            border-bottom: 1px solid rgba(73, 60, 51, .08);
            box-shadow: 0 3px 15px rgba(47, 37, 29, .035);
        }

        .logo {
            color: var(--brown);
            font-size: 27px;
            font-weight: 800;
            letter-spacing: 2px;
            flex-shrink: 0;
        }

        .logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 34px;
        }

        .nav-links a {
            color: #817469;
            font-size: 13px;
            font-weight: 600;
            transition: .3s;
            position: relative;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: var(--mocha);
        }

        .nav-links .active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -9px;
            width: 100%;
            height: 2px;
            background: var(--gold);
        }

        /* HERO */
        .hero {
            min-height: 245px;
            background:
                radial-gradient(circle at 85% 20%, rgba(199,167,126,.16), transparent 28%),
                linear-gradient(115deg, #302720, #49392e 70%, #5b4534);
            padding: 48px 8% 75px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: 'WEARLY';
            position: absolute;
            right: -15px;
            bottom: -65px;
            font-size: clamp(100px, 17vw, 210px);
            font-weight: 800;
            letter-spacing: 12px;
            color: rgba(255,255,255,.035);
            white-space: nowrap;
            pointer-events: none;
        }

        .hero-content {
            max-width: 1150px;
            margin: auto;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            color: #fffaf3;
            font-size: clamp(29px, 4vw, 39px);
            line-height: 1.2;
            font-weight: 700;
            letter-spacing: -.8px;
        }

        .hero-description {
            color: #c8b9a9;
            font-size: 12px;
            line-height: 1.7;
            margin-top: 11px;
        }

        /* MAIN */
        .container {
            width: 86%;
            max-width: 1150px;
            margin: -62px auto 90px;
            position: relative;
            z-index: 2;
        }

        /* SUMMARY */
        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
            margin-bottom: 43px;
        }

        .summary-card {
            background: var(--white);
            border: 1px solid rgba(236,227,217,.8);
            border-radius: 17px;
            padding: 23px 25px;
            min-height: 135px;
            box-shadow: 0 12px 35px rgba(47,37,29,.055);
            position: relative;
            overflow: hidden;
            transition: .35s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 17px 35px rgba(47,37,29,.09);
        }

        .summary-card::after {
            content: '';
            position: absolute;
            right: -25px;
            bottom: -40px;
            width: 115px;
            height: 115px;
            border-radius: 50%;
            background: var(--cream);
            opacity: .7;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 1;
        }

        .summary-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.1px;
            text-transform: uppercase;
        }

        .summary-icon {
            width: 37px;
            height: 37px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cream);
            color: var(--mocha);
            font-size: 17px;
        }

        .summary-card h2 {
            position: relative;
            z-index: 1;
            color: var(--brown);
            font-size: 29px;
            font-weight: 800;
            margin-top: 13px;
            letter-spacing: -.8px;
        }

        .summary-card.total-spending h2 {
            font-size: clamp(19px, 2.3vw, 25px);
        }

        /* SECTION HEADING */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 15px;
            margin-bottom: 21px;
        }

        .section-heading h2 {
            color: var(--dark);
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.6px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 5px;
        }

        .order-count {
            color: var(--mocha);
            background: #eee5da;
            padding: 8px 13px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* FILTER */
        .filter-wrapper {
            display: flex;
            align-items: center;
            gap: 9px;
            overflow-x: auto;
            padding: 3px 2px 15px;
            margin-bottom: 8px;
            scrollbar-width: none;
        }

        .filter-wrapper::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            flex-shrink: 0;
            border: 1px solid #e8ded3;
            background: var(--white);
            color: #817469;
            padding: 10px 17px;
            border-radius: 30px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 700;
            transition: .3s ease;
        }

        .filter-btn:hover {
            border-color: var(--mocha);
            color: var(--mocha);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--dark);
            border-color: var(--dark);
            color: #fffaf3;
            box-shadow: 0 5px 15px rgba(48,39,32,.16);
        }

        /* ORDER CARD */
        .order-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            margin-bottom: 19px;
            padding: 25px 27px;
            box-shadow: 0 5px 20px rgba(47,37,29,.035);
            transition: transform .35s, box-shadow .35s, border-color .35s;
            animation: fadeUp .55s ease both;
        }

        .order-card:hover {
            transform: translateY(-4px);
            border-color: #d7c3ac;
            box-shadow: 0 14px 30px rgba(47,37,29,.075);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .order-identity {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .store-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            border-radius: 13px;
            background: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 19px;
        }

        .store-info .store-name {
            color: var(--brown);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .store-info p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 5px;
        }

        .order-number {
            color: var(--mocha);
            font-weight: 800;
        }

        .status-group {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .status {
            padding: 8px 12px;
            border-radius: 30px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
            letter-spacing: .2px;
        }

        .status::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            margin-right: 6px;
            vertical-align: 1px;
        }

        .status-paid,
        .status-complete {
            background: #e9eee5;
            color: #61754e;
        }

        .status-pending {
            background: #f8eedc;
            color: #a47a3d;
        }

        .status-failed {
            background: #f5e6e2;
            color: #a45e52;
        }

        .status-process {
            background: #ece8df;
            color: #8b704e;
        }

        .status-shipped {
            background: #e5eceb;
            color: #557a75;
        }

        .status-other {
            background: #eee9e3;
            color: #756a63;
        }

        /* PRODUCT */
        .product-list {
            display: flex;
            flex-direction: column;
            gap: 17px;
            padding: 23px 0;
        }

        .product-item {
            display: flex;
            align-items: center;
            gap: 19px;
        }

        .product-image,
        .product-placeholder {
            width: 94px;
            height: 105px;
            border-radius: 12px;
            background: #f2ece4;
            object-fit: cover;
            flex-shrink: 0;
            transition: .35s;
        }

        .product-item:hover .product-image {
            transform: scale(1.035);
        }

        .product-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--mocha);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .product-info {
            flex: 1;
            min-width: 0;
        }

        .product-info h3 {
            color: var(--brown);
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .product-info p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.9;
        }

        .product-price {
            color: var(--brown);
            font-weight: 800;
            font-size: 13px;
            white-space: nowrap;
            align-self: center;
        }

        /* ORDER FOOTER */
        .order-footer {
            border-top: 1px solid var(--border);
            padding-top: 19px;
        }

        .order-footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 19px;
        }

        .total-caption {
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
        }

        .total-value {
            color: var(--mocha);
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.5px;
            margin-top: 4px;
        }

        .order-actions {
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 19px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 800;
            transition: .3s ease;
            cursor: pointer;
        }

        .btn-detail {
            background: #eee6dc;
            color: var(--brown);
            border: 1px solid #e6d9ca;
        }

        .btn-detail:hover {
            background: #dfcbb4;
            transform: translateY(-2px);
        }

        .btn-pay {
            background: var(--dark);
            color: #fffaf3;
        }

        .btn-pay:hover {
            background: var(--mocha);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(48,39,32,.15);
        }

        /* EMPTY STATE */
        .empty-state {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 75px 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(47,37,29,.04);
        }

        .empty-icon {
            width: 85px;
            height: 85px;
            margin: 0 auto 23px;
            border-radius: 50%;
            background: var(--cream);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--mocha);
            font-size: 35px;
        }

        .empty-state h2 {
            color: var(--brown);
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 11px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .empty-state a {
            display: inline-flex;
            padding: 13px 24px;
            border-radius: 9px;
            background: var(--dark);
            color: white;
            font-size: 12px;
            font-weight: 800;
            transition: .3s;
        }

        .empty-state a:hover {
            background: var(--mocha);
            transform: translateY(-2px);
        }

        .no-filter-result {
            display: none;
            text-align: center;
            color: var(--muted);
            padding: 45px 20px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            font-size: 13px;
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            padding: 28px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            color: #bdb0a3;
            font-size: 11px;
        }

        .footer strong {
            color: var(--gold);
            letter-spacing: 1.5px;
        }

        /* RESPONSIVE */
        @media(max-width: 850px) {
            .navbar {
                padding: 0 6%;
            }

            .container {
                width: 90%;
            }

            .hero {
                padding-left: 6%;
                padding-right: 6%;
            }

            .order-card {
                padding: 21px;
            }

            .summary-card {
                padding: 19px;
            }
        }

        @media(max-width: 650px) {
            .navbar {
                height: 68px;
                padding: 0 5%;
            }

            .logo {
                font-size: 23px;
            }

            .nav-links {
                gap: 14px;
            }

            .nav-links a {
                font-size: 10px;
            }

            .hero {
                min-height: 215px;
                padding: 42px 6% 75px;
            }

            .hero h1 {
                font-size: 31px;
            }

            .hero-description {
                font-size: 11px;
            }

            .container {
                width: 92%;
                margin-top: -50px;
                margin-bottom: 55px;
            }

            .summary {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
                margin-bottom: 33px;
            }

            .summary-card {
                min-height: 115px;
                padding: 16px;
                border-radius: 13px;
            }

            .summary-card:last-child {
                grid-column: span 2;
            }

            .summary-card h2 {
                font-size: 24px;
                margin-top: 10px;
            }

            .summary-card.total-spending h2 {
                font-size: 22px;
            }

            .summary-label {
                font-size: 9px;
            }

            .summary-icon {
                width: 31px;
                height: 31px;
                font-size: 14px;
            }

            .section-heading h2 {
                font-size: 19px;
            }

            .section-heading p {
                font-size: 10px;
            }

            .order-count {
                font-size: 9px;
                padding: 7px 10px;
            }

            .order-card {
                padding: 17px;
                border-radius: 14px;
            }

            .order-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 13px;
            }

            .status-group {
                justify-content: flex-start;
            }

            .status {
                font-size: 9px;
                padding: 7px 10px;
            }

            .product-item {
                gap: 12px;
                align-items: center;
            }

            .product-image,
            .product-placeholder {
                width: 76px;
                height: 86px;
                border-radius: 9px;
            }

            .product-info h3 {
                font-size: 12px;
            }

            .product-info p {
                font-size: 10px;
            }

            .product-price {
                font-size: 11px;
            }

            .total-value {
                font-size: 18px;
            }

            .order-footer-top {
                align-items: flex-start;
            }

            .order-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .btn {
                padding: 12px 9px;
                font-size: 10px;
            }

            .footer {
                flex-direction: column;
                text-align: center;
                padding: 25px 5%;
            }
        }

        @media(max-width: 380px) {
            .navbar {
                padding: 0 4%;
            }

            .nav-links {
                gap: 9px;
            }

            .nav-links a {
                font-size: 9px;
            }

            .logo {
                font-size: 20px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .product-item {
                flex-wrap: wrap;
            }

            .product-price {
                margin-left: 88px;
                margin-top: -8px;
            }
        }

        @media(prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <a href="{{ route('user.dashboard') }}" class="logo">
            WEAR<span>LY</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('user.dashboard') }}">Home</a>
            <a href="{{ route('user.history') }}" class="active">Riwayat Belanja</a>
            <a href="{{ route('cart.index') }}">Keranjang</a>
        </div>
    </nav>

    @php
        $totalPesanan = $orders->count();

        $totalSelesai = $orders->filter(function ($order) {
            return strtolower($order->status ?? '') === 'selesai';
        })->count();

        $totalBelanja = $orders->filter(function ($order) {
            return strtolower($order->payment_status ?? '') === 'paid';
        })->sum('total_harga');
    @endphp

    {{-- HERO --}}
    <section class="hero">
        <div class="hero-content">
            <h1>Riwayat Belanja</h1>

            <p class="hero-description">
                Lihat dan pantau semua pesananmu di WEARLY.
            </p>
        </div>
    </section>

    <main class="container">

        {{-- SUMMARY --}}
        <section class="summary">

            <div class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Total Pesanan</p>
                    <div class="summary-icon">▤</div>
                </div>
                <h2>{{ $totalPesanan }}</h2>
            </div>

            <div class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Pesanan Selesai</p>
                    <div class="summary-icon">✓</div>
                </div>
                <h2>{{ $totalSelesai }}</h2>
            </div>

            <div class="summary-card total-spending">
                <div class="summary-top">
                    <p class="summary-label">Total Belanja Lunas</p>
                    <div class="summary-icon">Rp</div>
                </div>
                <h2>Rp {{ number_format($totalBelanja, 0, ',', '.') }}</h2>
            </div>

        </section>

        {{-- ORDER SECTION --}}
        <section class="order-section">

            <div class="section-heading">
                <div>
                    <h2>Order Collection</h2>
                    <p>Temukan dan pantau semua pesananmu.</p>
                </div>

                <div class="order-count">
                    {{ $totalPesanan }} PESANAN
                </div>
            </div>

            {{-- FILTER --}}
            <div class="filter-wrapper">

                <button class="filter-btn active" data-filter="semua">
                    Semua Pesanan
                </button>

                <button class="filter-btn" data-filter="menunggu">
                    Menunggu Pembayaran
                </button>

                <button class="filter-btn" data-filter="diproses">
                    Diproses
                </button>

                <button class="filter-btn" data-filter="dikirim">
                    Dikirim
                </button>

                <button class="filter-btn" data-filter="selesai">
                    Selesai
                </button>

                <button class="filter-btn" data-filter="dibatalkan">
                    Dibatalkan
                </button>

            </div>

            {{-- ORDER LIST --}}
            @forelse($orders as $order)

                @php
                    $paymentStatus = strtolower($order->payment_status ?? 'pending');
                    $orderStatus = strtolower($order->status ?? '');

                    $isFailed = in_array($paymentStatus, [
                        'deny', 'cancel', 'expire', 'error'
                    ]);

                    if ($isFailed) {
                        $filterStatus = 'dibatalkan';
                        $paymentLabel = 'Pembayaran Gagal';
                        $paymentClass = 'status-failed';
                    } elseif ($paymentStatus === 'paid') {
                        $paymentLabel = 'Lunas';
                        $paymentClass = 'status-paid';
                    } else {
                        $paymentLabel = 'Menunggu Pembayaran';
                        $paymentClass = 'status-pending';
                    }

                    if ($isFailed) {
                        $filterStatus = 'dibatalkan';
                    } elseif (str_contains($orderStatus, 'selesai')) {
                        $filterStatus = 'selesai';
                    } elseif (str_contains($orderStatus, 'dikirim')) {
                        $filterStatus = 'dikirim';
                    } elseif (str_contains($orderStatus, 'diproses')) {
                        $filterStatus = 'diproses';
                    } elseif ($paymentStatus !== 'paid') {
                        $filterStatus = 'menunggu';
                    } else {
                        $filterStatus = 'diproses';
                    }

                    if (str_contains($orderStatus, 'selesai')) {
                        $orderLabel = 'Selesai';
                        $orderClass = 'status-complete';
                    } elseif (str_contains($orderStatus, 'dikirim')) {
                        $orderLabel = 'Dikirim';
                        $orderClass = 'status-shipped';
                    } elseif (str_contains($orderStatus, 'diproses')) {
                        $orderLabel = 'Diproses';
                        $orderClass = 'status-process';
                    } elseif ($isFailed) {
                        $orderLabel = 'Dibatalkan';
                        $orderClass = 'status-failed';
                    } else {
                        $orderLabel = $order->status;
                        $orderClass = 'status-other';
                    }
                @endphp

                <article class="order-card" data-status="{{ $filterStatus }}">

                    {{-- ORDER HEADER --}}
                    <div class="order-header">

                        <div class="order-identity">

                            <div class="store-icon">✦</div>

                            <div class="store-info">
                                <div class="store-name">WEARLY STORE</div>

                                <p>
                                    <span class="order-number">
                                        ORDER #{{ $order->id }}
                                    </span>

                                    &nbsp;·&nbsp;

                                    {{ $order->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>

                        </div>

                        <div class="status-group">

                            <span class="status {{ $orderClass }}">
                                {{ $orderLabel }}
                            </span>

                            <span class="status {{ $paymentClass }}">
                                {{ $paymentLabel }}
                            </span>

                        </div>

                    </div>

                    {{-- PRODUCT LIST --}}
                    <div class="product-list">

                        @foreach($order->items as $item)

                            <div class="product-item">

                                @if(
                                    $item->product &&
                                    $item->product->gambar &&
                                    file_exists(public_path('images/products/' . $item->product->gambar))
                                )

                                    <img
                                        src="{{ asset('images/products/' . $item->product->gambar) }}"
                                        alt="{{ $item->product->nama }}"
                                        class="product-image"
                                    >

                                @else

                                    <div class="product-placeholder">
                                        WEARLY
                                    </div>

                                @endif

                                <div class="product-info">

                                    <h3>
                                        {{ $item->product->nama ?? 'Produk tidak tersedia' }}
                                    </h3>

                                    <p>
                                        {{ $item->jumlah }} barang
                                        <br>
                                        Rp {{ number_format($item->harga, 0, ',', '.') }} / produk
                                    </p>

                                </div>

                                <div class="product-price">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                    {{-- ORDER FOOTER --}}
                    <div class="order-footer">

                        <div class="order-footer-top">

                            <div>
                                <p class="total-caption">TOTAL PEMBAYARAN</p>

                                <div class="total-value">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="total-caption">
                                WEARLY COLLECTION
                            </div>

                        </div>

                        <div class="order-actions">

                            <a href="{{ route('success', $order->id) }}"
                               class="btn btn-detail">
                                Lihat Detail <span>↗</span>
                            </a>

                            @if(!$isFailed && $paymentStatus !== 'paid' && $order->payment_url)

                                <a href="{{ $order->payment_url }}"
                                   class="btn btn-pay">
                                    Bayar Sekarang <span>→</span>
                                </a>

                            @endif

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">✦</div>

                    <h2>Your Story Starts Here.</h2>

                    <p>
                        Sepertinya kamu belum memiliki pesanan.<br>
                        Yuk, temukan koleksi favorit dan mulai perjalanan
                        gayamu bersama WEARLY.
                    </p>

                    <a href="{{ route('user.dashboard') }}#produk">
                        Explore Collection &nbsp; →
                    </a>

                </div>

            @endforelse

            <div class="no-filter-result" id="noFilterResult">
                Tidak ada pesanan dengan status tersebut.
            </div>

        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <strong>WEARLY</strong>
        <span>© {{ date('Y') }} WEARLY. All Rights Reserved.</span>
        <span>Elegance in Every Detail.</span>
    </footer>

    {{-- FILTER SCRIPT --}}
    <script>
        const filterButtons = document.querySelectorAll('.filter-btn');
        const orderCards = document.querySelectorAll('.order-card');
        const noFilterResult = document.getElementById('noFilterResult');

        filterButtons.forEach(button => {

            button.addEventListener('click', function () {

                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;
                let visibleCount = 0;

                orderCards.forEach(card => {

                    const status = card.dataset.status;

                    if (filter === 'semua' || status === filter) {
                        card.style.display = 'block';
                        visibleCount++;

                        card.style.animation = 'none';
                        void card.offsetWidth;
                        card.style.animation = 'fadeUp .4s ease both';
                    } else {
                        card.style.display = 'none';
                    }

                });

                noFilterResult.style.display =
                    visibleCount === 0 && orderCards.length > 0
                        ? 'block'
                        : 'none';

            });

        });
    </script>

</body>
</html>
