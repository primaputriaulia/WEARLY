
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - WEARLY</title>

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

        .layout {
            min-height: 100vh;
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
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 7px;
            letter-spacing: -.8px;
        }

        .subtitle {
            color: #756a63;
            font-size: 14px;
        }

        .form-card {
            background: linear-gradient(145deg, #fff, #fcf9f5);
            border: 1px solid #eadfd2;
            border-radius: 17px;
            padding: 30px;
            max-width: 850px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .04);
        }

        .form-card h3 {
            font-size: 18px;
            font-weight: 800;
            color: #2f2925;
            margin-bottom: 5px;
        }

        .form-description {
            color: #8b7d70;
            font-size: 12px;
            margin-bottom: 27px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            color: #2f2925;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #ddd0c2;
            border-radius: 9px;
            padding: 13px 15px;
            background: #fff;
            color: #2f2925;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            transition: .3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #9a7651;
            box-shadow: 0 0 0 3px rgba(154, 118, 81, .10);
        }

        .form-group textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #aaa098;
        }

        .form-group input[type="file"] {
            padding: 11px;
            cursor: pointer;
        }

        .form-help {
            display: block;
            margin-top: 7px;
            color: #8b7d70;
            font-size: 12px;
        }

        .current-image {
            margin-bottom: 15px;
        }

        .current-image img,
        .image-preview img {
            width: 190px;
            height: 145px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eadfd2;
            background: #f5e9d8;
        }

        .current-image p {
            color: #8b7d70;
            font-size: 12px;
            margin-top: 7px;
        }

        .image-preview {
            display: none;
            margin-top: 15px;
        }

        .error-box {
            background: #f8e8e5;
            border: 1px solid #e0b5ad;
            color: #8a4035;
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 7px;
        }

        .error-box li {
            margin-bottom: 3px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 28px;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 9px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all .3s ease;
        }

        .btn-update {
            background: linear-gradient(120deg, #493c33, #76583d);
            color: #fff;
        }

        .btn-update:hover {
            background: linear-gradient(120deg, #76583d, #9a7651);
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(47, 41, 37, .15);
        }

        .btn-cancel {
            background: #eee5da;
            color: #493c33;
        }

        .btn-cancel:hover {
            background: #d6b98c;
            transform: translateY(-2px);
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
                padding: 23px;
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

            .form-card {
                padding: 17px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
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
            <h1 class="page-title">Edit Category</h1>
            <p class="subtitle">Perbarui informasi kategori produk WEARLY.</p>
        </div>

        <div class="form-card">

            <h3>Informasi Kategori</h3>
            <p class="form-description">
                Ubah nama, deskripsi, atau foto kategori produk.
            </p>

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

            <form
                action="{{ route('admin.categories.update', $category->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $category->nama) }}"
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
                    >{{ old('deskripsi', $category->deskripsi) }}</textarea>
                </div>

                <!-- CATEGORY PHOTO -->

                <div class="form-group">
                    <label for="foto">Foto Kategori</label>

                    @if ($category->foto)
                        <div class="current-image" id="currentImage">
                            <img
                                src="{{ asset('storage/' . $category->foto) }}"
                                alt="Foto {{ $category->nama }}"
                            >
                            <p>Foto kategori saat ini</p>
                        </div>
                    @else
                        <div class="current-image" id="currentImage">
                            <p>Belum ada foto kategori.</p>
                        </div>
                    @endif

                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    >

                    <span class="form-help">
                        Pilih foto baru jika ingin mengganti foto saat ini.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </span>

                    <div class="image-preview" id="imagePreview">
                        <img src="" id="previewImage" alt="Preview Foto Baru">
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-update">
                        Update Category
                    </button>

                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="btn btn-cancel"
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
    const currentImage = document.getElementById('currentImage');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            imagePreview.style.display = 'none';
            return;
        }

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
    });
</script>

</body>
</html>
