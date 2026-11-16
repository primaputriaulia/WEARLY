
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WEARLY - Edit Product</title>

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

        /* SIDEBAR BOTTOM */

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

        /* MAIN */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 38px 45px;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 28px;
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

        /* FORM CARD */

        .form-card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 28px;
            max-width: 900px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .04);
        }

        .form-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 19px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #493c33;
            margin-bottom: 9px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            border: 1px solid #eadfd2;
            background: #fdfbf8;
            border-radius: 9px;
            padding: 13px 15px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: #2f2925;
            outline: none;
            transition: .3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #b99569;
            background: white;
            box-shadow: 0 0 0 3px rgba(185, 149, 105, .12);
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* CURRENT IMAGE */

        .current-image {
            margin-top: 10px;
            margin-bottom: 12px;
        }

        .current-image img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eadfd2;
            background: #e4d6c5;
        }

        .no-image {
            width: 150px;
            height: 150px;
            background: #f0e8de;
            border: 1px solid #eadfd2;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #81766e;
            font-size: 12px;
        }

        .image-caption {
            display: block;
            color: #8b7d70;
            font-size: 12px;
            margin-top: 8px;
        }

        /* FILE UPLOAD */

        .file-input {
            width: 100%;
            background: #f8f5f0;
            border: 1px solid #eadfd2;
            border-radius: 9px;
            padding: 11px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            cursor: pointer;
        }

        .file-input:hover {
            border-color: #b99569;
        }

        .form-help {
            display: block;
            margin-top: 7px;
            font-size: 12px;
            color: #8b7d70;
        }

        /* ERROR */

        .error-box {
            background: #f3e3dc;
            border: 1px solid #e2c5b8;
            color: #8a5545;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            max-width: 900px;
            font-size: 13px;
        }

        .error-box ul {
            margin-left: 18px;
            margin-top: 8px;
        }

        /* BUTTON */

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .save-button {
            background: linear-gradient(120deg, #493c33, #76583d);
            color: #f5e9d8;
            border: none;
            padding: 13px 23px;
            border-radius: 9px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .save-button:hover {
            background: linear-gradient(120deg, #76583d, #9a7651);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(47, 41, 37, .12);
        }

        .cancel-button {
            background: #eee5da;
            color: #493c33;
            padding: 13px 23px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            transition: .3s;
        }

        .cancel-button:hover {
            background: #d6b98c;
            color: #2f2925;
        }

        /* RESPONSIVE */

        @media (max-width: 1150px) {
            .main {
                padding: 30px;
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

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .page-title {
                font-size: 27px;
            }

            .form-card {
                padding: 22px;
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
                font-size: 23px;
            }

            .page-subtitle {
                font-size: 12px;
            }

            .form-card {
                padding: 17px;
            }

            .form-actions {
                flex-direction: column;
            }

            .save-button,
            .cancel-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="layout">

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

                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}" class="active">
                    Products
                </a>

                <a href="{{ route('admin.categories.index') }}">
                    Categories
                </a>

                <a href="{{ route('admin.users.index') }}">
                    Users
                </a>

                <a href="{{ route('admin.orders.index') }}">
                    Orders
                </a>

                <a href="{{ route('admin.reports.index') }}">
                    Reports
                </a>

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

        <div class="page-header">

            <h1 class="page-title">
                Edit Product
            </h1>

            <p class="page-subtitle">
                Perbarui informasi produk WEARLY.
            </p>

        </div>


        <!-- ERROR -->

        @if ($errors->any())

            <div class="error-box">

                <strong>
                    Terjadi kesalahan:
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <!-- FORM CARD -->

        <div class="form-card">

            <h2 class="form-title">
                Product Information
            </h2>

            <form
                action="{{ route('admin.products.update', $product->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <!-- PRODUCT NAME -->

                <div class="form-group">

                    <label for="nama">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $product->nama) }}"
                        placeholder="Masukkan nama produk"
                        required
                    >

                </div>


                <!-- CATEGORY + PRICE -->

                <div class="form-row">

                    <div class="form-group">

                        <label for="kategori">
                            Category
                        </label>

                        <input
                            type="text"
                            id="kategori"
                            name="kategori"
                            value="{{ old('kategori', $product->kategori) }}"
                            placeholder="Contoh: Tas"
                            required
                        >

                    </div>

                    <div class="form-group">

                        <label for="harga">
                            Price
                        </label>

                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            value="{{ old('harga', $product->harga) }}"
                            min="0"
                            placeholder="Contoh: 90000"
                            required
                        >

                    </div>

                </div>


                <!-- STOCK -->

                <div class="form-group">

                    <label for="stok">
                        Stock
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', $product->stok ?? 0) }}"
                        min="0"
                        placeholder="Masukkan jumlah stok"
                        required
                    >

                    <span class="form-help">
                        Masukkan jumlah stok produk yang tersedia.
                    </span>

                </div>


                <!-- BERAT PRODUK -->

                <div class="form-group">

                    <label for="berat">
                        Berat Produk (gram)
                    </label>

                    <input
                        type="number"
                        id="berat"
                        name="berat"
                        value="{{ old('berat', $product->berat ?? 500) }}"
                        placeholder="Contoh: 500"
                        min="1"
                        required
                    >

                    <span class="form-help">
                        Masukkan berat satu produk dalam gram.
                    </span>

                </div>


                <!-- DESCRIPTION -->

                <div class="form-group">

                    <label for="deskripsi">
                        Description
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi produk..."
                    >{{ old('deskripsi', $product->deskripsi) }}</textarea>

                </div>


                <!-- IMAGE -->

                <div class="form-group">

                    <label for="gambar">
                        Product Image
                    </label>

                    <div class="current-image">

                        @if ($product->gambar)

                            <img
                                src="{{ asset('images/products/' . $product->gambar) }}"
                                alt="{{ $product->nama }}"
                            >

                            <span class="image-caption">
                                Gambar produk saat ini
                            </span>

                        @else

                            <div class="no-image">
                                Belum ada gambar
                            </div>

                        @endif

                    </div>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="file-input"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <span class="form-help">
                        Pilih gambar baru jika ingin mengganti gambar produk. Format JPG, JPEG, PNG, atau WEBP.
                    </span>

                </div>


                <!-- BUTTON -->

                <div class="form-actions">

                    <button
                        type="submit"
                        class="save-button"
                    >
                        Update Product
                    </button>

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>
