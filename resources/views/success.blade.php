
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - WEARLY</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f5f0;
            color: #2f2925;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background-color: #2f2925;
            height: 70px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 3px 12px rgba(47, 41, 37, 0.12);
        }

        .logo {
            color: #f5e9d8;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .logo span {
            color: #d6b98c;
        }

        .navbar-link {
            color: #f8f5f0;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .navbar-link:hover {
            color: #d6b98c;
        }

        /* CONTENT */
        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto 70px;
        }

        .success-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .success-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background-color: #d6b98c;
            color: #2f2925;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
        }

        .success-header h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .success-header p {
            color: #756a63;
            font-size: 14px;
            line-height: 1.6;
        }

        .order-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(47, 41, 37, 0.08);
            margin-bottom: 20px;
        }

        .order-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eadfd2;
            gap: 20px;
        }

        .order-title {
            font-size: 18px;
            font-weight: bold;
        }

        .order-number {
            color: #756a63;
            font-size: 13px;
            margin-top: 5px;
        }

        .status {
            background-color: #f5e9d8;
            color: #9a7651;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .payment-status {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .payment-paid {
            background: #e2f2e5;
            color: #28743b;
        }

        .payment-pending {
            background: #fff1d6;
            color: #95651c;
        }

        .payment-failed {
            background: #fbe4e1;
            color: #a33c32;
        }

        .payment-other {
            background: #eee9e3;
            color: #756a63;
        }

        .payment-notice {
            padding: 18px;
            border-radius: 10px;
            margin-top: 22px;
            font-size: 14px;
            line-height: 1.6;
        }

        .notice-paid {
            background: #e2f2e5;
            color: #28743b;
        }

        .notice-pending {
            background: #fff1d6;
            color: #95651c;
        }

        .notice-failed {
            background: #fbe4e1;
            color: #a33c32;
        }

        .notice-other {
            background: #eee9e3;
            color: #756a63;
        }

        /* SECTION */
        .section {
            padding: 25px 0;
            border-bottom: 1px solid #eadfd2;
        }

        .section:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 16px;
            margin-bottom: 16px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .info-item {
            font-size: 14px;
        }

        .info-label {
            color: #756a63;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .info-value {
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .address {
            grid-column: 1 / -1;
        }

        /* PRODUCTS */
        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eadfd2;
            gap: 20px;
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-detail {
            color: #756a63;
            font-size: 13px;
        }

        .product-subtotal {
            font-weight: bold;
            white-space: nowrap;
        }

        /* PAYMENT DETAILS */
        .payment-details {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid #eadfd2;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 13px;
            font-size: 14px;
        }

        .payment-label {
            color: #756a63;
        }

        .payment-value {
            font-weight: 600;
            text-align: right;
        }

        .shipping-note {
            color: #9a7651;
            font-size: 12px;
            margin-top: 5px;
        }

        .total-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eadfd2;
        }

        .total-label {
            font-size: 17px;
            font-weight: bold;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: #9a7651;
        }

        /* BUTTONS */
        .actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .button-primary {
            background-color: #2f2925;
            color: white;
        }

        .button-primary:hover {
            background-color: #9a7651;
        }

        .button-secondary {
            background-color: #f5e9d8;
            color: #2f2925;
        }

        .button-secondary:hover {
            background-color: #d6b98c;
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .navbar {
                height: 65px;
                padding: 0 5%;
            }

            .logo {
                font-size: 23px;
            }

            .navbar-link {
                font-size: 12px;
            }

            .container {
                width: 92%;
                margin-top: 30px;
            }

            .success-header h1 {
                font-size: 24px;
            }

            .order-card {
                padding: 22px;
            }

            .order-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .address {
                grid-column: auto;
            }

            .product-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .total-box {
                gap: 15px;
            }

            .total-label {
                font-size: 15px;
            }

            .total-price {
                font-size: 17px;
            }

            .actions {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            WEAR<span>LY</span>
        </div>

        <a href="{{ route('user.dashboard') }}" class="navbar-link">
            Kembali ke Home
        </a>
    </nav>

    @php
        $paymentStatus = strtolower($order->payment_status ?? 'pending');

        $isPaid = $paymentStatus === 'paid';

        $isFailed = in_array($paymentStatus, [
            'deny',
            'cancel',
            'expire',
            'error'
        ]);

        if ($isPaid) {
            $paymentLabel = 'Lunas';
            $noticeClass = 'notice-paid';
            $statusClass = 'payment-paid';
            $noticeMessage = 'Pembayaran berhasil diterima. Terima kasih sudah berbelanja di WEARLY. Pesanan kamu akan segera diproses.';
            $headerTitle = 'Pembayaran Berhasil!';
        } elseif ($isFailed) {
            $paymentLabel = 'Pembayaran Gagal';
            $noticeClass = 'notice-failed';
            $statusClass = 'payment-failed';
            $noticeMessage = 'Pembayaran belum berhasil. Pesanan ini tidak dapat dilanjutkan. Silakan buat pesanan baru jika ingin berbelanja kembali.';
            $headerTitle = 'Pembayaran Belum Berhasil';
        } elseif ($paymentStatus === 'challenge') {
            $paymentLabel = 'Sedang Ditinjau';
            $noticeClass = 'notice-other';
            $statusClass = 'payment-other';
            $noticeMessage = 'Pembayaran sedang melalui pemeriksaan oleh penyedia pembayaran. Silakan tunggu pembaruan status.';
            $headerTitle = 'Pembayaran Sedang Ditinjau';
        } else {
            $paymentLabel = 'Menunggu Pembayaran';
            $noticeClass = 'notice-pending';
            $statusClass = 'payment-pending';
            $noticeMessage = 'Pesanan berhasil dibuat, tetapi pembayaran belum dikonfirmasi. Silakan selesaikan pembayaran melalui Midtrans.';
            $headerTitle = 'Pesanan Berhasil Dibuat!';
        }

        $subtotalProduk = $order->items->sum('subtotal');
    @endphp

    <div class="container">

        <div class="success-header">
            <div class="success-icon">
                {{ $isPaid ? '✓' : '!' }}
            </div>

            <h1>{{ $headerTitle }}</h1>

            <p>
                Terima kasih telah berbelanja di WEARLY.
                Berikut adalah informasi pesanan kamu.
            </p>
        </div>

        <div class="order-card">

            <div class="order-top">
                <div>
                    <div class="order-title">Detail Pesanan</div>

                    <div class="order-number">
                        Pesanan #{{ $order->id }}
                    </div>
                </div>

                <div class="status">
                    {{ $order->status }}
                </div>
            </div>

            <div class="payment-notice {{ $noticeClass }}">
                <strong>{{ $paymentLabel }}</strong><br>
                {{ $noticeMessage }}
            </div>

            <div class="section">

                <div class="section-title">
                    Informasi Pengiriman
                </div>

                <div class="info-grid">

                    <div class="info-item">
                        <div class="info-label">Nama Penerima</div>
                        <div class="info-value">
                            {{ $order->nama_penerima }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Nomor HP</div>
                        <div class="info-value">
                            {{ $order->no_hp }}
                        </div>
                    </div>

                    <div class="info-item address">
                        <div class="info-label">Alamat Lengkap</div>
                        <div class="info-value">
                            {{ $order->alamat }}
                        </div>
                    </div>

                    @if($order->destination_name)
                        <div class="info-item address">
                            <div class="info-label">Lokasi Tujuan</div>
                            <div class="info-value">
                                {{ $order->destination_name }}
                            </div>
                        </div>
                    @endif

                    <div class="info-item">
                        <div class="info-label">Kurir</div>
                        <div class="info-value">
                            {{ strtoupper($order->kurir ?? '-') }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Layanan Pengiriman</div>
                        <div class="info-value">
                            {{ $order->layanan_kurir ?? $order->metode_pengiriman ?? '-' }}
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Estimasi Pengiriman</div>
                        <div class="info-value">
                            {{ $order->estimasi_pengiriman ?: 'Menyesuaikan layanan kurir' }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="section">

                <div class="section-title">
                    Informasi Pembayaran
                </div>

                <div class="info-item">
                    <div class="info-label">Status Pembayaran</div>

                    <div>
                        <span class="payment-status {{ $statusClass }}">
                            {{ $paymentLabel }}
                        </span>
                    </div>
                </div>

            </div>

            <div class="section">

                <div class="section-title">
                    Produk yang Dipesan
                </div>

                @foreach($order->items as $item)
                    <div class="product-item">

                        <div>
                            <div class="product-name">
                                {{ $item->product->nama ?? 'Produk tidak tersedia' }}
                            </div>

                            <div class="product-detail">
                                {{ $item->jumlah }} x Rp
                                {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="product-subtotal">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </div>

                    </div>
                @endforeach

                <div class="payment-details">

                    <div class="payment-row">
                        <span class="payment-label">
                            Subtotal Produk
                        </span>

                        <span class="payment-value">
                            Rp {{ number_format($subtotalProduk, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="payment-row">

                        <div>
                            <div class="payment-label">
                                Ongkos Kirim
                            </div>

                            <div class="shipping-note">
                                {{ $order->kurir ? strtoupper($order->kurir) : 'Pengiriman' }}
                                {{ $order->layanan_kurir ?? '' }}
                            </div>
                        </div>

                        <span class="payment-value">
                            Rp {{ number_format($order->ongkir, 0, ',', '.') }}
                        </span>

                    </div>

                </div>

                <div class="total-box">
                    <span class="total-label">
                        Total Pembayaran
                    </span>

                    <span class="total-price">
                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </span>
                </div>

            </div>

        </div>

        <div class="actions">

            @if(!$isPaid && !$isFailed && $order->payment_url)
                <a href="{{ $order->payment_url }}"
                   class="button button-primary">
                    Lanjutkan Pembayaran
                </a>
            @endif

            <a href="{{ route('user.dashboard') }}"
               class="button button-secondary">
                Kembali ke Home
            </a>

            <a href="{{ route('user.dashboard') }}#produk"
               class="button button-secondary">
                Belanja Lagi
            </a>

        </div>

    </div>

</body>
</html>
