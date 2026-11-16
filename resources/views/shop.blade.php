<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk - WEARLY</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f0;
            color: #2f2925;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 63px;
            background: #2f2925;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .logo {
            color: #f8f5f0;
            font-size: 27px;
            font-weight: bold;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .logo span {
            color: #d6b98c;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 27px;
        }

        .nav-link {
            color: #f8f5f0;
            text-decoration: none;
            font-size: 14px;
            position: relative;
            padding: 8px 0;
            transition: 0.3s ease;
        }

        .nav-link:hover {
            color: #d6b98c;
        }

        .nav-link.active {
            color: #d6b98c;
            font-weight: 600;
        }

        .nav-link.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -5px;
            height: 2px;
            background: #d6b98c;
            border-radius: 10px;
        }

        .user-name {
            color: #f8f5f0;
            font-size: 14px;
            white-space: nowrap;
        }

        .logout {
            background: none;
            border: none;
            color: #f8f5f0;
            font-size: 14px;
            cursor: pointer;
            padding: 8px 0;
        }

        .logout:hover {
            color: #d6b98c;
        }

        .cart {
            border: 1px solid #d6b98c;
            border-radius: 25px;
            padding: 9px 17px;
            color: #f8f5f0;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s ease;
        }

        .cart:hover {
            background: #d6b98c;
            color: #2f2925;
        }


        /* =========================
           HEADER
        ========================= */

        .header {
            text-align: center;
            padding: 60px 20px 40px;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .header p {
            color: #756a63;
        }


        /* =========================
           PRODUK
        ========================= */

        .produk-container {
            width: 85%;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;

            padding-bottom: 60px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;

            box-shadow: 0 4px 12px rgba(47, 41, 37, 0.08);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .gambar {
            height: 180px;
            background-color: #e4d6c5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 55px;
        }

        .card-content {
            padding: 20px;
        }

        .kategori {
            color: #9a7651;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .card-content h3 {
            margin-bottom: 10px;
        }

        .harga {
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 12px;
        }

        .deskripsi {
            color: #756a63;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .button {
            width: 100%;
            border: none;

            background-color: #2f2925;
            color: white;

            padding: 11px;
            border-radius: 7px;

            font-size: 14px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #9a7651;
        }


        .empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .produk-container {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 600px) {

            .navbar {
                height: auto;
                padding: 18px 6%;
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .produk-container {
                grid-template-columns: 1fr;
            }

        }

    </style>
</head>

<body>


    <!-- NAVBAR -->

    <nav class="navbar">

        <a href="{{ route('user.dashboard') }}" class="logo">
            WEAR<span>LY</span>
        </a>

        <div class="nav-menu">

            <a href="{{ route('user.dashboard') }}"
               class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('categories') }}"
               class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">
                Kategori
            </a>

            <a href="{{ route('shop') }}"
               class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">
                Produk
            </a>

            @auth

                <span class="user-name">
                    Halo, {{ Auth::user()->name }}
                </span>

                <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">

                    @csrf

                    <button type="submit" class="logout">
                        Logout
                    </button>

                </form>

            @endauth

            <a href="{{ route('cart.index') }}" class="cart">
                🛒 Cart
            </a>

        </div>

    </nav>


    <!-- HEADER -->

    <section class="header">

        <h1>
            Produk WEARLY
        </h1>

        <p>
            Temukan fashion dan accessories pilihan untuk melengkapi gayamu.
        </p>

    </section>


    <!-- DAFTAR PRODUK -->

    <section class="produk-container">

        @forelse($products as $product)

            <div class="card">

                <div class="gambar">
                    🛍️
                </div>

                <div class="card-content">

                    <p class="kategori">
                        {{ $product->kategori }}
                    </p>

                    <h3>
                        {{ $product->nama }}
                    </h3>

                    <p class="harga">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </p>

                    <p class="deskripsi">
                        {{ $product->deskripsi }}
                    </p>

                    <!-- TAMBAH KE CART -->

                    <form
                        action="{{ route('cart.add', $product->id) }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="button"
                        >
                            🛒 Tambah ke Cart
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="empty">

                <h2>
                    Belum ada produk tersedia 😢
                </h2>

            </div>

        @endforelse

    </section>


</body>
</html>