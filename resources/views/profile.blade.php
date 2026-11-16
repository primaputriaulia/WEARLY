
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya | WEARLY</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'DM Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 110px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f5f0;
            color: #2f2925;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVBAR WEARLY */

        .navbar-wrapper {
            position: fixed;
            top: 16px;
            left: 0;
            width: 100%;
            padding: 0 4%;
            z-index: 1000;
        }

        .navbar {
            max-width: 1450px;
            height: 70px;
            margin: auto;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,253,249,.97);
            border: 1px solid rgba(214,185,140,.25);
            border-radius: 50px;
            box-shadow: 0 8px 30px rgba(47,41,37,.07);
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 1px;
            color: #2f2925;
        }

        .logo span {
            color: #a47b50;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            font-size: 13px;
            font-weight: 600;
            color: #65584e;
            transition: .3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #9a7651;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-greeting {
            font-size: 12px;
            color: #74665b;
            font-weight: 600;
        }

        .profile-icon,
        .cart-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f0e6d9;
            color: #493c33;
            position: relative;
            transition: .3s;
        }

        .profile-icon:hover,
        .cart-icon:hover {
            background: #493c33;
            color: #fffdf9;
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            background: #9a7651;
            color: white;
            width: 17px;
            height: 17px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .logout-btn {
            border: none;
            background: #493c33;
            color: white;
            padding: 11px 19px;
            border-radius: 30px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .logout-btn:hover {
            background: #9a7651;
        }

        /* PROFILE LAYOUT */

        .profile-container {
            max-width: 1380px;
            margin: auto;
            padding: 120px 4% 75px;
        }

        .profile-layout {
            display: grid;
            grid-template-columns: 270px 1fr;
            gap: 28px;
            align-items: start;
        }

        .sidebar {
            background: #fffdf9;
            border: 1px solid #eee5da;
            border-radius: 18px;
            padding: 27px 20px;
            position: sticky;
            top: 105px;
        }

        .sidebar-user {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee5da;
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e9d9c6;
            color: #493c33;
            font-family: 'DM Sans', sans-serif;
            font-size: 34px;
            font-weight: 700;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-user h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar-user p {
            font-size: 12px;
            color: #95887c;
            word-break: break-word;
        }

        .sidebar-label {
            font-size: 10px;
            color: #a39485;
            font-weight: 800;
            letter-spacing: 1.5px;
            margin: 25px 0 12px 10px;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 12px;
            border-radius: 10px;
            color: #75685d;
            font-size: 13px;
            font-weight: 600;
            transition: .3s;
        }

        .sidebar-menu a svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #f3ebe1;
            color: #493c33;
        }

        .sidebar-menu a.active {
            font-weight: 700;
        }

        .sidebar-bottom {
            border-top: 1px solid #eee5da;
            margin-top: 20px;
            padding-top: 18px;
        }

        /* MAIN CONTENT */

        .main-content {
            min-width: 0;
        }

        .welcome-card {
            background: #493c33;
            color: #fffdf9;
            padding: 34px 38px;
            border-radius: 18px;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            width: 230px;
            height: 230px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            right: -55px;
            top: -100px;
        }

        .welcome-card small {
            color: #d6b98c;
            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .welcome-card h2 {
            font-family: 'DM Sans', sans-serif;
            font-size: 30px;
            margin: 10px 0;
            font-weight: 700;
        }

        .welcome-card p {
            font-size: 13px;
            color: #e1d7cc;
            line-height: 1.7;
            max-width: 500px;
        }

        /* STATISTICS */

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-heading h3 {
            font-family: 'DM Sans', sans-serif;
            font-size: 21px;
            font-weight: 700;
            color: #493c33;
        }

        .section-heading a {
            font-size: 12px;
            color: #9a7651;
            font-weight: 700;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 13px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fffdf9;
            border: 1px solid #eee5da;
            padding: 19px 16px;
            border-radius: 14px;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #f2e9de;
            color: #9a7651;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 13px;
        }

        .stat-icon svg {
            width: 18px;
            height: 18px;
        }

        .stat-card h4 {
            font-size: 24px;
            margin-bottom: 4px;
            color: #493c33;
        }

        .stat-card p {
            font-size: 11px;
            color: #95887c;
        }

        .spending-card {
            background: #f0e6d9;
            border-radius: 14px;
            padding: 20px 23px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .spending-card p {
            font-size: 12px;
            color: #75685d;
            margin-bottom: 6px;
        }

        .spending-card h3 {
            font-size: 23px;
            color: #493c33;
        }

        .spending-icon {
            width: 48px;
            height: 48px;
            background: #fffdf9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9a7651;
        }

        /* ORDER */

        .content-card {
            background: #fffdf9;
            border: 1px solid #eee5da;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            scroll-margin-top: 110px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 17px 0;
            border-bottom: 1px solid #f0e9e0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-image {
            width: 70px;
            height: 80px;
            border-radius: 10px;
            background: #f0e8dd;
            object-fit: cover;
            flex-shrink: 0;
        }

        .order-placeholder {
            width: 70px;
            height: 80px;
            background: #f0e8dd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9a7651;
            font-family: 'DM Sans', sans-serif;
            font-size: 25px;
            font-weight: 700;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .order-info {
            flex: 1;
            min-width: 0;
        }

        .order-info h4 {
            font-size: 13px;
            color: #493c33;
            margin-bottom: 5px;
        }

        .order-info p {
            font-size: 11px;
            color: #95887c;
            margin-bottom: 4px;
        }

        .order-price {
            font-size: 13px;
            font-weight: 700;
            color: #493c33;
            margin-top: 6px;
        }

        .order-status {
            text-align: right;
            flex-shrink: 0;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            background: #f0e8dd;
            color: #8a6744;
        }

        .status.success {
            background: #e8eee5;
            color: #607753;
        }

        .status.failed {
            background: #f6e5e1;
            color: #a65d50;
        }

        .payment-label {
            font-size: 10px;
            color: #95887c;
            margin-top: 7px;
        }

        .empty-state {
            text-align: center;
            padding: 35px 15px;
            color: #95887c;
            font-size: 13px;
        }

        .empty-state svg {
            width: 35px;
            height: 35px;
            margin-bottom: 10px;
            color: #b9a48c;
        }

        /* FORMS */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #5b4e43;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            border: 1px solid #e8ded2;
            background: #fffdf9;
            padding: 13px 14px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 13px;
            color: #493c33;
            outline: none;
            transition: .3s;
        }

        .form-control:focus {
            border-color: #9a7651;
            box-shadow: 0 0 0 3px rgba(154,118,81,.09);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 105px;
        }

        .form-control:disabled {
            background: #f5f0e9;
            color: #8f8378;
        }

        .error-message {
            color: #b34f45;
            font-size: 11px;
            margin-top: 6px;
        }

        .primary-btn {
            border: none;
            background: #493c33;
            color: white;
            padding: 13px 23px;
            border-radius: 30px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .primary-btn:hover {
            background: #9a7651;
            transform: translateY(-2px);
        }

        .photo-upload {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;
        }

        .photo-preview {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            object-fit: cover;
            background: #e9d9c6;
        }

        .upload-info p {
            font-size: 12px;
            color: #82766b;
            margin-bottom: 9px;
        }

        .upload-info input {
            font-size: 11px;
            max-width: 230px;
            font-family: inherit;
        }

        /* ADDRESS AND SECURITY */

        .address-box,
        .security-box {
            background: #f8f5f0;
            border: 1px solid #eee5da;
            padding: 22px;
            border-radius: 13px;
            margin-bottom: 15px;
        }

        .address-box h4,
        .security-box h4 {
            font-size: 14px;
            color: #493c33;
            margin-bottom: 9px;
        }

        .address-box p,
        .security-box p {
            font-size: 12px;
            color: #82766b;
            line-height: 1.8;
        }

        .address-box a {
            display: inline-block;
            color: #9a7651;
            font-size: 12px;
            font-weight: 700;
            margin-top: 12px;
        }

        .security-row {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .security-icon {
            width: 43px;
            height: 43px;
            background: #f0e6d9;
            color: #9a7651;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .success-alert {
            background: #e8eee5;
            color: #607753;
            padding: 13px 16px;
            border-radius: 9px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* FOOTER */

        footer {
            background: #2f2925;
            color: #fffdf9;
            padding: 30px 5%;
            text-align: center;
        }

        footer .logo {
            color: #fffdf9;
            margin-bottom: 8px;
            display: inline-block;
        }

        footer p {
            font-size: 11px;
            color: #c6b9ac;
        }

        /* RESPONSIVE */

        @media(max-width: 1050px) {
            .profile-layout {
                grid-template-columns: 230px 1fr;
                gap: 18px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-menu {
                gap: 16px;
            }
        }

        @media(max-width: 768px) {
            .navbar-wrapper {
                padding: 0 3%;
            }

            .navbar {
                height: auto;
                min-height: 65px;
                padding: 12px 18px;
            }

            .nav-menu {
                display: none;
            }

            .user-greeting {
                display: none;
            }

            .profile-container {
                padding: 105px 4% 50px;
            }

            .profile-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .sidebar-menu {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .sidebar-label {
                margin-top: 20px;
            }

            .welcome-card {
                padding: 27px 23px;
            }

            .welcome-card h2 {
                font-size: 25px;
            }

            .content-card {
                padding: 20px 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }

        @media(max-width: 480px) {
            .stats-grid {
                gap: 9px;
            }

            .stat-card {
                padding: 15px 12px;
            }

            .stat-card h4 {
                font-size: 20px;
            }

            .order-item {
                align-items: flex-start;
                gap: 10px;
            }

            .order-image,
            .order-placeholder {
                width: 55px;
                height: 65px;
            }

            .order-status {
                max-width: 100px;
            }

            .status {
                font-size: 9px;
            }

            .spending-card h3 {
                font-size: 19px;
            }

            .sidebar-menu a {
                font-size: 11px;
                padding: 11px 8px;
            }
        }
    </style>
</head>

<body>

    @php
        $cartCount = collect(session('cart', []))->sum('quantity');
    @endphp

    <!-- NAVBAR -->
    <div class="navbar-wrapper">
        <nav class="navbar">
            <a href="{{ route('user.dashboard') }}" class="logo">
                WEAR<span>LY</span>
            </a>

            <div class="nav-menu">
                <a href="{{ route('user.dashboard') }}#home">Home</a>
                <a href="{{ route('user.dashboard') }}#kategori">Kategori</a>
                <a href="{{ route('user.dashboard') }}#produk">Produk</a>
                <a href="{{ route('user.dashboard') }}#tentang">Tentang</a>
                <a href="{{ route('user.history') }}">Riwayat</a>
            </div>

            <div class="nav-actions">
                <span class="user-greeting">
                    Halo, {{ Auth::user()->name }}
                </span>

                <a href="{{ route('user.profile') }}" class="profile-icon" title="Profil Saya">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M5 21v-2a7 7 0 0 1 14 0v2"></path>
                    </svg>
                </a>

                <a href="{{ route('cart.index') }}" class="cart-icon" title="Keranjang">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3h2l2.4 12.4a2 2 0 0 0 2 1.6h8.7a2 2 0 0 0 2-1.6L22 7H6"></path>
                        <circle cx="10" cy="21" r="1"></circle>
                        <circle cx="19" cy="21" r="1"></circle>
                    </svg>
                    @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @endif
                </a>

                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </nav>
    </div>

    <!-- PROFILE CONTENT -->
    <main class="profile-container">
        <div class="profile-layout">

            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="sidebar-user">
                    <div class="avatar">
                        @if($user->foto_profil)
                            <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto profil">
                        @else
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        @endif
                    </div>

                    <h3>{{ $user->name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>

                <p class="sidebar-label">MENU AKUN</p>

                <nav class="sidebar-menu">
                    <a href="#overview" class="active">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                            <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                        </svg>
                        Ringkasan
                    </a>

                    <a href="#personal-information">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2"></path>
                        </svg>
                        Informasi Pribadi
                    </a>

                    <a href="#address-book">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="2.5"></circle>
                        </svg>
                        Alamat Saya
                    </a>

                    <a href="#my-orders">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <path d="M4 4h16v16H4z"></path>
                            <path d="M8 8h8M8 12h8M8 16h5"></path>
                        </svg>
                        Pesanan Saya
                    </a>

                    <a href="#account-security">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <rect x="4" y="10" width="16" height="11" rx="2"></rect>
                            <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                        </svg>
                        Keamanan Akun
                    </a>
                </nav>

                <div class="sidebar-bottom">
                    <nav class="sidebar-menu">
                        <a href="{{ route('user.dashboard') }}">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"></path>
                            </svg>
                            Kembali Belanja
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- MAIN -->
            <div class="main-content">

                <!-- OVERVIEW -->
                <section id="overview">
                    <div class="welcome-card">
                        <small>WELCOME BACK</small>
                        <h2>Halo, {{ $user->name }}!</h2>
                        <p>
                            Senang melihatmu kembali di WEARLY.
                            Kelola informasi akun dan pantau aktivitas belanjamu
                            dengan mudah melalui halaman ini.
                        </p>
                    </div>

                    <div class="section-heading">
                        <h3>Ringkasan Aktivitas</h3>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <path d="M4 4h16v16H4z"></path>
                                    <path d="M8 8h8M8 12h8"></path>
                                </svg>
                            </div>
                            <h4>{{ $totalOrders }}</h4>
                            <p>Total Pesanan</p>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M12 7v5l3 2"></path>
                                </svg>
                            </div>
                            <h4>{{ $pendingOrders }}</h4>
                            <p>Menunggu Pembayaran</p>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <path d="M3 12h18M12 3v18"></path>
                                </svg>
                            </div>
                            <h4>{{ $processingOrders }}</h4>
                            <p>Dalam Proses</p>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                                    <path d="m5 12 4 4L19 6"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                </svg>
                            </div>
                            <h4>{{ $completedOrders }}</h4>
                            <p>Pesanan Selesai</p>
                        </div>
                    </div>

                    <div class="spending-card">
                        <div>
                            <p>Total Transaksi Berhasil</p>
                            <h3>Rp {{ number_format($totalSpent, 0, ',', '.') }}</h3>
                        </div>
                        <div class="spending-icon">
                            <svg width="23" height="23" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.7">
                                <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                <path d="M2 10h20"></path>
                            </svg>
                        </div>
                    </div>
                </section>

                <!-- RECENT ORDERS -->
                <section class="content-card" id="my-orders">
                    <div class="section-heading">
                        <h3>Pesanan Terbaru</h3>
                        <a href="{{ route('user.history') }}">Lihat Semua →</a>
                    </div>

                    @forelse($recentOrders as $order)
                        @php
                            $firstItem = $order->items->first();
                            $firstProduct = $firstItem?->product;

                            $paymentLabel = match($order->payment_status) {
                                'settlement', 'capture', 'success' => 'Lunas',
                                'pending' => 'Menunggu Pembayaran',
                                'expire' => 'Kedaluwarsa',
                                'deny' => 'Gagal',
                                default => ucfirst($order->payment_status ?? 'Belum tersedia'),
                            };

                            $paymentClass = in_array($order->payment_status, ['settlement', 'capture', 'success'])
                                ? 'success'
                                : (in_array($order->payment_status, ['expire', 'deny']) ? 'failed' : '');

                            $orderStatus = $order->status ?? 'Menunggu';
                        @endphp

                        <div class="order-item">
                            @if($firstProduct && $firstProduct->gambar)
                                <img
                                    src="{{ asset('images/products/' . $firstProduct->gambar) }}"
                                    alt="{{ $firstProduct->nama }}"
                                    class="order-image"
                                >
                            @else
                                <div class="order-placeholder">W</div>
                            @endif

                            <div class="order-info">
                                <h4>{{ $firstProduct->nama ?? 'Produk WEARLY' }}</h4>
                                <p>Pesanan #{{ $order->id }}</p>
                                <p>{{ $order->created_at->format('d M Y') }}</p>
                                <div class="order-price">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="order-status">
                                <span class="status {{ $orderStatus === 'Selesai' ? 'success' : '' }}">
                                    {{ $orderStatus }}
                                </span>
                                <p class="payment-label">
                                    {{ $paymentLabel }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M4 4h16v16H4z"></path>
                                <path d="M8 8h8M8 12h8M8 16h4"></path>
                            </svg>
                            <p>Belum ada pesanan. Yuk, mulai belanja di WEARLY!</p>
                        </div>
                    @endforelse
                </section>

                <!-- PERSONAL INFORMATION -->
                <section class="content-card" id="personal-information">
                    <div class="section-heading">
                        <h3>Informasi Pribadi</h3>
                    </div>

                    @if(session('success'))
                        <div class="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="success-alert" style="background:#f6e5e1;color:#a65d50;">
                            Terdapat data yang belum sesuai. Silakan periksa kembali formulir.
                        </div>
                    @endif

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="photo-upload">
                            <div>
                                @if($user->foto_profil)
                                    <img
                                        id="photoPreview"
                                        src="{{ asset('storage/' . $user->foto_profil) }}"
                                        class="photo-preview"
                                        alt="Foto profil"
                                    >
                                @else
                                    <div id="photoInitial" class="photo-preview"
                                        style="display:flex;align-items:center;justify-content:center;font-size:27px;color:#493c33;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <img id="photoPreview" class="photo-preview" style="display:none;" alt="Preview foto profil">
                                @endif
                            </div>

                            <div class="upload-info">
                                <p>Gunakan foto terbaik untuk profil akunmu.</p>
                                <input type="file" name="foto_profil" id="foto_profil"
                                    accept=".jpg,.jpeg,.png,.webp">
                                @error('foto_profil')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label>Nomor Telepon</label>
                                <input type="text" name="no_hp" class="form-control"
                                    value="{{ old('no_hp', $user->no_hp) }}"
                                    placeholder="Masukkan nomor telepon">
                                @error('no_hp')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group full">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control"
                                    placeholder="Masukkan alamat lengkap">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="primary-btn">
                            Simpan Perubahan
                        </button>
                    </form>
                </section>

                <!-- ADDRESS -->
                <section class="content-card" id="address-book">
                    <div class="section-heading">
                        <h3>Alamat Saya</h3>
                    </div>

                    <div class="address-box">
                        <h4>Alamat Utama</h4>
                        <p><strong>{{ $user->name }}</strong></p>
                        <p>{{ $user->no_hp ?: 'Nomor telepon belum ditambahkan' }}</p>
                        <p>{{ $user->alamat ?: 'Alamat belum ditambahkan' }}</p>

                        <a href="#personal-information">Ubah Informasi Alamat →</a>
                    </div>
                </section>

                <!-- SECURITY -->
                <section class="content-card" id="account-security">
                    <div class="section-heading">
                        <h3>Keamanan Akun</h3>
                    </div>

                    <div class="security-box">
                        <div class="security-row">
                            <div class="security-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.7">
                                    <rect x="4" y="10" width="16" height="11" rx="2"></rect>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                                </svg>
                            </div>

                            <div>
                                <h4>Kata Sandi Akun</h4>
                                <p>
                                    Kata sandi digunakan untuk menjaga keamanan
                                    akun dan informasi pribadimu.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </main>

    <footer>
        <a href="{{ route('user.dashboard') }}" class="logo">WEAR<span>LY</span></a>
        <p>© {{ date('Y') }} WEARLY. All Rights Reserved.</p>
    </footer>

    <script>
        // Preview foto profil sebelum disimpan
        document.getElementById('foto_profil').addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const preview = document.getElementById('photoPreview');
                    const initial = document.getElementById('photoInitial');

                    preview.src = e.target.result;
                    preview.style.display = 'block';

                    if (initial) {
                        initial.style.display = 'none';
                    }
                };

                reader.readAsDataURL(file);
            }
        });

        // Active sidebar menu
        const sidebarLinks = document.querySelectorAll('.sidebar-menu a[href^="#"]');
        const sections = document.querySelectorAll('.main-content section[id]');

        function updateActiveMenu() {
            let current = 'overview';

            sections.forEach(section => {
                if (window.scrollY >= section.offsetTop - 180) {
                    current = section.id;
                }
            });

            sidebarLinks.forEach(link => {
                link.classList.toggle(
                    'active',
                    link.getAttribute('href') === '#' + current
                );
            });
        }

        window.addEventListener('scroll', updateActiveMenu);
        updateActiveMenu();
    </script>

    @include('chatbot')

</body>
</html>
