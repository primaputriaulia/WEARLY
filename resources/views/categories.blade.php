<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kategori - WEARLY</title>

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

        /*
         * Ukuran menu dibuat tetap.
         * Jadi saat active, posisi navbar tidak berubah.
         */
        .nav-link {
            color: #f8f5f0;
            text-decoration: none;
            font-size: 14px;
            position: relative;

            padding: 8px 0;

            display: inline-block;
            text-align: center;

            transition: 0.3s ease;
        }

        .nav-link:nth-child(1) {
            width: 38px;
        }

        .nav-link:nth-child(2) {
            width: 60px;
        }

        .nav-link:nth-child(3) {
            width: 48px;
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

        /*
         * Greeting tidak ikut berubah ukuran
         * ketika halaman berpindah.
         */
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
            white-space: nowrap;
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
            white-space: nowrap;
            transition: 0.3s ease;
        }

        .cart:hover {
            background: #d6b98c;
            color: #2f2925;
        }


        /* =========================
           CATEGORY
        ========================= */

        .category {
            padding: 55px 7% 70px;
            min-height: calc(100vh - 63px);
        }

        .category-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 40px;
        }

        .category-heading h1 {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .category-heading p {
            color: #776d66;
            font-size: 14px;
        }

        .category-container {
            max-width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .category-card {
            background: white;
            border: 1px solid #e5d9cb;
            border-radius: 14px;
            overflow: hidden;
            transition: 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(47, 41, 37, 0.12);
            border-color: #d6b98c;
        }

        .category-image {
            width: 100%;
            height: 230px;
            overflow: hidden;
            background: #eee4d6;
        }

        .category-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.5s ease;
        }

        .category-card:hover .category-image img {
            transform: scale(1.05);
        }

        .category-content {
            padding: 20px;
            text-align: center;
        }

        .category-content h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .category-content p {
            color: #776d66;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .category-button {
            display: inline-block;
            background: #2f2925;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 13px;
        }

        .category-button:hover {
            background: #8d6845;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .category-container {
                grid-template-columns: repeat(2, 1fr);
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

            .category {
                padding: 45px 6%;
            }

            .category-container {
                grid-template-columns: 1fr;
            }

        }
    </style>
</head>

<body>

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


    <section class="category">

        <div class="category-heading">

            <h1>
                Jelajahi Kategori
            </h1>

            <p>
                Temukan berbagai pilihan fashion sesuai gaya kamu.
            </p>

        </div>


        <div class="category-container">

            <div class="category-card">

                <div class="category-image">
                    <img
                        src="{{ asset('images/categories/clothing.jpg') }}"
                        alt="Clothing"
                    >
                </div>

                <div class="category-content">

                    <h2>
                        Clothing
                    </h2>

                    <p>
                        Berbagai pilihan pakaian untuk gaya sehari-hari.
                    </p>

                    <a
                        href="{{ route('shop') }}"
                        class="category-button"
                    >
                        Lihat Produk
                    </a>

                </div>

            </div>


            <div class="category-card">

                <div class="category-image">
                    <img
                        src="{{ asset('images/categories/bags.jpg') }}"
                        alt="Bags"
                    >
                </div>

                <div class="category-content">

                    <h2>
                        Bags
                    </h2>

                    <p>
                        Tas untuk melengkapi kebutuhan dan gaya kamu.
                    </p>

                    <a
                        href="{{ route('shop') }}"
                        class="category-button"
                    >
                        Lihat Produk
                    </a>

                </div>

            </div>


            <div class="category-card">

                <div class="category-image">
                    <img
                        src="{{ asset('images/categories/accessories.jpg') }}"
                        alt="Accessories"
                    >
                </div>

                <div class="category-content">

                    <h2>
                        Accessories
                    </h2>

                    <p>
                        Aksesori pilihan untuk melengkapi penampilanmu.
                    </p>

                    <a
                        href="{{ route('shop') }}"
                        class="category-button"
                    >
                        Lihat Produk
                    </a>

                </div>

            </div>


            <div class="category-card">

                <div class="category-image">
                    <img
                        src="{{ asset('images/categories/watches.jpg') }}"
                        alt="Watches"
                    >
                </div>

                <div class="category-content">

                    <h2>
                        Watches
                    </h2>

                    <p>
                        Pilihan jam tangan untuk berbagai aktivitas.
                    </p>

                    <a
                        href="{{ route('shop') }}"
                        class="category-button"
                    >
                        Lihat Produk
                    </a>

                </div>

            </div>

        </div>

    </section>

</body>
</html>