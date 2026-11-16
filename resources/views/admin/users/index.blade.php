
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WEARLY - Users</title>

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

        /* CONTENT HEADER */

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .content-header h2 {
            font-family: 'DM Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
        }

        .btn-add {
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

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 18px rgba(47, 41, 37, 0.2);
        }

        /* ALERT */

        .alert-success {
            background: #f5e9d8;
            border: 1px solid #d6b98c;
            color: #66513d;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error {
            background: #f3e3dc;
            border: 1px solid #e2c5b8;
            color: #8a5545;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* TABLE */

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
            min-width: 700px;
        }

        thead {
            background: #f5eee5;
        }

        th {
            text-align: left;
            color: #8b7d70;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 18px;
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid #f0e9e1;
            color: #493c33;
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

        /* USER INFORMATION */

        .user-name {
            color: #493c33;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .user-email {
            color: #94877b;
            font-size: 11px;
        }

        /* ROLE BADGE */

        .role {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .role-admin {
            background: #f5e9d8;
            color: #896b4d;
            border: 1px solid #e8d6bd;
        }

        .role-user {
            background: #eee5da;
            color: #756a63;
            border: 1px solid #e4d9cb;
        }

        /* ACTION BUTTONS */

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .btn-edit {
            display: inline-block;
            background: #eee5da;
            color: #654c39;
            padding: 8px 12px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            transition: 0.3s;
            white-space: nowrap;
        }

        .btn-edit:hover {
            background: #d6b98c;
            color: #352b25;
        }

        .btn-delete {
            border: none;
            background: #f3e3dc;
            color: #8a5545;
            padding: 8px 12px;
            border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            white-space: nowrap;
        }

        .btn-delete:hover {
            background: #e2c5b8;
            color: #6e382c;
        }

        /* EMPTY STATE */

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #8b7d70;
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

            .content-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .btn-add {
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

                <a href="{{ route('admin.categories.index') }}">Categories</a>

                <a href="{{ route('admin.users.index') }}" class="active">
                    Users
                </a>

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
                <h1 class="page-title">Users</h1>

                <p class="page-subtitle">
                    Kelola akun pengguna dan administrator WEARLY.
                </p>
            </div>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- CONTENT HEADER -->
        <div class="content-header">
            <h2>Daftar Users</h2>

            <a href="{{ route('admin.users.create') }}" class="btn-add">
                + Add User
            </a>
        </div>

        <!-- USER TABLE -->
        <div class="table-card">

            @if ($users->count() > 0)

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Bergabung</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <div class="user-name">
                                            {{ $user->name }}
                                        </div>

                                        <div class="user-email">
                                            {{ $user->email }}
                                        </div>
                                    </td>

                                    <td>
                                        @if ($user->role === 'admin')
                                            <span class="role role-admin">
                                                Admin
                                            </span>
                                        @else
                                            <span class="role role-user">
                                                User
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <span style="color: #94877b; white-space: nowrap;">
                                            {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="actions">

                                            <a
                                                href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn-edit"
                                            >
                                                Edit
                                            </a>

                                            @if ($user->id !== auth()->id())
                                                <form
                                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn-delete">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else

                <div class="empty">
                    Belum ada user yang terdaftar.
                </div>

            @endif

        </div>

    </main>

</body>
</html>
