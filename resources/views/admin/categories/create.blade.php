
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEARLY - Add Category</title>

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

        .form-card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 28px;
            max-width: 900px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .04);
        }

        .form-title {
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

        .form-group input,
        .form-group textarea {
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
        .form-group textarea:focus {
            border-color: #b99569;
            background: white;
            box-shadow: 0 0 0 3px rgba(185, 149, 105, .12);
        }

        .form-group textarea {
            min-height: 140px;
            resize: vertical;
        }

        .form-group input[type="file"] {
            padding: 11px;
            cursor: pointer;
        }

        .form-help {
            display: block;
            margin-top: 7px;
            font-size: 12px;
            color: #8b7d70;
        }

        .image-preview {
            display: none;
            margin-top: 15px;
            width: 190px;
            height: 145px;
            border: 1px solid #eadfd2;
            border-radius: 10px;
            overflow: hidden;
            background: #f5e9d8;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

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

    <aside class="sidebar">
        <div>
            <div class="logo">WEAR<span>LY</span></div>
            <div class="admin-label">ADMIN PANEL</div>
            <div class="menu-title">Menu</div>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.products.index') }}">Products</a>
                <a href="{{ route('admin.categories.index') }}" class="active">Categories</a>
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

    <main class="main">

        <div class="page-header">
            <h1 class="page-title">Add Category</h1>
            <p class="page-subtitle">
                Tambahkan kategori baru untuk produk WEARLY.
            </p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">

            <h2 class="form-title">Category Information</h2>

            <form
                action="{{ route('admin.categories.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Contoh: T-Shirt"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi kategori..."
                    >{{ old('deskripsi') }}</textarea>

                    <span class="form-help">
                        Jelaskan jenis produk yang termasuk dalam kategori ini.
                    </span>
                </div>

                <!-- CATEGORY PHOTO -->

                <div class="form-group">
                    <label for="foto">Foto Kategori</label>

                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                        required
                    >

                    <span class="form-help">
                        Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.
                    </span>

                    <div class="image-preview" id="imagePreview">
                        <img src="" id="previewImage" alt="Preview Foto Kategori">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="save-button">
                        Save Category
                    </button>

                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </main>

</div>

<script>
    const fotoInput = document.getElementById('foto');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
                this.value = '';
                imagePreview.style.display = 'none';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                this.value = '';
                imagePreview.style.display = 'none';
                return;
            }

            previewImage.src = URL.createObjectURL(file);
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }
    });
</script>

</body>
</html>
