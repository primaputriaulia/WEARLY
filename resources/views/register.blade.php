
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun - WEARLY</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background:
                radial-gradient(circle at 12% 20%, rgba(185, 149, 105, 0.18), transparent 25%),
                radial-gradient(circle at 88% 80%, rgba(137, 107, 77, 0.15), transparent 28%),
                linear-gradient(135deg, #f3ede5, #e9dfd3);
            color: #2f2925;
            position: relative;
            overflow-x: hidden;
        }

        /* Ornamen background */
        body::before {
            content: "";
            position: fixed;
            width: 350px;
            height: 350px;
            border: 1px solid rgba(137, 107, 77, 0.17);
            border-radius: 50%;
            top: -145px;
            right: -90px;
            pointer-events: none;
        }

        body::after {
            content: "";
            position: fixed;
            width: 260px;
            height: 260px;
            border: 1px solid rgba(137, 107, 77, 0.15);
            border-radius: 50%;
            bottom: -110px;
            left: -65px;
            pointer-events: none;
        }

        /* Pembungkus halaman */
        .page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            z-index: 1;
        }

        /* Card utama */
        .auth-card {
            width: 100%;
            max-width: 1180px;
            min-height: 650px;
            display: flex;
            background: #fffdfa;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(73, 60, 51, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        /* Bagian gambar - 45% */
        .image-section {
            width: 45%;
            min-height: 650px;
            flex-shrink: 0;
            background-color: #d6c2aa;
            background-image:
                linear-gradient(
                    to bottom,
                    rgba(47, 41, 37, 0.08),
                    rgba(47, 41, 37, 0.35)
                ),
                url("{{ asset('images/register-earth-tone.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            align-items: flex-end;
            padding: 40px;
        }

        .image-overlay {
            color: #fffdfa;
            position: relative;
            z-index: 1;
        }

        .image-overlay .small-text {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 15px;
            font-weight: 600;
            opacity: 0.9;
        }

        .image-overlay h2 {
            font-size: 32px;
            line-height: 1.25;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .image-overlay p {
            font-size: 13px;
            line-height: 1.8;
            max-width: 300px;
            color: rgba(255, 253, 250, 0.9);
        }

        /* Bagian form - 55% */
        .form-section {
            width: 55%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 35px 50px;
        }

        .form-container {
            width: 100%;
            max-width: 420px;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #493c33;
            margin-bottom: 25px;
        }

        .logo span {
            color: #b99569;
        }

        .form-heading {
            margin-bottom: 23px;
        }

        .form-heading h1 {
            font-size: 27px;
            font-weight: 700;
            color: #2f2925;
            margin-bottom: 8px;
        }

        .form-heading p {
            font-size: 13px;
            color: #8b7d70;
            line-height: 1.7;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #493c33;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #e8ded2;
            border-radius: 9px;
            outline: none;
            background: #fffdfa;
            color: #2f2925;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            transition: 0.25s ease;
        }

        .form-group input::placeholder {
            color: #b5aaa0;
        }

        .form-group input:focus {
            border-color: #a98a67;
            box-shadow: 0 0 0 3px rgba(185, 149, 105, 0.12);
        }

        .error-message {
            color: #b64b42;
            font-size: 11px;
            margin-top: 6px;
        }

        /* Tombol daftar */
        .register-button {
            width: 100%;
            height: 47px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, #493c33, #2f2925);
            color: #fffdfa;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            margin-top: 7px;
            transition: 0.25s ease;
        }

        .register-button:hover {
            background: linear-gradient(135deg, #896b4d, #654c39);
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(73, 60, 51, 0.18);
        }

        /* Link masuk */
        .login-text {
            text-align: center;
            font-size: 12px;
            color: #8b7d70;
            margin-top: 20px;
        }

        .login-text a {
            color: #795b3e;
            font-weight: 700;
            text-decoration: none;
            margin-left: 3px;
        }

        .login-text a:hover {
            color: #493c33;
            text-decoration: underline;
        }

        /* Kembali ke beranda */
        .back-home {
            display: inline-block;
            margin-top: 20px;
            color: #8b7d70;
            font-size: 12px;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-home:hover {
            color: #493c33;
        }

        /* Responsive tablet */
        @media (max-width: 1000px) {
            .page-wrapper {
                padding: 25px;
            }

            .auth-card {
                max-width: 850px;
                min-height: 620px;
            }

            .image-section {
                width: 40%;
                min-height: 620px;
                padding: 30px;
            }

            .form-section {
                width: 60%;
                padding: 35px;
            }

            .image-overlay h2 {
                font-size: 27px;
            }
        }

        /* Responsive HP */
        @media (max-width: 700px) {
            .page-wrapper {
                padding: 18px;
            }

            .auth-card {
                max-width: 480px;
                min-height: auto;
                border-radius: 20px;
            }

            .image-section {
                display: none;
            }

            .form-section {
                width: 100%;
                padding: 35px 25px;
            }

            .logo {
                margin-bottom: 25px;
            }

            .form-heading h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <div class="auth-card">

            <!-- Bagian gambar butik -->
            <div class="image-section">
                <div class="image-overlay">

                    <div class="small-text">
                        KOLEKSI WEARLY
                    </div>

                    <h2>
                        Tampil Stylish<br>
                        Dengan Gayamu.
                    </h2>

                    <p>
                        Temukan gaya terbaikmu dan ekspresikan diri
                        melalui setiap detail penampilan.
                    </p>

                </div>
            </div>

            <!-- Bagian form daftar -->
            <div class="form-section">

                <div class="form-container">

                    <div class="logo">
                        WEAR<span>LY</span>
                    </div>

                    <div class="form-heading">
                        <h1>Buat Akun Baru</h1>

                        <p>
                            Daftarkan dirimu dan mulai perjalanan fashion-mu bersama WEARLY.
                        </p>
                    </div>

                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Masukkan nama lengkap"
                                value="{{ old('name') }}"
                                required
                            >

                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email</label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan alamat email"
                                value="{{ old('email') }}"
                                required
                            >

                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Kata Sandi</label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Buat kata sandi"
                                required
                            >

                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">
                                Konfirmasi Kata Sandi
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Masukkan ulang kata sandi"
                                required
                            >
                        </div>

                        <button type="submit" class="register-button">
                            Daftar Sekarang
                        </button>

                    </form>

                    <div class="login-text">
                        Sudah memiliki akun?
                        <a href="/login">Masuk di Sini</a>
                    </div>

                    <div style="text-align: center;">
                        <a href="/" class="back-home">
                            ← Kembali ke Beranda
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
