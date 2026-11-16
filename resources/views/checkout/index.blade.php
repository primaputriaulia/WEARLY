
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - WEARLY</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f8f5f0;
            --white: #fffdf9;
            --brown: #493c33;
            --dark: #2f2925;
            --mocha: #765b46;
            --gold: #c7a77e;
            --cream: #f5e9d8;
            --muted: #8b8077;
            --border: #eadfd2;
            --shadow: 0 5px 22px rgba(47, 41, 37, .055);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
        }

        button, input, textarea, select {
            font-family: inherit;
        }

        /* NAVBAR */
        .navbar-wrapper {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 13px 6%;
            background: rgba(248, 245, 240, .94);
            backdrop-filter: blur(14px);
        }

        .navbar {
            max-width: 1400px;
            min-height: 65px;
            margin: auto;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--dark);
            border-radius: 50px;
            box-shadow: 0 5px 20px rgba(47, 41, 37, .12);
        }

        .logo {
            color: var(--bg);
            font-size: 25px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .logo span {
            color: var(--gold);
        }

        .back {
            color: var(--bg);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .25s;
        }

        .back:hover {
            color: var(--gold);
        }

        /* CONTAINER */
        .container {
            width: 88%;
            max-width: 1280px;
            margin: 42px auto 75px;
        }

        .page-heading {
            margin-bottom: 27px;
        }

        .eyebrow {
            color: var(--mocha);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        h1 {
            font-size: 31px;
            font-weight: 800;
            letter-spacing: -.8px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        /* ERROR */
        .error-box {
            background: #f8e8e5;
            border: 1px solid #efd2cc;
            color: #a34e42;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 12px;
            line-height: 1.7;
        }

        .error-box ul {
            padding-left: 20px;
            margin-top: 5px;
        }

        /* MAIN LAYOUT */
        .checkout-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.55fr) minmax(320px, .85fr);
            gap: 25px;
            align-items: start;
        }

        .checkout-left,
        .summary-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 28px;
            box-shadow: var(--shadow);
        }

        .summary-card {
            position: sticky;
            top: 105px;
            align-self: start;
            max-height: calc(100vh - 125px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--gold) var(--bg);
        }

        /* SECTION */
        .section {
            margin-bottom: 29px;
        }

        .section:last-child {
            margin-bottom: 0;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 21px;
        }

        .section-number {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--cream);
            color: var(--brown);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
            flex-shrink: 0;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;
            color: var(--dark);
        }

        .section-description {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
            margin-top: 5px;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 26px 0;
        }

        /* FORM */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0 15px;
        }

        .form-group {
            margin-bottom: 17px;
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--brown);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #ddd0c2;
            border-radius: 10px;
            background: #fff;
            color: var(--dark);
            font-size: 12px;
            transition: .2s;
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group select:disabled {
            background: #f5f2ee;
            color: #a49a91;
            cursor: not-allowed;
        }

        .form-group textarea {
            min-height: 110px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--mocha);
            box-shadow: 0 0 0 3px rgba(118, 91, 70, .09);
        }

        .form-hint {
            font-size: 10px;
            color: var(--muted);
            margin-top: 7px;
            line-height: 1.6;
        }

        .location-summary {
            display: none;
            background: #f5f0e9;
            border: 1px solid var(--border);
            padding: 14px;
            border-radius: 10px;
            font-size: 11px;
            line-height: 1.7;
            color: var(--brown);
            margin-top: 10px;
        }

        .location-summary strong {
            display: block;
            margin-bottom: 4px;
        }

        /* SHIPPING */
        .shipping-options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .shipping-empty {
            padding: 17px;
            border: 1px dashed #d8c9b9;
            border-radius: 11px;
            color: var(--muted);
            font-size: 11px;
            text-align: center;
            line-height: 1.7;
            background: #fcfaf7;
        }

        .shipping-option {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 16px;
            border: 1px solid #ddd0c2;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
            width: 100%;
            background: white;
        }

        .shipping-option:hover {
            border-color: var(--mocha);
            background: #fcfaf7;
        }

        .shipping-option.selected {
            border: 2px solid var(--mocha);
            background: #f8f5f0;
        }

        .shipping-option input {
            accent-color: var(--brown);
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .shipping-info {
            flex: 1;
            min-width: 0;
        }

        .shipping-category {
            display: inline-block;
            background: var(--cream);
            color: var(--mocha);
            font-size: 9px;
            font-weight: 800;
            padding: 5px 9px;
            border-radius: 20px;
            margin-bottom: 7px;
            letter-spacing: .5px;
        }

        .shipping-option.selected .shipping-category {
            background: var(--brown);
            color: white;
        }

        .shipping-name {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .shipping-estimate {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
        }

        .shipping-price {
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            color: var(--mocha);
        }

        /* PAYMENT */
        .payment-options {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 11px;
        }

        .payment-option {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 15px;
            border: 1px solid #ddd0c2;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
            background: white;
        }

        .payment-option:hover {
            border-color: var(--mocha);
            background: #fcfaf7;
        }

        .payment-option.selected {
            border: 2px solid var(--mocha);
            background: #f8f5f0;
        }

        .payment-option input {
            width: 16px;
            height: 16px;
            accent-color: var(--brown);
            margin-top: 2px;
            flex-shrink: 0;
        }

        .payment-info {
            min-width: 0;
        }

        .payment-name {
            font-weight: 800;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .payment-description {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.5;
        }

        .payment-label {
            color: var(--mocha);
            font-size: 9px;
            font-weight: 800;
            margin-top: 7px;
            letter-spacing: .5px;
        }

        /* SUMMARY */
        .summary-title {
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .summary-subtitle {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
            margin-bottom: 17px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid #eee6dd;
        }

        .item-product {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
            min-width: 0;
        }

        .item-image {
            width: 65px;
            height: 72px;
            flex-shrink: 0;
            background: #f5f0e9;
            border-radius: 10px;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .item-image-placeholder {
            font-size: 10px;
            font-weight: 800;
            color: var(--mocha);
        }

        .item-information {
            min-width: 0;
        }

        .item-name {
            font-size: 12px;
            font-weight: 800;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .item-detail {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        .item-color {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
            line-height: 1.4;
        }

        .item-color-circle {
            display: inline-block;
            width: 14px;
            height: 14px;
            min-width: 14px;
            border-radius: 50%;
            border: 1px solid #d8cec2;
            flex-shrink: 0;
        }

        .item-price {
            font-size: 11px;
            font-weight: 800;
            white-space: nowrap;
            color: var(--brown);
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 16px;
            font-size: 12px;
        }

        .price-row span:first-child {
            color: var(--muted);
        }

        .price-row strong {
            text-align: right;
            color: var(--dark);
        }

        .total {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: center;
            border-top: 1px solid var(--border);
            margin-top: 20px;
            padding-top: 19px;
        }

        .total span:first-child {
            font-size: 13px;
            font-weight: 800;
        }

        .total span:last-child {
            font-size: 19px;
            font-weight: 800;
            color: var(--mocha);
            text-align: right;
        }

        .checkout-button {
            display: block;
            width: 100%;
            margin-top: 24px;
            padding: 15px;
            border: none;
            border-radius: 30px;
            background: var(--dark);
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: .25s;
        }

        .checkout-button:hover:not(:disabled) {
            background: var(--mocha);
            transform: translateY(-2px);
        }

        .checkout-button:disabled {
            opacity: .6;
            cursor: not-allowed;
        }

        .secure-note {
            color: var(--muted);
            font-size: 10px;
            text-align: center;
            line-height: 1.6;
            margin-top: 13px;
        }

        .summary-note {
            margin-top: 18px;
            padding: 13px;
            background: #f5f0e9;
            border-radius: 10px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .container {
                width: 92%;
            }

            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .summary-card {
                position: static;
                max-height: none;
                overflow: visible;
            }
        }

        @media (max-width: 650px) {
            .navbar-wrapper {
                padding: 9px 4%;
            }

            .navbar {
                min-height: 58px;
                padding: 0 19px;
            }

            .logo {
                font-size: 21px;
            }

            .back {
                font-size: 11px;
            }

            .container {
                width: 92%;
                margin: 30px auto 55px;
            }

            h1 {
                font-size: 25px;
            }

            .checkout-left,
            .summary-card {
                padding: 20px;
            }

            .form-grid,
            .payment-options {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 15px;
            }

            .total span:last-child {
                font-size: 17px;
            }

            .item {
                gap: 8px;
            }

            .item-image {
                width: 58px;
                height: 65px;
            }

            .item-price {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>

<div class="navbar-wrapper">
    <nav class="navbar">
        <a href="{{ route('user.dashboard') }}" class="logo" style="text-decoration:none;">
            WEAR<span>LY</span>
        </a>

        <a href="{{ route('cart.index') }}" class="back">
            ← Kembali ke Keranjang
        </a>
    </nav>
</div>

@php
    $total = 0;

    foreach ($cart as $item) {
        $total += (int) $item['harga'] * (int) $item['quantity'];
    }
@endphp

<div class="container">

    <div class="page-heading">
        <div class="eyebrow">Almost Yours</div>
        <h1>Checkout</h1>
        <p class="subtitle">
            Lengkapi informasi pengiriman dan pembayaran untuk menyelesaikan pesananmu.
        </p>
    </div>

    @if (session('error'))
        <div class="error-box">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-box">
            <strong>Periksa kembali data checkout kamu.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
        @csrf

        <div class="checkout-layout">

            <!-- KOLOM KIRI -->
            <div class="checkout-left">

                <!-- DATA PENERIMA -->
                <section class="section">

                    <div class="section-heading">
                        <div class="section-number">01</div>
                        <div>
                            <h2 class="section-title">Data Penerima</h2>
                            <p class="section-description">
                                Masukkan informasi penerima pesanan.
                            </p>
                        </div>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input
                                type="text"
                                id="nama_penerima"
                                name="nama_penerima"
                                value="{{ old('nama_penerima', auth()->user()->name ?? '') }}"
                                placeholder="Nama lengkap"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input
                                type="tel"
                                id="no_hp"
                                name="no_hp"
                                value="{{ old('no_hp') }}"
                                placeholder="Contoh: 081234567890"
                                required
                            >
                        </div>

                    </div>
                </section>

                <hr class="divider">

                <!-- ALAMAT -->
                <section class="section">

                    <div class="section-heading">
                        <div class="section-number">02</div>
                        <div>
                            <h2 class="section-title">Alamat Pengiriman</h2>
                            <p class="section-description">
                                Pilih lokasi secara berurutan agar ongkos kirim dapat dihitung dengan tepat.
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="province">Provinsi</label>
                        <select id="province" required>
                            <option value="">Memuat daftar provinsi...</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city">Kota / Kabupaten</label>
                        <select id="city" disabled required>
                            <option value="">Pilih provinsi terlebih dahulu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="district">Kecamatan</label>
                        <select id="district" disabled required>
                            <option value="">Pilih kota/kabupaten terlebih dahulu</option>
                        </select>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="subdistrict">Desa / Kelurahan</label>
                            <select id="subdistrict" disabled required>
                                <option value="">Pilih kecamatan terlebih dahulu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="zip_code">Kode Pos</label>
                            <input
                                type="text"
                                id="zip_code"
                                placeholder="Otomatis terisi"
                                readonly
                            >
                        </div>

                    </div>

                    <div id="location-summary" class="location-summary">
                        <strong>Lokasi tujuan terpilih</strong>
                        <span id="location-summary-text"></span>
                    </div>

                    <input type="hidden" name="destination_id" id="destination_id">
                    <input type="hidden" name="destination_name" id="destination_name">

                    <div class="form-group" style="margin-top:18px;">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea
                            id="alamat"
                            name="alamat"
                            placeholder="Nama jalan, nomor rumah, RT/RW, dan patokan lokasi..."
                            required
                        >{{ old('alamat') }}</textarea>
                        <p class="form-hint">
                            Tuliskan detail alamat agar kurir lebih mudah menemukan lokasi penerima.
                        </p>
                    </div>

                </section>

                <hr class="divider">

                <!-- PENGIRIMAN -->
                <section class="section">

                    <div class="section-heading">
                        <div class="section-number">03</div>
                        <div>
                            <h2 class="section-title">Metode Pengiriman</h2>
                            <p class="section-description">
                                Pilih layanan pengiriman sesuai kebutuhanmu.
                            </p>
                        </div>
                    </div>

                    <div id="shipping-status" class="shipping-empty">
                        Pilih desa atau kelurahan tujuan terlebih dahulu untuk melihat pilihan pengiriman.
                    </div>

                    <div class="shipping-options" id="shipping-options"></div>

                    <input type="hidden" name="metode_pengiriman" id="metode_pengiriman">
                    <input type="hidden" name="kurir" id="kurir">
                    <input type="hidden" name="layanan_kurir" id="layanan_kurir">
                    <input type="hidden" name="ongkir" id="ongkir">
                    <input type="hidden" name="estimasi_pengiriman" id="estimasi_pengiriman">

                </section>

                <hr class="divider">

                <!-- PEMBAYARAN -->
                <section class="section">

                    <div class="section-heading">
                        <div class="section-number">04</div>
                        <div>
                            <h2 class="section-title">Metode Pembayaran</h2>
                            <p class="section-description">
                                Pilih metode pembayaran yang ingin digunakan.
                            </p>
                        </div>
                    </div>

                    <div class="payment-options">

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="gopay"
                                {{ old('metode_pembayaran', 'gopay') == 'gopay' ? 'checked' : '' }}
                                required
                            >
                            <div class="payment-info">
                                <div class="payment-name">GoPay / QRIS</div>
                                <div class="payment-description">Pembayaran melalui GoPay atau QRIS.</div>
                                <div class="payment-label">E-WALLET & QRIS</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="shopeepay"
                                {{ old('metode_pembayaran') == 'shopeepay' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">ShopeePay</div>
                                <div class="payment-description">Pembayaran melalui ShopeePay.</div>
                                <div class="payment-label">E-WALLET</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="dana"
                                {{ old('metode_pembayaran') == 'dana' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">DANA</div>
                                <div class="payment-description">Pembayaran melalui aplikasi DANA.</div>
                                <div class="payment-label">E-WALLET</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="ovo"
                                {{ old('metode_pembayaran') == 'ovo' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">OVO</div>
                                <div class="payment-description">Pembayaran melalui aplikasi OVO.</div>
                                <div class="payment-label">E-WALLET</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="bca_va"
                                {{ old('metode_pembayaran') == 'bca_va' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">BCA Virtual Account</div>
                                <div class="payment-description">Transfer melalui BCA.</div>
                                <div class="payment-label">VIRTUAL ACCOUNT</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="bni_va"
                                {{ old('metode_pembayaran') == 'bni_va' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">BNI Virtual Account</div>
                                <div class="payment-description">Transfer melalui BNI.</div>
                                <div class="payment-label">VIRTUAL ACCOUNT</div>
                            </div>
                        </label>

                        <label class="payment-option">
                            <input
                                type="radio"
                                name="metode_pembayaran"
                                value="bri_va"
                                {{ old('metode_pembayaran') == 'bri_va' ? 'checked' : '' }}
                            >
                            <div class="payment-info">
                                <div class="payment-name">BRI Virtual Account</div>
                                <div class="payment-description">Transfer melalui BRI.</div>
                                <div class="payment-label">VIRTUAL ACCOUNT</div>
                            </div>
                        </label>

                    </div>
                </section>

            </div>

            <!-- KOLOM KANAN -->
            <aside class="summary-card">

                <h2 class="summary-title">Ringkasan Pesanan</h2>
                <p class="summary-subtitle">
                    Periksa kembali produk yang akan kamu beli.
                </p>

                @foreach($cart as $item)
                    @php
                        $itemSubtotal = (int) $item['harga'] * (int) $item['quantity'];

                        $colorMap = [
                            'Hitam' => '#292929',
                            'Putih' => '#ffffff',
                            'Cream' => '#e9dcc8',
                            'Cokelat' => '#795548',
                            'Navy' => '#263b59',
                            'Maroon' => '#762e3b',
                        ];

                        $selectedColor = $colorMap[$item['warna'] ?? ''] ?? '#d6b98c';
                    @endphp

                    <div class="item">

                        <div class="item-product">

                            <div class="item-image">
                                @if(!empty($item['gambar']))
                                    <img
                                        src="{{ asset('images/products/' . $item['gambar']) }}"
                                        alt="{{ $item['nama'] }}"
                                    >
                                @else
                                    <div class="item-image-placeholder">WEARLY</div>
                                @endif
                            </div>

                            <div class="item-information">

                                <div class="item-name">
                                    {{ $item['nama'] }}
                                </div>

                                @if(!empty($item['ukuran']))
                                    <div class="item-detail">
                                        Ukuran: {{ $item['ukuran'] }}
                                    </div>
                                @endif

                                @if(!empty($item['warna']))
                                    <div class="item-color">
                                        <span>Warna:</span>
                                        <span
                                            class="item-color-circle"
                                            style="background-color: {{ $selectedColor }};"
                                        ></span>
                                        <span>{{ $item['warna'] }}</span>
                                    </div>
                                @endif

                                <div class="item-detail">
                                    {{ $item['quantity'] }} x
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </div>

                            </div>

                        </div>

                        <div class="item-price">
                            Rp {{ number_format($itemSubtotal, 0, ',', '.') }}
                        </div>

                    </div>
                @endforeach

                <div class="price-row">
                    <span>Subtotal Produk</span>
                    <strong id="subtotal">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </strong>
                </div>

                <div class="price-row">
                    <span>Ongkos Kirim</span>
                    <strong id="shipping-cost">Rp0</strong>
                </div>

                <div class="total">
                    <span>Total Pembayaran</span>
                    <span id="grand-total">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>
                </div>

                <button type="submit" class="checkout-button" id="checkout-button">
                    Buat Pesanan & Bayar
                </button>

                <p class="secure-note">
                    Pembayaran diproses dengan aman melalui Midtrans.
                </p>

                <div class="summary-note">
                    Pastikan alamat, pilihan kurir, dan metode pembayaran sudah benar sebelum melanjutkan pesanan.
                </div>

            </aside>

        </div>
    </form>

</div>

<script>
    // DATA DASAR
    const subtotal = {{ (int) $total }};
    const totalWeight = {{ (int) $totalWeight }};

    // ELEMEN ALAMAT
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');
    const districtSelect = document.getElementById('district');
    const subdistrictSelect = document.getElementById('subdistrict');
    const zipInput = document.getElementById('zip_code');

    const destinationIdInput = document.getElementById('destination_id');
    const destinationNameInput = document.getElementById('destination_name');

    const locationSummary = document.getElementById('location-summary');
    const locationSummaryText = document.getElementById('location-summary-text');

    // ELEMEN PENGIRIMAN
    const shippingOptions = document.getElementById('shipping-options');
    const shippingStatus = document.getElementById('shipping-status');

    const metodePengirimanInput = document.getElementById('metode_pengiriman');
    const kurirInput = document.getElementById('kurir');
    const layananInput = document.getElementById('layanan_kurir');
    const ongkirInput = document.getElementById('ongkir');
    const estimasiInput = document.getElementById('estimasi_pengiriman');

    // ELEMEN PEMBAYARAN
    const paymentOptions = document.querySelectorAll(
        'input[name="metode_pembayaran"]'
    );

    const shippingCostElement = document.getElementById('shipping-cost');
    const grandTotalElement = document.getElementById('grand-total');

    const checkoutForm = document.getElementById('checkout-form');
    const checkoutButton = document.getElementById('checkout-button');

    let selectedShipping = null;

    let locationNames = {
        province: '',
        city: '',
        district: '',
        subdistrict: ''
    };

    let calculateRequest = 0;

    // URL ENDPOINT ALAMAT
    const provinceUrl = @json(route('shipping.provinces'));

    const cityUrl = @json(route('shipping.cities', ['provinceId' => '__ID__']));
    const districtUrl = @json(route('shipping.districts', ['cityId' => '__ID__']));
    const subdistrictUrl = @json(route('shipping.subdistricts', ['districtId' => '__ID__']));

    const shippingUrl = @json(route('shipping.calculate'));

    // FORMAT RUPIAH
    function formatRupiah(number) {
        return 'Rp' + new Intl.NumberFormat('id-ID').format(number);
    }

    // UPDATE TOTAL PEMBAYARAN
    function updateTotal(shippingCost = 0) {
        shippingCostElement.textContent = formatRupiah(shippingCost);

        grandTotalElement.textContent = formatRupiah(
            subtotal + shippingCost
        );
    }

    // MENGISI SELECT
    function fillSelect(select, items, placeholder) {
        select.innerHTML = '';

        const firstOption = document.createElement('option');
        firstOption.value = '';
        firstOption.textContent = placeholder;

        select.appendChild(firstOption);

        items.forEach(item => {
            const option = document.createElement('option');

            option.value = item.id;
            option.textContent = item.name;

            if (item.zip_code !== undefined && item.zip_code !== null) {
                option.dataset.zip = item.zip_code;
            }

            select.appendChild(option);
        });

        select.disabled = false;
    }

    // RESET SELECT
    function resetSelect(select, placeholder) {
        select.innerHTML = '';

        const option = document.createElement('option');
        option.value = '';
        option.textContent = placeholder;

        select.appendChild(option);
        select.disabled = true;
    }

    // MENGAMBIL DATA LOKASI
    async function fetchLocations(url) {
        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        if (!response.ok || !result.success) {
            throw new Error(
                result.message || 'Gagal mengambil data lokasi.'
            );
        }

        return result.data || [];
    }

    // MEMUAT PROVINSI
    async function loadProvinces() {
        try {
            provinceSelect.disabled = true;

            const data = await fetchLocations(provinceUrl);

            fillSelect(
                provinceSelect,
                data,
                'Pilih Provinsi'
            );

        } catch (error) {
            resetSelect(provinceSelect, 'Gagal memuat provinsi');
            alert(error.message);
        }
    }

    // MEMILIH PROVINSI
    provinceSelect.addEventListener('change', async function () {
        const provinceId = this.value;

        locationNames.province = this.selectedOptions[0]?.textContent || '';

        locationNames.city = '';
        locationNames.district = '';
        locationNames.subdistrict = '';

        resetSelect(citySelect, 'Memuat kota/kabupaten...');
        resetSelect(districtSelect, 'Pilih kota/kabupaten terlebih dahulu');
        resetSelect(subdistrictSelect, 'Pilih kecamatan terlebih dahulu');

        zipInput.value = '';

        clearDestination();

        if (!provinceId) {
            resetSelect(citySelect, 'Pilih provinsi terlebih dahulu');
            return;
        }

        try {
            const url = cityUrl.replace('__ID__', encodeURIComponent(provinceId));
            const data = await fetchLocations(url);

            fillSelect(citySelect, data, 'Pilih Kota / Kabupaten');

        } catch (error) {
            resetSelect(citySelect, 'Gagal memuat kota/kabupaten');
            alert(error.message);
        }
    });

    // MEMILIH KOTA
    citySelect.addEventListener('change', async function () {
        const cityId = this.value;

        locationNames.city = this.selectedOptions[0]?.textContent || '';

        locationNames.district = '';
        locationNames.subdistrict = '';

        resetSelect(districtSelect, 'Memuat kecamatan...');
        resetSelect(subdistrictSelect, 'Pilih kecamatan terlebih dahulu');

        zipInput.value = '';

        clearDestination();

        if (!cityId) {
            resetSelect(districtSelect, 'Pilih kota/kabupaten terlebih dahulu');
            return;
        }

        try {
            const url = districtUrl.replace('__ID__', encodeURIComponent(cityId));
            const data = await fetchLocations(url);

            fillSelect(districtSelect, data, 'Pilih Kecamatan');

        } catch (error) {
            resetSelect(districtSelect, 'Gagal memuat kecamatan');
            alert(error.message);
        }
    });

    // MEMILIH KECAMATAN
    districtSelect.addEventListener('change', async function () {
        const districtId = this.value;

        locationNames.district = this.selectedOptions[0]?.textContent || '';

        locationNames.subdistrict = '';

        resetSelect(subdistrictSelect, 'Memuat desa/kelurahan...');

        zipInput.value = '';

        clearDestination();

        if (!districtId) {
            resetSelect(subdistrictSelect, 'Pilih kecamatan terlebih dahulu');
            return;
        }

        try {
            const url = subdistrictUrl.replace('__ID__', encodeURIComponent(districtId));
            const data = await fetchLocations(url);

            fillSelect(subdistrictSelect, data, 'Pilih Desa / Kelurahan');

        } catch (error) {
            resetSelect(subdistrictSelect, 'Gagal memuat desa/kelurahan');
            alert(error.message);
        }
    });

    // MEMILIH DESA / KELURAHAN
    subdistrictSelect.addEventListener('change', function () {
        const selectedOption = this.selectedOptions[0];
        const subdistrictId = this.value;

        if (!subdistrictId || !selectedOption) {
            clearDestination();
            zipInput.value = '';
            return;
        }

        locationNames.subdistrict = selectedOption.textContent;

        const zipCode = selectedOption.dataset.zip || '';

        zipInput.value = zipCode;

        destinationIdInput.value = subdistrictId;

        const fullLocation = [
            locationNames.subdistrict,
            locationNames.district,
            locationNames.city,
            locationNames.province,
            zipCode
        ].filter(Boolean).join(', ');

        destinationNameInput.value = fullLocation;

        locationSummaryText.textContent = fullLocation;
        locationSummary.style.display = 'block';

        calculateShipping(subdistrictId);
    });

    // MENGHAPUS DATA TUJUAN DAN ONGKIR
    function clearDestination() {
        destinationIdInput.value = '';
        destinationNameInput.value = '';

        locationSummary.style.display = 'none';

        resetShipping();
    }

    // MENGAMBIL ESTIMASI PENGIRIMAN
    function getEstimatedDays(etd) {
        if (!etd) return Infinity;

        const value = String(etd).toLowerCase();

        const range = value.match(/(\d+)\s*-\s*(\d+)/);

        if (range) {
            return Number(range[1]);
        }

        const hours = value.match(/(\d+)\s*(jam|hour)/);

        if (hours) {
            return Number(hours[1]) / 24;
        }

        const days = value.match(/(\d+(?:\.\d+)?)\s*(hari|day)/);

        if (days) {
            return Number(days[1]);
        }

        const number = value.match(/\d+/);

        return number ? Number(number[0]) : Infinity;
    }

    // MEMBUAT KATEGORI PENGIRIMAN
    function buildShippingCategories(services) {
        const available = services.filter(service => {
            return Number(service.cost) >= 0 &&
                service.code &&
                service.service;
        });

        if (!available.length) return [];

        const categories = [];

        // HEMAT: HARGA TERMURAH
        const cheapest = [...available].sort(
            (a, b) => Number(a.cost) - Number(b.cost)
        )[0];

        categories.push({
            category: 'Hemat',
            service: cheapest
        });

        // CEPAT: ESTIMASI TERPENDEK
        const sortedBySpeed = [...available].sort((a, b) => {
            const daysA = getEstimatedDays(a.etd);
            const daysB = getEstimatedDays(b.etd);

            if (daysA !== daysB) return daysA - daysB;

            return Number(a.cost) - Number(b.cost);
        });

        const fastest = sortedBySpeed.find(service => {
            return service.code !== cheapest.code ||
                service.service !== cheapest.service;
        });

        if (fastest) {
            categories.push({
                category: 'Cepat',
                service: fastest
            });
        }

        // EXPRESS
        const expressServices = available.filter(service => {
            const code = String(service.service || '').toLowerCase();
            const description = String(service.description || '').toLowerCase();

            return /yes|ons|sds|same.?day|next.?day|express|instant|kilat/.test(code + ' ' + description);
        });

        if (expressServices.length) {
            const express = [...expressServices].sort(
                (a, b) => Number(a.cost) - Number(b.cost)
            )[0];

            const alreadyUsed = categories.some(item => {
                return item.service.code === express.code &&
                    item.service.service === express.service;
            });

            if (!alreadyUsed) {
                categories.push({
                    category: 'Express',
                    service: express
                });
            }
        }

        return categories;
    }

    // MENGHITUNG ONGKIR
    async function calculateShipping(destinationId) {
        const requestNumber = ++calculateRequest;

        shippingOptions.innerHTML = '';

        selectedShipping = null;

        shippingStatus.textContent = 'Sedang menghitung ongkos kirim...';
        shippingStatus.style.display = 'block';

        try {
            const response = await fetch(shippingUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': @json(csrf_token())
                },
                body: JSON.stringify({
                    destination_id: destinationId,
                    weight: totalWeight,
                    courier: 'jne:jnt:sicepat'
                })
            });

            const result = await response.json();

            if (requestNumber !== calculateRequest) return;

            if (!response.ok || !result.success || !result.data?.length) {
                throw new Error(
                    result.message || 'Layanan pengiriman tidak tersedia.'
                );
            }

            const categories = buildShippingCategories(result.data);

            if (!categories.length) {
                throw new Error('Tidak ada layanan pengiriman yang tersedia.');
            }

            shippingStatus.style.display = 'none';

            categories.forEach(item => {
                renderShippingOption(item);
            });

        } catch (error) {
            if (requestNumber !== calculateRequest) return;

            shippingOptions.innerHTML = '';

            shippingStatus.textContent =
                error.message || 'Gagal menghitung ongkos kirim.';

            shippingStatus.style.display = 'block';
        }
    }

    // MENAMPILKAN PILIHAN KURIR
    function renderShippingOption(item) {
        const service = item.service;

        const card = document.createElement('label');
        card.className = 'shipping-option';

        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'shipping_choice';
        radio.value = item.category;
        radio.required = true;

        const info = document.createElement('div');
        info.className = 'shipping-info';

        const category = document.createElement('span');
        category.className = 'shipping-category';
        category.textContent = item.category;

        const name = document.createElement('div');
        name.className = 'shipping-name';
        name.textContent = service.name || service.code.toUpperCase();

        const serviceName = document.createElement('div');
        serviceName.style.fontSize = '11px';
        serviceName.style.color = '#493c33';
        serviceName.style.fontWeight = '600';
        serviceName.textContent = service.service + ' - ' +
            (service.description || '');

        const estimate = document.createElement('div');
        estimate.className = 'shipping-estimate';
        estimate.textContent = 'Estimasi: ' +
            (service.etd || 'Tidak tersedia');

        const price = document.createElement('div');
        price.className = 'shipping-price';
        price.textContent = formatRupiah(Number(service.cost));

        info.appendChild(category);
        info.appendChild(name);
        info.appendChild(serviceName);
        info.appendChild(estimate);

        card.appendChild(radio);
        card.appendChild(info);
        card.appendChild(price);

        radio.addEventListener('change', function () {
            selectShipping(item, card);
        });

        shippingOptions.appendChild(card);
    }

    // MEMILIH PENGIRIMAN
    function selectShipping(item, selectedCard) {
        document.querySelectorAll('.shipping-option').forEach(card => {
            card.classList.remove('selected');
        });

        selectedCard.classList.add('selected');

        const service = item.service;

        selectedShipping = item;

        metodePengirimanInput.value =
            item.category + ' - ' + service.name + ' - ' + service.service;

        kurirInput.value = service.code;
        layananInput.value = service.service;
        ongkirInput.value = service.cost;
        estimasiInput.value = service.etd || '';

        updateTotal(Number(service.cost));
    }

    // RESET PENGIRIMAN
    function resetShipping() {
        calculateRequest++;

        selectedShipping = null;

        shippingOptions.innerHTML = '';

        shippingStatus.textContent =
            'Pilih desa atau kelurahan tujuan terlebih dahulu untuk melihat ongkos kirim.';

        shippingStatus.style.display = 'block';

        metodePengirimanInput.value = '';
        kurirInput.value = '';
        layananInput.value = '';
        ongkirInput.value = '';
        estimasiInput.value = '';

        updateTotal(0);
    }

    // TAMPILAN PEMBAYARAN
    function updatePayment() {
        paymentOptions.forEach(option => {
            const card = option.closest('.payment-option');

            card.classList.toggle('selected', option.checked);
        });
    }

    paymentOptions.forEach(option => {
        option.addEventListener('change', updatePayment);
    });

    // VALIDASI SEBELUM CHECKOUT
    checkoutForm.addEventListener('submit', function (event) {
        if (!destinationIdInput.value || !destinationNameInput.value) {
            event.preventDefault();

            alert('Silakan lengkapi pilihan alamat pengiriman terlebih dahulu.');
            return;
        }

        if (!selectedShipping) {
            event.preventDefault();

            alert('Silakan pilih metode pengiriman terlebih dahulu.');
            return;
        }

        const paymentSelected = document.querySelector(
            'input[name="metode_pembayaran"]:checked'
        );

        if (!paymentSelected) {
            event.preventDefault();

            alert('Silakan pilih metode pembayaran.');
            return;
        }

        checkoutButton.disabled = true;
        checkoutButton.textContent = 'Memproses pesanan...';
    });

    // INISIALISASI
    updateTotal(0);
    updatePayment();
    loadProvinces();

</script>

</body>
</html>
