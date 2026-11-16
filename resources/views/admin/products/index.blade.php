
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - WEARLY Admin</title>

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

        /* SIDEBAR - SAMA PERSIS DENGAN DASHBOARD */

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

        /* MAIN CONTENT */

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 38px 45px;
            min-height: 100vh;
        }

        /* PAGE HEADER */

        .page-header {
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

        /* BUTTON */

        .add-button {
            display: inline-block;
            background: linear-gradient(135deg, #493c33 0%, #654c39 50%, #896b4d 100%);
            color: #fff;
            padding: 13px 21px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 14px rgba(47, 41, 37, 0.12);
            white-space: nowrap;
        }

        .add-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 18px rgba(47, 41, 37, 0.2);
        }

        /* SUCCESS MESSAGE */

        .success-message {
            background: #f5e9d8;
            border: 1px solid #d6b98c;
            color: #66513d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* PRODUCT PANEL */

        .product-panel {
            background: linear-gradient(145deg, #ffffff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(47, 41, 37, 0.04);
        }

        .panel-header {
            padding: 25px;
            border-bottom: 1px solid #eadfd2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .panel-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
        }

        .product-count {
            color: #8b7d70;
            font-size: 12px;
            margin-top: 5px;
        }

        /* SEARCH */

        .search-box {
            width: 260px;
            max-width: 100%;
        }

        .search-box input {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #e8ddcf;
            border-radius: 9px;
            outline: none;
            font-family: inherit;
            font-size: 12px;
            color: #493c33;
            background: #fcfaf7;
            transition: 0.3s;
        }

        .search-box input:focus {
            border-color: #a88965;
            box-shadow: 0 0 0 3px rgba(214, 185, 140, 0.18);
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            background: #f5eee5;
            color: #8b7d70;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 18px;
            white-space: nowrap;
        }

        td {
            color: #493c33;
            padding: 15px 18px;
            border-bottom: 1px solid #f0e9e1;
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #fcf8f2;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* PRODUCT IMAGE */

        .product-image {
            width: 62px;
            height: 62px;
            border-radius: 10px;
            background: #f0e5d6;
            object-fit: cover;
            display: block;
            border: 1px solid #eee2d3;
        }

        .image-placeholder {
            width: 62px;
            height: 62px;
            border-radius: 10px;
            background: linear-gradient(135deg, #f5e9d8, #e3cfb3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #896b4d;
            font-size: 10px;
            font-weight: 800;
        }

        .product-name {
            font-weight: 800;
            color: #493c33;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .product-description {
            color: #94877b;
            font-size: 11px;
            max-width: 260px;
            line-height: 1.5;
        }

        /* CATEGORY */

        .category-badge {
            display: inline-block;
            background: #f5e9d8;
            color: #896b4d;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* PRICE */

        .price {
            color: #493c33;
            font-weight: 800;
            white-space: nowrap;
        }

        /* STOCK */

        .stock {
            font-weight: 800;
            color: #493c33;
        }

        .stock.low {
            color: #a4773f;
        }

        .stock.empty {
            color: #9b5545;
        }

        .stock-label {
            display: block;
            font-size: 10px;
            margin-top: 4px;
            color: #94877b;
            font-weight: 500;
        }

        /* ACTION */

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .edit-button,
        .delete-button {
            border: none;
            border-radius: 7px;
            padding: 8px 12px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            white-space: nowrap;
        }

        .edit-button {
            background: #eee5da;
            color: #654c39;
        }

        .edit-button:hover {
            background: #d6b98c;
            color: #352b25;
        }

        .delete-button {
            background: #f3e3dc;
            color: #8a5545;
        }

        .delete-button:hover {
            background: #e2c5b8;
            color: #6e382c;
        }

        /* EMPTY STATE */

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-state h3 {
            color: #493c33;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #8b7d70;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .search-empty {
            display: none;
            text-align: center;
            padding: 30px 15px;
            color: #9a8d81;
            font-size: 13px;
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

            .page-title {
                font-size: 27px;
            }

            .page-header {
                align-items: flex-start;
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }

            .panel-header {
                padding: 17px;
            }

            .product-panel {
                border-radius: 13px;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>
            <div class="logo">WEAR<span>LY</span></div>

            <div class="admin-label">ADMIN PANEL</div>

            <div class="menu-title">Menu</div>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" class="active">Products</a>
                <a href="{{ route('admin.categories.index') }}">Categories</a>
                <a href="{{ route('admin.users.index') }}">Users</a>
                <a href="{{ route('admin.orders.index') }}">Orders</a>
                <a href="{{ route('admin.reports.index') }}">Reports</a>
            </nav>
        </div>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ url('/logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <div class="page-header">
            <div>
                <h1 class="page-title">Products</h1>
                <p class="page-subtitle">
                    Kelola produk fashion yang tersedia di WEARLY.
                </p>
            </div>

            <a href="{{ route('admin.products.create') }}" class="add-button">
                + Add Product
            </a>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="product-panel">

            <div class="panel-header">
                <div>
                    <h2 class="panel-title">Product List</h2>
                    <div class="product-count">
                        {{ $products->count() }} produk dalam katalog
                    </div>
                </div>

                <div class="search-box">
                    <input
                        type="text"
                        id="productSearch"
                        placeholder="Cari nama atau kategori produk..."
                    >
                </div>
            </div>

            @if($products->count() > 0)

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>IMAGE</th>
                                <th>PRODUCT</th>
                                <th>CATEGORY</th>
                                <th>PRICE</th>
                                <th>STOCK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>

                        <tbody id="productTable">

                            @foreach($products as $product)
                                <tr class="product-row">

                                    <td>
                                        @if($product->gambar)
                                            <img
                                                src="{{ asset('images/products/' . $product->gambar) }}"
                                                alt="{{ $product->nama }}"
                                                class="product-image"
                                            >
                                        @else
                                            <div class="image-placeholder">
                                                WEARLY
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="product-name">
                                            {{ $product->nama }}
                                        </div>

                                        <div class="product-description">
                                            {{ $product->deskripsi
                                                ? Str::limit($product->deskripsi, 80)
                                                : 'Tidak ada deskripsi.'
                                            }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="category-badge">
                                            {{ $product->kategori }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="price">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($product->stok <= 0)
                                            <span class="stock empty">0</span>
                                            <span class="stock-label">Habis</span>
                                        @elseif($product->stok <= 5)
                                            <span class="stock low">
                                                {{ $product->stok }}
                                            </span>
                                            <span class="stock-label">Stok menipis</span>
                                        @else
                                            <span class="stock">
                                                {{ $product->stok }}
                                            </span>
                                            <span class="stock-label">Tersedia</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <a
                                                href="{{ route('admin.products.edit', $product->id) }}"
                                                class="edit-button"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                method="POST"
                                                action="{{ route('admin.products.destroy', $product->id) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="delete-button">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="search-empty" id="searchEmpty">
                        Produk yang kamu cari tidak ditemukan.
                    </div>
                </div>

            @else

                <div class="empty-state">
                    <h3>Belum Ada Produk</h3>
                    <p>Tambahkan produk pertama ke toko WEARLY.</p>

                    <a href="{{ route('admin.products.create') }}" class="add-button">
                        + Add Product
                    </a>
                </div>

            @endif

        </div>

    </main>

    <script>
        const searchInput = document.getElementById('productSearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase();
                const rows = document.querySelectorAll('.product-row');
                let visibleCount = 0;

                rows.forEach(function (row) {
                    const name = row.querySelector('.product-name').textContent.toLowerCase();
                    const category = row.querySelector('.category-badge').textContent.toLowerCase();

                    const match = name.includes(keyword) || category.includes(keyword);

                    row.style.display = match ? '' : 'none';

                    if (match) visibleCount++;
                });

                const searchEmpty = document.getElementById('searchEmpty');

                if (searchEmpty) {
                    searchEmpty.style.display = visibleCount === 0 ? 'block' : 'none';
                }
            });
        }
    </script>

</body>
</html>
