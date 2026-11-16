
@php
    use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WEARLY - Categories</title>

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

        /* PAGE HEADER */

        .topbar {
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

        /* ADD CATEGORY */

        .action-row {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

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

        .success {
            background: #f5e9d8;
            border: 1px solid #d6b98c;
            color: #66513d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* TABLE PANEL */

        .table-card {
            background: linear-gradient(145deg, #ffffff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(47, 41, 37, 0.04);
        }

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
            padding: 15px 18px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        td {
            color: #493c33;
            padding: 16px 18px;
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

        .number {
            width: 60px;
            color: #94877b;
        }

        /* CATEGORY IMAGE */

        .category-image {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 9px;
            border: 1px solid #eadfd2;
            display: block;
        }

        .no-image {
            width: 65px;
            height: 65px;
            border-radius: 9px;
            background: #f5eee5;
            border: 1px dashed #d6b98c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94877b;
            font-size: 10px;
            text-align: center;
        }

        .category-name {
            color: #493c33;
            font-size: 13px;
            font-weight: 800;
        }

        .description {
            color: #94877b;
            font-size: 12px;
            line-height: 1.6;
            max-width: 550px;
        }

        .date {
            color: #94877b;
            font-size: 11px;
            white-space: nowrap;
        }

        /* ACTION BUTTONS */

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn {
            border: none;
            padding: 8px 12px;
            border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
            white-space: nowrap;
        }

        .btn-edit {
            background: #eee5da;
            color: #654c39;
        }

        .btn-edit:hover {
            background: #d6b98c;
            color: #352b25;
        }

        .btn-delete {
            background: #f3e3dc;
            color: #8a5545;
        }

        .btn-delete:hover {
            background: #e2c5b8;
            color: #6e382c;
        }

        /* EMPTY STATE */

        .empty {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-title {
            color: #493c33;
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .empty p {
            color: #8b7d70;
            font-size: 12px;
            margin-bottom: 20px;
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

            .topbar {
                align-items: flex-start;
                flex-direction: column;
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

            .action-row {
                justify-content: stretch;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }

            .table-card {
                border-radius: 13px;
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

                <a href="{{ route('admin.products.index') }}">Products</a>

                <a href="{{ route('admin.categories.index') }}" class="active">
                    Categories
                </a>

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

        <!-- PAGE HEADER -->
        <div class="topbar">
            <div>
                <h1 class="page-title">Categories</h1>
                <p class="page-subtitle">
                    Kelola kategori produk WEARLY.
                </p>
            </div>
        </div>

        <!-- ADD CATEGORY -->
        <div class="action-row">
            <a href="{{ route('admin.categories.create') }}" class="add-button">
                + Add Category
            </a>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- CATEGORY TABLE -->
        <div class="table-card">

            @if ($categories->count() > 0)

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th width="70">No</th>
                                <th width="110">Foto</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th width="150">Dibuat</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="number">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        @if ($category->foto && Storage::disk('public')->exists($category->foto))
                                            <img
                                                src="{{ asset('storage/' . $category->foto) }}"
                                                alt="{{ $category->nama }}"
                                                class="category-image"
                                            >
                                        @else
                                            <div class="no-image">
                                                No Image
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="category-name">
                                            {{ $category->nama }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="description">
                                            {{ $category->deskripsi ?: '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="date">
                                            {{ $category->created_at->format('d M Y') }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="actions">

                                            <a
                                                href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="btn btn-edit"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                method="POST"
                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-delete">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="empty">
                    <div class="empty-title">
                        Belum Ada Kategori
                    </div>

                    <p>
                        Silakan tambahkan kategori produk pertama kamu.
                    </p>

                    <a href="{{ route('admin.categories.create') }}" class="add-button">
                        + Add Category
                    </a>
                </div>

            @endif

        </div>

    </main>

</body>
</html>
