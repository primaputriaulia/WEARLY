<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WEARLY - Home</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f5f0;
            color: #2f2925;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 58px;
            background: #2f2925;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            color: #f5e9d8;
            font-size: 24px;
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
            gap: 28px;
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

        /* =========================
           NAVBAR AKTIF
        ========================= */

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

        .greeting {
            color: #f8f5f0;
            font-size: 14px;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            background: none;
            border: none;
            color: #f8f5f0;
            font-size: 14px;
            cursor: pointer;
            padding: 8px 0;
            transition: 0.3s ease;
        }

        .logout-button:hover {
            color: #d6b98c;
        }

        .cart-button {
            border: 1px solid #d6b98c;
            color: #f8f5f0;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            transition: 0.3s ease;
        }

        .cart-button:hover {
            background: #d6b98c;
            color: #2f2925;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 430px;

            background: linear-gradient(
                120deg,
                #e8d8c3,
                #f8f5f0
            );

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 60px 10%;
        }

        .hero-text {
            max-width: 550px;
        }

        .hero-label {
            color: #9b7650;
            font-size: 13px;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.05;
            margin-bottom: 20px;
            color: #2f2925;
        }

        .hero h1 span {
            color: #a17b52;
        }

        .hero-description {
            color: #625a54;
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 25px;
            max-width: 500px;
        }

        .hero-button {
            display: inline-block;
            background: #2f2925;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .hero-button:hover {
            background: #a17b52;
            transform: translateY(-2px);
        }

        .hero-image {
            width: 330px;
            height: 330px;
            background: #d6b98c;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        /* =========================
           CATEGORY
        ========================= */

        .category {
            background: #f8f5f0;
            padding: 75px 8%;
        }

        .category-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 42px;
        }

        .category-label {
            display: inline-block;
            color: #a17b52;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .section-title {
            color: #2f2925;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .section-description {
            color: #776d66;
            font-size: 14px;
            line-height: 1.6;
        }

        .category-container {
            max-width: 1150px;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            gap: 22px;
        }

        .category-card {
            background: white;
            border: 1px solid #e8ddd0;
            border-radius: 14px;

            overflow: hidden;

            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 15px 35px rgba(47, 41, 37, 0.12);

            border-color: #d6b98c;
        }

        .category-image {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #eee4d6;
        }

        .category-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;
            display: block;

            transition: transform 0.5s ease;
        }

        .category-card:hover .category-image img {
            transform: scale(1.06);
        }

        .category-content {
            padding: 20px;
            text-align: left;
        }

        .category-content h3 {
            color: #2f2925;
            font-size: 18px;
            margin-bottom: 7px;
        }

        .category-content p {
            color: #81766d;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .category-link {
            color: #8d6845;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .category-link:hover {
            color: #2f2925;
        }


        /* =========================
           PRODUCTS
        ========================= */

        .products-section {
            background: #eee4d6;
            padding: 60px 8%;
        }

        .products-title {
            text-align: center;
            font-size: 30px;
            margin-bottom: 30px;
        }

        .product-container {
            max-width: 1150px;
            margin: auto;

            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #e8ddd0;
        }

        .gambar {
            height: 230px;
            background: #f1ebe3;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        .gambar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gambar span {
            font-size: 55px;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 17px;
            margin-bottom: 6px;
        }

        .kategori {
            color: #8d6845;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .harga {
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .deskripsi {
            color: #777;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .button {
            width: 100%;
            border: none;
            background: #2f2925;
            color: white;
            padding: 11px;
            border-radius: 7px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .button:hover {
            background: #a17b52;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #2f2925;
            color: #f5e9d8;
            text-align: center;
            padding: 30px 20px;
            font-size: 13px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .category-container,
            .product-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero {
                padding: 50px 7%;
            }

            .hero h1 {
                font-size: 40px;
            }

        }


        @media (max-width: 700px) {

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

            .hero {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }

            .hero-image {
                width: 280px;
                height: 280px;
            }

            .category-container,
            .product-container {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <a href="{{ route('user.dashboard') }}" class="logo">
        WEAR<span>LY</span>
    </a>

    <div class="nav-menu">

        <!-- HOME -->

        <a href="{{ route('user.dashboard') }}"
           class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            Home
        </a>


        <!-- KATEGORI -->

        <a href="{{ route('categories') }}"
           class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">
            Kategori
        </a>


        <!-- PRODUK -->

        <a href="{{ route('shop') }}"
           class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">
            Produk
        </a>


        @auth

            <span class="greeting">
                Halo, {{ Auth::user()->name }}
            </span>


            <form action="{{ url('/logout') }}"
                  method="POST"
                  class="logout-form">

                @csrf

                <button type="submit"
                        class="logout-button">
                    Logout
                </button>

            </form>

        @else

            <a href="{{ route('login') }}"
               class="nav-link">
                Login
            </a>

        @endauth


        <a href="{{ route('cart.index') }}"
           class="cart-button">
            🛒 Cart
        </a>

    </div>

</nav>



<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-text">

        <div class="hero-label">
            WELCOME TO WEARLY
        </div>

        <h1>
            Find Your
            <span>Everyday</span>
            Style.
        </h1>

        <p class="hero-description">
            Temukan berbagai pilihan fashion dan accessories
            untuk melengkapi gaya sehari-harimu.
        </p>

        <a href="{{ route('shop') }}"
           class="hero-button">
            Belanja Sekarang →
        </a>

    </div>


    <div class="hero-image">

        <img src="{{ asset('images/hero/wearly-hero.jpg') }}"
             alt="WEARLY Fashion">

    </div>

</section>



<!-- =========================
     CATEGORY
========================= -->

<section class="category" id="kategori">

    <div class="category-heading">

        <span class="category-label">
            EXPLORE COLLECTION
        </span>

        <h2 class="section-title">
            Jelajahi Kategori
        </h2>

        <p class="section-description">
            Temukan berbagai pilihan fashion untuk
            melengkapi gaya sehari-harimu.
        </p>

    </div>


    <div class="category-container">


        <!-- CLOTHING -->

        <div class="category-card">

            <div class="category-image">

                <img src="{{ asset('images/categories/clothing.jpg') }}"
                     alt="Clothing">

            </div>

            <div class="category-content">

                <h3>
                    Clothing
                </h3>

                <p>
                    Fashion sehari-hari
                </p>

                <a href="{{ route('shop') }}"
                   class="category-link">
                    Lihat Produk →
                </a>

            </div>

        </div>


        <!-- BAGS -->

        <div class="category-card">

            <div class="category-image">

                <img src="{{ asset('images/categories/bags.jpg') }}"
                     alt="Bags">

            </div>

            <div class="category-content">

                <h3>
                    Bags
                </h3>

                <p>
                    Tas untuk berbagai kebutuhan
                </p>

                <a href="{{ route('shop') }}"
                   class="category-link">
                    Lihat Produk →
                </a>

            </div>

        </div>


        <!-- ACCESSORIES -->

        <div class="category-card">

            <div class="category-image">

                <img src="{{ asset('images/categories/accessories.jpg') }}"
                     alt="Accessories">

            </div>

            <div class="category-content">

                <h3>
                    Accessories
                </h3>

                <p>
                    Lengkapi gaya kamu
                </p>

                <a href="{{ route('shop') }}"
                   class="category-link">
                    Lihat Produk →
                </a>

            </div>

        </div>


        <!-- WATCHES -->

        <div class="category-card">

            <div class="category-image">

                <img src="{{ asset('images/categories/watches.jpg') }}"
                     alt="Watches">

            </div>

            <div class="category-content">

                <h3>
                    Watches
                </h3>

                <p>
                    Jam tangan pilihan
                </p>

                <a href="{{ route('shop') }}"
                   class="category-link">
                    Lihat Produk →
                </a>

            </div>

        </div>


    </div>

</section>



<!-- =========================
     PRODUCTS
========================= -->

<section class="products-section">

    <h2 class="products-title">
        Produk Pilihan
    </h2>


    <div class="product-container">

        @forelse($products as $product)

            <div class="card">

                <div class="gambar">

                    @if($product->gambar)

                        <img src="{{ asset('images/products/' . $product->gambar) }}"
                             alt="{{ $product->nama }}">

                    @else

                        <span>
                            🛍️
                        </span>

                    @endif

                </div>


                <div class="card-content">

                    <h3>
                        {{ $product->nama }}
                    </h3>

                    <p class="kategori">
                        {{ $product->kategori }}
                    </p>

                    <p class="harga">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </p>

                    <p class="deskripsi">
                        {{ $product->deskripsi }}
                    </p>


                    <form action="{{ route('cart.add', $product->id) }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="button">

                            Tambah ke Cart

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p>
                Belum ada produk tersedia.
            </p>

        @endforelse

    </div>

</section>



<!-- =========================
     FOOTER
========================= -->

<footer>

    <p>
        © {{ date('Y') }} WEARLY.
        All Rights Reserved.
    </p>

</footer>


</body>
</html>