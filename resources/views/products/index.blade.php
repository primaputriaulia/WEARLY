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

        /* NAVBAR */

        .navbar {
            background-color: #2f2925;
            height: 70px;
            padding: 0 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #f5e9d8;
            font-size: 28px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .logo span {
            color: #d6b98c;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .menu a {
            color: #f8f5f0;
            text-decoration: none;
            font-size: 15px;
        }

        .menu a:hover {
            color: #d6b98c;
        }

        .menu a.active {
            color: #d6b98c !important;
            font-weight: bold;
        }

        .cart {
            border: 1px solid #d6b98c;
            padding: 8px 16px;
            border-radius: 20px;
        }


        /* CONTAINER */

        .container {
            padding: 50px 8%;
        }


        /* HEADER */

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 35px;
        }

        .header p {
            color: #756a63;
            margin-top: 7px;
        }


        /* BUTTON TAMBAH */

        .add-button {
            background-color: #2f2925;
            color: white;

            padding: 12px 20px;
            text-decoration: none;

            border-radius: 8px;
            font-size: 14px;
        }

        .add-button:hover {
            background-color: #9a7651;
        }


        /* SUCCESS MESSAGE */

        .success {
            background-color: #dff0d8;
            color: #3c763d;

            padding: 14px;
            border-radius: 8px;

            margin-bottom: 25px;
        }


        /* PRODUCTS */

        .products-container {
            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(230px, 1fr));

            gap: 25px;
        }


        /* CARD */

        .card {
            background-color: white;

            border-radius: 12px;
            overflow: hidden;

            box-shadow:
                0 4px 12px rgba(0,0,0,0.08);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }


        /* PRODUCT IMAGE */

        .product-image {
            height: 160px;

            background-color: #e4d6c5;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 55px;
        }


        /* CARD CONTENT */

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin-bottom: 8px;
        }

        .kategori {
            color: #9a7651;
            font-size: 14px;

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
        }


        /* ACTION */

        .actions {
            margin-top: 20px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .edit {
            color: #9a7651;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .edit:hover {
            color: #2f2925;
        }

        .delete-button {
            border: none;

            background-color: #b94b4b;
            color: white;

            padding: 8px 13px;
            border-radius: 6px;

            cursor: pointer;
        }

        .delete-button:hover {
            opacity: 0.8;
        }


        /* EMPTY */

        .empty {
            background-color: white;

            padding: 40px;
            border-radius: 10px;

            text-align: center;

            color: #756a63;
        }


        /* RESPONSIVE */

        @media (max-width: 768px) {

            .navbar {
                padding: 0 5%;
            }

            .menu {
                gap: 12px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;

                gap: 20px;
            }

        }

    </style>
</head>


<body>


    <!-- NAVBAR -->

   <nav class="navbar">

    <a href="/" class="logo">
        WEAR<span>LY</span>
    </a>

    <div class="menu">

    <a href="/">Home</a>

    <a href="{{ route('categories') }}">Kategori</a>

    <a href="{{ route('products.index') }}" class="active">Produk</a>

    <a href="{{ route('cart.index') }}" class="cart">🛒 Cart</a>

</div>

</nav>


    <!-- CONTENT -->

    <div class="container">


        <!-- HEADER -->

        <div class="header">

            <div>

                <h1>Daftar Produk</h1>

                <p>
                    Kelola produk yang tersedia di WEARLY.
                </p>

            </div>


            <a href="{{ route('products.create') }}" class="add-button">

                + Tambah Produk

            </a>

        </div>



        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif



        <!-- PRODUCTS -->

        <div class="products-container">


            @forelse($products as $product)


                <div class="card">


                    <!-- IMAGE -->

                    <div class="product-image">

                        🛍️

                    </div>



                    <!-- CONTENT -->

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



                        <!-- ACTION -->

                        <div class="actions">


                            <a href="{{ route('products.edit', $product->id) }}"
                               class="edit">

                                Edit

                            </a>



                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="delete-button">

                                    Hapus

                                </button>


                            </form>


                        </div>


                    </div>


                </div>


            @empty


                <div class="empty">

                    <h2>Belum ada produk 🛍️</h2>

                    <br>

                    <p>
                        Silakan tambahkan produk baru terlebih dahulu.
                    </p>

                </div>


            @endforelse


        </div>


    </div>


</body>
</html>