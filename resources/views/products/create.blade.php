<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk - WEARLY</title>

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

        .navbar {
            background-color: #2f2925;
            padding: 20px 8%;
        }

        .logo {
            color: #f5e9d8;
            font-size: 26px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .form-card {
            background-color: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .button {
            background-color: #2f2925;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .button:hover {
            background-color: #9a7651;
        }

        .back {
            margin-left: 15px;
            color: #756a63;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="/products" class="logo">WEARLY</a>
    </nav>

    <div class="container">

        <div class="form-card">

            <h1>Tambah Produk</h1>

            <form action="/products" method="POST">

                @csrf

                <label>Nama Produk</label>
                <input type="text" name="nama" required>

                <label>Kategori</label>
                <input type="text" name="kategori" required>

                <label>Harga</label>
                <input type="number" name="harga" required>

                <label>Deskripsi</label>
                <textarea name="deskripsi"></textarea>

                <button type="submit" class="button">
                    Simpan Produk
                </button>

                <a href="/products" class="back">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</body>
</html>