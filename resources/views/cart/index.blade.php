
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - WEARLY</title>

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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--dark);
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input {
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

        .cart-heading {
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

        .cart-heading h1 {
            font-size: 31px;
            font-weight: 800;
            letter-spacing: -.8px;
            margin-bottom: 8px;
        }

        .cart-heading p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
        }

        /* ALERT */
        .error-message,
        .success-message {
            padding: 14px 17px;
            border-radius: 12px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .error-message {
            background: #f8e8e5;
            color: #a34e42;
            border: 1px solid #efd2cc;
        }

        .success-message {
            background: #edf4e9;
            color: #52734d;
            border: 1px solid #d7e7d0;
        }

        /* CART LAYOUT */
        .cart-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(290px, .85fr);
            gap: 25px;
            align-items: start;
        }

        .cart-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            min-width: 0;
        }

        /* SELECT ALL */
        .select-all-wrapper {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 17px 20px;
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .select-all-wrapper label {
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .select-all-wrapper span {
            color: var(--muted);
            font-size: 11px;
            margin-left: auto;
        }

        input[type="checkbox"] {
            width: 17px;
            height: 17px;
            accent-color: var(--mocha);
            cursor: pointer;
            flex-shrink: 0;
        }

        /* CART ITEM */
        .cart-item {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 19px;
            display: grid;
            grid-template-columns: 20px 120px minmax(0, 1fr) auto;
            align-items: center;
            gap: 17px;
            box-shadow: var(--shadow);
            transition: .25s;
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 9px 25px rgba(47, 41, 37, .08);
        }

        .product-checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image {
            width: 120px;
            height: 132px;
            background: #f5f0e9;
            border-radius: 12px;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }

        .image-placeholder {
            color: var(--mocha);
            font-size: 19px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        /* PRODUCT INFORMATION */
        .product-detail {
            min-width: 0;
        }

        .product-category {
            display: inline-block;
            color: var(--mocha);
            background: var(--cream);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .product-name {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.5;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .product-price {
            color: var(--mocha);
            font-size: 14px;
            font-weight: 800;
        }

        .product-size {
            color: var(--muted);
            font-size: 11px;
            margin-top: 8px;
        }

        .product-color {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.4;
        }

        .product-color-circle {
            display: inline-block;
            width: 15px;
            height: 15px;
            min-width: 15px;
            border-radius: 50%;
            border: 1px solid #d8cec2;
            flex-shrink: 0;
        }

        /* ACTIONS */
        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 17px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 11px;
            background: #f5f0e9;
            padding: 5px;
            border-radius: 30px;
        }

        .quantity-control form {
            margin: 0;
        }

        .quantity-button {
            width: 29px;
            height: 29px;
            border: none;
            border-radius: 50%;
            background: var(--white);
            color: var(--brown);
            font-size: 17px;
            cursor: pointer;
            transition: .2s;
        }

        .quantity-button:hover {
            background: var(--dark);
            color: white;
        }

        .quantity {
            min-width: 18px;
            text-align: center;
            font-size: 13px;
            font-weight: 700;
        }

        .subtotal {
            font-size: 13px;
            font-weight: 800;
            color: var(--dark);
            white-space: nowrap;
        }

        .delete-button {
            border: none;
            background: transparent;
            color: #a66b5e;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .delete-button:hover {
            color: #b33e35;
            text-decoration: underline;
        }

        /* SUMMARY */
        .summary {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            box-shadow: var(--shadow);
            position: sticky;
            top: 105px;
        }

        .summary h2 {
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .summary-description {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.6;
            margin-bottom: 23px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 16px;
            color: var(--muted);
            font-size: 12px;
        }

        .summary-row strong {
            color: var(--dark);
            text-align: right;
        }

        .summary-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 20px 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 23px;
        }

        .summary-total strong {
            color: var(--mocha);
            text-align: right;
        }

        .checkout-button {
            display: block;
            width: 100%;
            padding: 15px;
            border: none;
            background: var(--dark);
            color: white;
            text-align: center;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
        }

        .checkout-button:hover:not(:disabled) {
            background: var(--mocha);
            transform: translateY(-2px);
        }

        .checkout-button:disabled {
            background: #c9c0b6;
            color: #f8f5f0;
            cursor: not-allowed;
        }

        .continue-button {
            display: block;
            text-align: center;
            margin-top: 17px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .continue-button:hover {
            color: var(--mocha);
        }

        .summary-note {
            background: #f5f0e9;
            padding: 13px;
            border-radius: 10px;
            margin-top: 20px;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.7;
            text-align: center;
        }

        /* EMPTY CART */
        .empty-cart {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 75px 20px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: var(--cream);
            color: var(--mocha);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
        }

        .empty-cart h2 {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .empty-cart p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .empty-cart a {
            display: inline-block;
            padding: 13px 26px;
            border-radius: 30px;
            background: var(--dark);
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .empty-cart a:hover {
            background: var(--mocha);
        }

        /* FOOTER */
        .footer {
            background: var(--dark);
            padding: 25px 7%;
            text-align: center;
            color: #c3b7aa;
            font-size: 11px;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .container {
                width: 91%;
            }

            .cart-layout {
                grid-template-columns: 1fr;
            }

            .summary {
                position: static;
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

            .cart-heading h1 {
                font-size: 25px;
            }

            .cart-item {
                grid-template-columns: 18px 88px minmax(0, 1fr);
                gap: 10px;
                padding: 13px;
            }

            .product-image {
                width: 88px;
                height: 105px;
            }

            .product-name {
                font-size: 13px;
            }

            .product-price {
                font-size: 12px;
            }

            .item-actions {
                grid-column: 1 / -1;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                border-top: 1px solid var(--border);
                padding-top: 12px;
                gap: 8px;
            }

            .quantity-control {
                gap: 7px;
            }

            .subtotal {
                font-size: 11px;
            }

            .summary {
                padding: 21px;
            }

            .empty-cart {
                padding: 55px 15px;
            }

            .empty-cart h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <!-- FORM UNTUK CHECKOUT PRODUK TERPILIH -->
    <form id="checkout-selection-form" action="{{ route('checkout.prepare') }}" method="POST">
        @csrf
    </form>

    <!-- NAVBAR -->
    <div class="navbar-wrapper">
        <nav class="navbar">
            <a href="{{ route('user.dashboard') }}" class="logo">
                WEAR<span>LY</span>
            </a>

            <a href="{{ route('user.dashboard') }}" class="back">
                ← Kembali Belanja
            </a>
        </nav>
    </div>

    <main class="container">

        <div class="cart-heading">
            <div class="eyebrow">Your Shopping Bag</div>
            <h1>Keranjang Belanja</h1>
            <p>Periksa kembali produk pilihanmu sebelum melanjutkan ke pembayaran.</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        @if(count($cart) > 0)

            <div class="cart-layout">

                <div class="cart-list">

                    <div class="select-all-wrapper">
                        <input type="checkbox" id="select-all-products">

                        <label for="select-all-products">
                            Pilih Semua
                        </label>

                        <span id="selected-label">0 produk dipilih</span>
                    </div>

                    @foreach($cart as $id => $item)

                        @php
                            $subtotal = $item['harga'] * $item['quantity'];

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

                        <div class="cart-item">

                            <div class="product-checkbox">
                                <input
                                    type="checkbox"
                                    class="product-checkbox-input"
                                    name="selected_products[]"
                                    value="{{ $id }}"
                                    form="checkout-selection-form"
                                    data-price="{{ $item['harga'] }}"
                                    data-quantity="{{ $item['quantity'] }}"
                                    aria-label="Pilih produk {{ $item['nama'] }}"
                                >
                            </div>

                            <div class="product-image">
                                @if(!empty($item['gambar']))
                                    <img
                                        src="{{ asset('images/products/' . $item['gambar']) }}"
                                        alt="{{ $item['nama'] }}"
                                    >
                                @else
                                    <div class="image-placeholder">WEARLY</div>
                                @endif
                            </div>

                            <div class="product-detail">

                                @if(!empty($item['kategori']))
                                    <span class="product-category">
                                        {{ $item['kategori'] }}
                                    </span>
                                @endif

                                <div class="product-name">
                                    {{ $item['nama'] }}
                                </div>

                                <div class="product-price">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </div>

                                @if(!empty($item['ukuran']))
                                    <div class="product-size">
                                        Ukuran: {{ $item['ukuran'] }}
                                    </div>
                                @endif

                                @if(!empty($item['warna']))
                                    <div class="product-color">
                                        <span>Warna:</span>
                                        <span
                                            class="product-color-circle"
                                            style="background-color: {{ $selectedColor }};"
                                        ></span>
                                        <span>{{ $item['warna'] }}</span>
                                    </div>
                                @endif

                            </div>

                            <div class="item-actions">

                                <div class="quantity-control">

                                    <form action="{{ route('cart.decrease', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="quantity-button">−</button>
                                    </form>

                                    <span class="quantity">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <form action="{{ route('cart.increase', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="quantity-button">+</button>
                                    </form>

                                </div>

                                <div class="subtotal">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>

                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-button">
                                        Hapus Produk
                                    </button>
                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

                <aside class="summary">

                    <h2>Ringkasan Belanja</h2>
                    <p class="summary-description">
                        Periksa jumlah produk dan total belanja pilihanmu.
                    </p>

                    <div class="summary-row">
                        <span>Total Produk Dipilih</span>
                        <strong id="selected-count">0 item</strong>
                    </div>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <strong id="selected-subtotal">Rp 0</strong>
                    </div>

                    <hr class="summary-divider">

                    <div class="summary-total">
                        <span>Total Belanja</span>
                        <strong id="selected-total">Rp 0</strong>
                    </div>

                    <button
                        type="submit"
                        form="checkout-selection-form"
                        class="checkout-button"
                        id="checkout-button"
                        disabled
                    >
                        Lanjut ke Checkout
                    </button>

                    <a href="{{ route('user.dashboard') }}#produk" class="continue-button">
                        ← Lanjutkan Belanja
                    </a>

                    <div class="summary-note">
                        Pilih produk yang ingin dibeli terlebih dahulu.
                        Produk yang tidak dipilih akan tetap berada di keranjang.
                    </div>

                </aside>

            </div>

        @else

            <div class="empty-cart">

                <div class="empty-icon">♡</div>

                <h2>Keranjangmu Masih Kosong</h2>

                <p>
                    Sepertinya kamu belum memilih produk.
                    Yuk, temukan koleksi favoritmu di WEARLY.
                </p>

                <a href="{{ route('user.dashboard') }}#produk">
                    Mulai Belanja
                </a>

            </div>

        @endif

    </main>

    <footer class="footer">
        © 2026 WEARLY. Hak Cipta Dilindungi.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const selectAll = document.getElementById('select-all-products');
            const productCheckboxes = document.querySelectorAll('.product-checkbox-input');

            const selectedLabel = document.getElementById('selected-label');
            const selectedCount = document.getElementById('selected-count');
            const selectedSubtotal = document.getElementById('selected-subtotal');
            const selectedTotal = document.getElementById('selected-total');
            const checkoutButton = document.getElementById('checkout-button');

            if (!selectAll || !checkoutButton) {
                return;
            }

            function formatRupiah(number) {
                return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
            }

            function updateSummary() {

                let totalQuantity = 0;
                let totalPrice = 0;
                let selectedProductCount = 0;

                productCheckboxes.forEach(function (checkbox) {

                    if (checkbox.checked) {
                        const price = Number(checkbox.dataset.price);
                        const quantity = Number(checkbox.dataset.quantity);

                        totalPrice += price * quantity;
                        totalQuantity += quantity;
                        selectedProductCount++;
                    }

                });

                selectedLabel.textContent = selectedProductCount + ' produk dipilih';
                selectedCount.textContent = totalQuantity + ' item';

                selectedSubtotal.textContent = formatRupiah(totalPrice);
                selectedTotal.textContent = formatRupiah(totalPrice);

                checkoutButton.disabled = selectedProductCount === 0;

                const allSelected = productCheckboxes.length > 0 &&
                    Array.from(productCheckboxes).every(function (checkbox) {
                        return checkbox.checked;
                    });

                selectAll.checked = allSelected;

                selectAll.indeterminate = selectedProductCount > 0 &&
                    selectedProductCount < productCheckboxes.length;
            }

            selectAll.addEventListener('change', function () {

                productCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAll.checked;
                });

                updateSummary();
            });

            productCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', updateSummary);
            });

            updateSummary();

        });
    </script>

</body>
</html>
