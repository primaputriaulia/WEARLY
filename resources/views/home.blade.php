
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WEARLY - Fashion & Accessories</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 110px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F8F5F0;
            color: #2F2925;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input, select {
            font-family: inherit;
        }

        /* NAVBAR */
        .navbar-wrapper {
            position: fixed;
            top: 16px;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 0 4%;
        }

        .navbar {
            max-width: 1450px;
            height: 70px;
            margin: auto;
            padding: 0 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 253, 249, .97);
            border: 1px solid rgba(214, 185, 140, .25);
            border-radius: 50px;
            box-shadow: 0 5px 25px rgba(47, 41, 37, .10);
            backdrop-filter: blur(12px);
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
            color: #2F2925;
            white-space: nowrap;
        }

        .logo span {
            color: #A47B50;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 34px;
            height: 100%;
            font-size: 13px;
            font-weight: 600;
            color: #62564C;
        }

        .nav-menu a {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            transition: color .25s;
        }

        .nav-menu a::after {
            content: "";
            position: absolute;
            bottom: 17px;
            left: 0;
            width: 0;
            height: 2px;
            background: #9A7651;
            border-radius: 5px;
            transition: width .25s ease;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #9A7651;
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
        }

        .nav-login {
            color: #2F2925;
            font-weight: 700;
        }

        .nav-register {
            background: #2F2925;
            color: #FFFAF3;
            padding: 11px 20px;
            border-radius: 30px;
            font-weight: 600;
            transition: .25s;
        }

        .nav-register:hover {
            background: #493C33;
        }

        .logout-form {
            display: inline;
        }

        .logout-button {
            background: #493C33;
            color: #FFF;
            border: none;
            border-radius: 30px;
            padding: 12px 23px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .logout-button:hover {
            background: #2F2925;
        }

        .user-greeting {
            color: #62564C;
            font-weight: 600;
            white-space: nowrap;
        }

        .profile-icon,
        .cart-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F1E7D9;
            color: #493C33;
            border: none;
            border-radius: 50%;
            flex-shrink: 0;
            transition: .3s;
            position: relative;
        }

        .profile-icon svg,
        .cart-icon svg {
            width: 19px;
            height: 19px;
        }

        .cart-icon:hover {
            background: #E3D1B9;
            transform: translateY(-2px);
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            min-width: 19px;
            height: 19px;
            padding: 0 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            background: #9A7651;
            color: white;
            font-size: 10px;
            font-weight: 800;
            border: 2px solid #FFFDF9;
        }

        /* HERO SLIDER */
        .hero {
            width: 100%;
            min-height: 620px;
            position: relative;
            overflow: hidden;
            background: #493C33;
            scroll-margin-top: 0;
        }

        .hero-slides {
            position: absolute;
            inset: 0;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1.2s ease, visibility 1.2s ease;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }

        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(35, 29, 25, .72) 0%,
                rgba(35, 29, 25, .38) 48%,
                rgba(35, 29, 25, .05) 100%
            );
        }

        .hero-content {
            position: absolute;
            z-index: 2;
            top: 50%;
            left: 8%;
            transform: translateY(-50%);
            max-width: 570px;
            color: white;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 15px;
            margin-bottom: 22px;
            background: rgba(255, 255, 255, .17);
            border: 1px solid rgba(255, 255, 255, .35);
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(42px, 5.5vw, 70px);
            line-height: 1.08;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .hero-content p {
            max-width: 440px;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(255, 255, 255, .91);
        }

        .hero-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            width: 46px;
            height: 46px;
            border: 1px solid rgba(255,255,255,.5);
            border-radius: 50%;
            background: rgba(255,255,255,.15);
            color: white;
            font-size: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
        }

        .hero-arrow:hover {
            background: #FFFDF9;
            color: #493C33;
        }

        .hero-prev {
            left: 30px;
        }

        .hero-next {
            right: 30px;
        }

        .hero-dots {
            position: absolute;
            bottom: 65px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-dot {
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            border-radius: 20px;
            background: rgba(255,255,255,.55);
            cursor: pointer;
            transition: .3s;
        }

        .hero-dot.active {
            width: 28px;
            background: #FFFDF9;
        }

        
        /* SEARCH */
        .search-section {
            position: relative;
            z-index: 20;
            margin-top: -48px;
            margin-bottom: 0;
        }

        .search-bar {
            width: 90%;
            max-width: 1050px;
            min-height: 76px;
            margin: auto;
            padding: 12px 18px 12px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            background: #FFFDF9;
            border: 1px solid #EEE3D5;
            border-radius: 50px;
            box-shadow: 0 12px 30px rgba(47, 41, 37, .10);
        }

        .search-bar input {
            flex: 1;
            width: 100%;
            min-width: 0;
            height: 45px;
            padding: 0 10px;
            border: none;
            outline: none;
            background: transparent;
            color: #493C33;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
        }

        .search-bar input::placeholder {
            color: #A99B8D;
        }

        .search-button {
            flex-shrink: 0;
            padding: 14px 28px;
            border: none;
            border-radius: 30px;
            background: #493C33;
            color: #FFFDF9;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: background .3s ease, transform .3s ease;
        }

        .search-button:hover {
            background: #9A7651;
            transform: translateY(-2px);
        }


        /* GENERAL SECTION */
        .section-label {
            color: #9A7651;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 34px;
            font-weight: 800;
            color: #2F2925;
            line-height: 1.2;
        }

        .section-description {
            color: #82766B;
            font-size: 13px;
            line-height: 1.8;
            margin-top: 13px;
        }

        /* CATEGORY FILTER */
        .category-filter {
            padding: 20px 5% 15px;
            margin: 0;
            text-align: center;
        }

        .filter-list {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .filter-button {
            padding: 11px 23px;
            border: 1px solid #DFD1C1;
            border-radius: 30px;
            background: #FFFDF9;
            color: #62564C;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
        }

        .filter-button:hover,
        .filter-button.active {
            background: #2F2925;
            color: #FFFAF3;
            border-color: #2F2925;
        }

        /* CATEGORY SECTION */
        .category {
            background: #F8F5F0;
            padding: 20px 0 85px;
            overflow: hidden;
            scroll-margin-top: 90px;
        }

        .category-inner {
            width: 100%;
            margin: auto;
        }

        .category-heading {
            text-align: center;
            margin: 0 6% 38px;
        }

        .category-carousel {
            width: 100%;
            overflow: hidden;
            position: relative;
            padding: 20px 0 35px;
        }

        .category-track {
            display: flex;
            align-items: center;
            gap: 22px;
            width: max-content;
            animation: categorySlide 55s linear infinite;
            will-change: transform;
        }

        .category-carousel:hover .category-track {
            animation-play-state: paused;
        }

        .category-card {
            position: relative;
            display: block;
            flex: 0 0 245px;
            width: 245px;
            height: 330px;
            overflow: hidden;
            border-radius: 17px;
            background: #CBB69C;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(47, 41, 37, .13);
            transform: scale(.92);
            transition: transform .4s ease, box-shadow .4s ease;
        }

        .category-card.is-center {
            transform: scale(1.04);
            box-shadow: 0 16px 35px rgba(47, 41, 37, .22);
            z-index: 2;
        }

        .category-card:hover {
            transform: scale(1.06);
            box-shadow: 0 18px 35px rgba(47, 41, 37, .25);
            z-index: 3;
        }

        .category-card img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }

        .category-card:hover img {
            transform: scale(1.08);
        }

        .category-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #E8DCCB, #9A7651);
            color: #FFFDF9;
            font-size: 25px;
            letter-spacing: 3px;
        }

        .category-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(35, 29, 25, .88) 0%,
                rgba(35, 29, 25, .38) 38%,
                rgba(35, 29, 25, .02) 75%
            );
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 23px 20px;
            color: #FFFDF9;
        }

        .category-card-overlay h3 {
            font-size: 23px;
            line-height: 1.2;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .category-card-overlay p {
            color: rgba(255, 253, 249, .88);
            font-size: 10px;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .category-card-number {
            position: absolute;
            top: 16px;
            left: 17px;
            color: white;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            opacity: .9;
        }

        @keyframes categorySlide {
            from {
                transform: translateX(0);
            }
            to {
                transform: translateX(-50%);
            }
        }

        /* PRODUCTS */
        .produk {
            position: relative;
            isolation: isolate;
            max-width: none;
            margin: 0;
            padding: 75px max(6%, calc((100% - 1350px) / 2)) 85px;
            background: #EFE5D9;
            scroll-margin-top: 90px;
        }

        .produk-heading {
            text-align: center;
            margin-bottom: 38px;
        }

        .produk-container {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 28px 16px;
            align-items: start;
        }

        .product-card {
            position: relative;
            cursor: pointer;
            background: transparent;
            border: none;
            border-radius: 0;
            box-shadow: none;
            overflow: visible;
            display: flex;
            flex-direction: column;
            min-width: 0;
            transition: transform .25s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
        }

        .product-card[hidden] {
            display: none !important;
        }

        .product-image {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            background: #E8DED2;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform .4s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.04);
        }

        /* WISHLIST */
        .wishlist-button {
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 5;
            width: 34px;
            height: 34px;
            padding: 0;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, .88);
            color: #493C33;
            font-size: 19px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .25s;
        }

        .wishlist-button:hover {
            transform: scale(1.1);
            background: #FFF;
        }

        .wishlist-button.active {
            color: #B65C55;
        }

        /* PRODUCT INFO */
        .product-info {
            padding: 11px 2px 0;
            background: transparent;
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 13px;
            font-weight: 600;
            color: #2F2925;
            line-height: 1.5;
            margin: 0 0 7px;
        }

        .product-price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            width: 100%;
        }

        .product-price {
            font-size: 13px;
            font-weight: 700;
            color: #493C33;
            margin: 0;
        }

        .product-button {
            width: 30px;
            height: 30px;
            min-width: 30px;
            border: none;
            border-radius: 50%;
            padding: 0;
            font-size: 18px;
            line-height: 1;
            background: #2F2925;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: .25s;
        }

        .product-button:hover {
            background: #9A7651;
            transform: scale(1.08);
        }

        .empty-product {
            grid-column: 1 / -1;
            text-align: center;
            padding: 45px 20px;
            color: #95887C;
            font-size: 13px;
        }

        /* INTRODUCTION */
        .intro {
            max-width: none;
            margin: 0;
            padding: 90px max(7%, calc((100% - 1250px) / 2)) 85px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 65px;
            background: #F8F5F0;
            scroll-margin-top: 100px;
        }

        .intro-image img {
            width: 100%;
            height: 350px;
            display: block;
            object-fit: cover;
            border-radius: 18px;
        }

        .intro-content {
            padding: 10px 0;
        }

        .intro-content h2 {
            font-size: 36px;
            font-weight: 800;
            color: #2F2925;
            margin-bottom: 18px;
        }

        .intro-content p {
            font-size: 13px;
            line-height: 1.9;
            color: #82766B;
            margin-bottom: 22px;
        }

        .intro-link {
            display: inline-block;
            padding: 12px 23px;
            border-radius: 30px;
            background: #2F2925;
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: .25s;
        }

        .intro-link:hover {
            background: #493C33;
        }

        /* FOOTER */
        .footer {
            background: #2F2925;
            color: #EEE5DB;
            padding: 60px 7% 25px;
        }

        .footer-container {
            max-width: 1250px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 60px;
            padding-bottom: 40px;
        }

        .footer-logo {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #F8F5F0;
            margin-bottom: 15px;
        }

        .footer-logo span {
            color: #D6B98C;
        }

        .footer-about p {
            max-width: 340px;
            color: #C3B7AA;
            font-size: 12px;
            line-height: 1.9;
        }

        .footer h4 {
            color: #D6B98C;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .footer-links a,
        .footer-links p {
            color: #C3B7AA;
            font-size: 12px;
            line-height: 1.7;
            transition: .2s;
        }

        .footer-links a:hover {
            color: #D6B98C;
            padding-left: 4px;
        }

        .footer-bottom {
            max-width: 1250px;
            margin: auto;
            padding-top: 22px;
            border-top: 1px solid rgba(255,255,255,.13);
            display: flex;
            justify-content: space-between;
            gap: 15px;
            color: #AA9C8E;
            font-size: 11px;
        }

        .footer-admin-link {
            color: #D6B98C;
            font-size: 11px;
            font-weight: 600;
            transition: .25s;
        }

        .footer-admin-link:hover {
            color: #FFFAF3;
            text-decoration: underline;
        }

        /* PRODUCT DETAIL MODAL */
        .product-modal {
            position: fixed;
            inset: 0;
            z-index: 3000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(35, 29, 25, .65);
            backdrop-filter: blur(5px);
        }

        .product-modal.show {
            display: flex;
        }

        .product-modal-content {
            position: relative;
            width: 100%;
            max-width: 850px;
            max-height: 90vh;
            overflow-y: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #FFFDF9;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.2);
        }

        .modal-close {
            position: absolute;
            top: 13px;
            right: 15px;
            z-index: 5;
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            background: #F0E8DD;
            color: #493C33;
            font-size: 23px;
            cursor: pointer;
        }

        .modal-image {
            min-height: 430px;
            background: #F5F0E9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            max-height: 480px;
            object-fit: contain;
        }

        .modal-info {
            padding: 45px 35px 35px;
        }

        .modal-category {
            display: inline-block;
            padding: 6px 12px;
            background: #F4EADC;
            color: #9A7651;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .modal-info h2 {
            font-size: 25px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .modal-price {
            color: #9A7651;
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 17px;
        }

        .modal-description {
            color: #82766B;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 18px;
            white-space: pre-line;
        }

        .modal-stock {
            color: #62564C;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .modal-field {
            margin-bottom: 17px;
        }

        .modal-color-options {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .modal-color-option {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
            cursor: pointer;
        }

        .modal-color-option input {
            display: none;
        }

        .modal-color-circle {
            width: 22px;
            height: 22px;
            min-width: 22px;
            min-height: 22px;
            aspect-ratio: 1 / 1;
            border-radius: 50%;
            display: inline-block;
            flex-shrink: 0;
            border: 1px solid #D8CEC2;
        }

        .modal-color-option input:checked + .modal-color-circle {
            outline: 2px solid #9A7651;
            outline-offset: 3px;
        }

        .modal-color-name {
            font-size: 10px;
            color: #62564C;
        }

        .modal-field label {
            display: block;
            color: #493C33;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .modal-field select,
        .modal-field input {
            width: 100%;
            padding: 12px;
            border: 1px solid #DFD1C1;
            border-radius: 9px;
            outline: none;
            background: #FFFDF9;
            color: #493C33;
            font-size: 12px;
        }

        .modal-field select:focus,
        .modal-field input:focus {
            border-color: #9A7651;
        }

        .modal-add-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 30px;
            background: #2F2925;
            color: white;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .25s;
        }

        .modal-add-button:hover {
            background: #9A7651;
        }

        .modal-add-button:disabled {
            background: #C9C0B6;
            cursor: not-allowed;
        }

        .cart-success-message {
            display: none;
            position: fixed;
            top: 100px;
            right: 25px;
            z-index: 4000;
            max-width: calc(100% - 40px);
            padding: 15px 22px;
            background: #493C33;
            color: #FFFDF9;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,.15);
            font-size: 13px;
            font-weight: 600;
        }

        .product-modal,
        .product-modal * {
            font-family: 'DM Sans', sans-serif !important;
        }

        /* RESPONSIVE TABLET */
        @media (max-width: 900px) {
            .nav-menu {
                gap: 17px;
            }

            .navbar {
                padding: 0 23px;
            }

            .hero {
                min-height: 550px;
            }

            .intro {
                gap: 35px;
            }

            .produk-container {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        /* RESPONSIVE MOBILE */
        @media (max-width: 600px) {
            html {
                scroll-padding-top: 125px;
            }

            .navbar-wrapper {
                top: 10px;
                padding: 0 4%;
            }

            .navbar {
                height: auto;
                min-height: 58px;
                padding: 12px 18px;
                flex-wrap: wrap;
                gap: 10px;
                border-radius: 25px;
            }

            .logo {
                font-size: 21px;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                height: 35px;
                justify-content: center;
                gap: 18px;
                font-size: 11px;
            }

            .nav-menu a::after {
                bottom: 0;
            }

            .nav-actions {
                gap: 9px;
                font-size: 10px;
            }

            .user-greeting {
                max-width: 85px;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .nav-register {
                padding: 8px 12px;
            }

            .profile-icon,
            .cart-icon {
                width: 35px;
                height: 35px;
                min-width: 35px;
            }

            .hero {
                min-height: 520px;
                padding: 170px 7% 90px;
            }

            .hero-content h1 {
                font-size: 43px;
            }

            .hero-content p {
                font-size: 13px;
            }

            .hero-arrow {
                width: 36px;
                height: 36px;
                font-size: 24px;
            }

            .hero-prev {
                left: 12px;
            }

            .hero-next {
                right: 12px;
            }

            .hero-dots {
                position: absolute;
                bottom: 105px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 5;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .search-section {
                margin-bottom: 0;
            }

            .search-bar {
                min-height: 62px;
                padding: 9px 10px 9px 18px;
                gap: 8px;
            }

            .search-bar input {
                font-size: 11px;
            }

            .search-button {
                padding: 12px 17px;
                font-size: 10px;
            }

            .category-filter {
                padding: 15px 4% 10px;
                margin: 0;
            }

            .filter-list {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                gap: 8px;
            }

            .filter-button {
                padding: 9px 15px;
                font-size: 11px;
            }

            .category {
                padding: 15px 0 60px;
            }

            .category-heading {
                margin: 0 5% 25px;
            }

            .category-card {
                flex-basis: 190px;
                width: 190px;
                height: 270px;
            }

            .category-track {
                gap: 15px;
                animation-duration: 48s;
            }

            .category-card-overlay {
                padding: 17px 15px;
            }

            .category-card-overlay h3 {
                font-size: 19px;
            }

            .category-card-overlay p {
                font-size: 9px;
            }

            .produk {
                padding: 60px 5% 65px;
            }

            .produk-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 20px 10px;
            }

            .product-info {
                padding: 9px 2px 0;
            }

            .product-name,
            .product-price {
                font-size: 11px;
            }

            .product-button {
                width: 27px;
                height: 27px;
                min-width: 27px;
            }

            .intro {
                grid-template-columns: 1fr;
                padding: 65px 7%;
                gap: 27px;
            }

            .intro-image img {
                height: 260px;
            }

            .intro-content h2 {
                font-size: 29px;
            }

            .section-title {
                font-size: 28px;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 35px 20px;
            }

            .footer-about {
                grid-column: 1 / -1;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .product-modal {
                padding: 12px;
            }

            .product-modal-content {
                grid-template-columns: 1fr;
                max-width: 430px;
            }

            .modal-image {
                min-height: 230px;
                height: 230px;
                padding: 15px;
            }

            .modal-image img {
                max-height: 210px;
            }

            .modal-info {
                padding: 25px 22px;
            }

            .modal-info h2 {
                font-size: 23px;
            }

            .cart-success-message {
                top: 85px;
                right: 15px;
                font-size: 11px;
            }
        }

        @media (max-width: 380px) {
            .nav-menu {
                gap: 13px;
                font-size: 10px;
            }

            .logo {
                font-size: 19px;
            }

            .nav-actions {
                gap: 7px;
            }

            .user-greeting {
                display: none;
            }

            .produk-container {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .product-info {
                padding: 9px 2px 0;
            }

            .product-button {
                width: 27px;
                height: 27px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    @php
    $cartCount = auth()->check()
        ? \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity')
        : 0;
@endphp

    <!-- NAVBAR -->
    <div class="navbar-wrapper">
        <nav class="navbar">

            <a href="#home" class="logo">WEAR<span>LY</span></a>

            <div class="nav-menu">
                <a href="#home" class="active">Home</a>
                <a href="#kategori">Kategori</a>
                <a href="#produk">Produk</a>
                <a href="#tentang">Tentang</a>

                @auth
                    <a href="{{ route('user.history') }}">Riwayat</a>
                @endauth
            </div>

            <div class="nav-actions">
                @auth
                    <span class="user-greeting">
                        Halo, {{ Auth::user()->name }}
                    </span>

                    <a href="{{ route('user.profile') }}"
                       class="profile-icon"
                       title="Profil Saya"
                       aria-label="Profil Saya">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4.5 21a7.5 7.5 0 0 1 15 0"></path>
                        </svg>
                    </a>

                    <a href="{{ route('cart.index') }}"
                       class="cart-icon"
                       aria-label="Keranjang belanja">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>

                        <span class="cart-badge"
                              @if($cartCount < 1) style="display:none;" @endif>
                            {{ $cartCount > 99 ? '99+' : $cartCount }}
                        </span>
                    </a>

                    <form action="{{ url('/logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-login">Login</a>
                    <a href="{{ url('/register') }}" class="nav-register">Register</a>
                @endauth
            </div>
        </nav>
    </div>

    <!-- HERO SLIDER -->
    <section class="hero" id="home">
        <div class="hero-slides">

            <div class="hero-slide active">
                <img src="{{ asset('images/hero/wearly-hero.jpg') }}"
                     alt="WEARLY Fashion Collection" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <span class="hero-label">WELCOME TO WEARLY</span>
                    <h1>Tampil Stylish <br>Setiap Saat</h1>
                    <p>Temukan berbagai pilihan fashion dan accessories
                       untuk melengkapi gaya sehari-harimu.</p>
                </div>
            </div>

            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1579171931975-97962e46be2d?auto=format&fit=crop&w=1800&q=85"
                     alt="Everyday Fashion Style" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <span class="hero-label">EVERYDAY COLLECTION</span>
                    <h1>Temukan Koleksi<br>Favoritmu</h1>
                    <p>Ekspresikan gaya personalmu melalui pilihan
                       fashion yang nyaman dan menarik.</p>
                </div>
            </div>

            <div class="hero-slide">
                <img src="https://images.unsplash.com/photo-1759229874914-c1ffdb3ebd0c?auto=format&fit=crop&w=1800&q=85"
                     alt="Fashion Lifestyle Collection" class="hero-image">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <span class="hero-label">DISCOVER YOUR LOOK</span>
                    <h1>Upgrade Gaya<br> dan Penampilan</h1>
                    <p>Lengkapi penampilanmu dengan koleksi pilihan
                       yang membuat setiap momen lebih berkesan.</p>
                </div>
            </div>
        </div>

        <button type="button" class="hero-arrow hero-prev" aria-label="Slide sebelumnya">&#8249;</button>
        <button type="button" class="hero-arrow hero-next" aria-label="Slide selanjutnya">&#8250;</button>

        <div class="hero-dots">
            <button type="button" class="hero-dot active" aria-label="Slide 1"></button>
            <button type="button" class="hero-dot" aria-label="Slide 2"></button>
            <button type="button" class="hero-dot" aria-label="Slide 3"></button>
        </div>
    </section>

    <!-- SEARCH BAR -->
    <section class="search-section">
        <form action="{{ route('user.dashboard') }}#produk" method="GET" class="search-bar">
            <input type="text" name="search"
                   placeholder="Cari produk fashion favoritmu..."
                   value="{{ $query ?? request('search') }}">
            <button type="submit" class="search-button">Cari Produk</button>
        </form>
    </section>

    <!-- CATEGORY FILTER -->
    <section class="category-filter">
        <div class="filter-list">
            <button type="button" class="filter-button active" data-filter="all">All Products</button>
            <button type="button" class="filter-button" data-filter="t-shirt">T-Shirt</button>
            <button type="button" class="filter-button" data-filter="dress">Dress</button>
            <button type="button" class="filter-button" data-filter="skirts">Rok</button>
            <button type="button" class="filter-button" data-filter="outerwear">Outerwear</button>
            <button type="button" class="filter-button" data-filter="bags">Bags</button>
            <button type="button" class="filter-button" data-filter="watches">Watches</button>
            <button type="button" class="filter-button" data-filter="eyewear">Eyewear</button>
            <button type="button" class="filter-button" data-filter="accessories">Accessories</button>
        </div>
    </section>

    <!-- CATEGORY CAROUSEL -->
    <section class="category" id="kategori">
        <div class="category-inner">

            <div class="category-heading">
                <h2 class="section-title">Pilihan Kategori Untuk Gayamu</h2>
                <p class="section-description">
                    Temukan koleksi fashion pilihan untuk melengkapi gaya sehari-harimu.
                </p>
            </div>

            @if ($categories->isNotEmpty())
                <div class="category-carousel" id="categoryCarousel">
                    <div class="category-track" id="categoryTrack">

                        @foreach ($categories as $index => $category)
                            <div class="category-card"
                                 data-category-filter="{{ \Illuminate\Support\Str::slug($category->nama) }}"
                                 role="button"
                                 tabindex="0"
                                 aria-label="Lihat kategori {{ $category->nama }}">

                                @if ($category->foto)
                                    <img src="{{ asset('storage/' . $category->foto) }}"
                                         alt="{{ $category->nama }}"
                                         loading="lazy">
                                @else
                                    <div class="category-placeholder">WEARLY</div>
                                @endif

                                <div class="category-card-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="category-card-overlay">
                                    <h3>{{ $category->nama }}</h3>
                                    <p>{{ $category->deskripsi ?: 'Discover our selected collection.' }}</p>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($categories as $index => $category)
                            <div class="category-card"
                                 data-category-filter="{{ \Illuminate\Support\Str::slug($category->nama) }}"
                                 role="button"
                                 tabindex="0"
                                 aria-label="Lihat kategori {{ $category->nama }}">

                                @if ($category->foto)
                                    <img src="{{ asset('storage/' . $category->foto) }}"
                                         alt="{{ $category->nama }}"
                                         loading="lazy">
                                @else
                                    <div class="category-placeholder">WEARLY</div>
                                @endif

                                <div class="category-card-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="category-card-overlay">
                                    <h3>{{ $category->nama }}</h3>
                                    <p>{{ $category->deskripsi ?: 'Discover our selected collection.' }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @else
                <p class="empty-product">Belum ada kategori yang tersedia.</p>
            @endif

        </div>
    </section>

    <!-- PRODUCT SECTION -->
    <section class="produk" id="produk">

        <div class="produk-heading">
            <h2 class="section-title">Temukan Koleksi Wearly</h2>
            <p class="section-description">
                Temukan pilihan fashion favorit untuk melengkapi penampilanmu.
            </p>
        </div>

        <div class="produk-container" id="productContainer">

            @forelse($products as $product)

                @php
                    $category = strtolower(trim($product->kategori ?? ''));

                    $hasSize = preg_match(
                        '/tshirt|t-shirt|kaos|shirt|kemeja|dress|gaun|pants|celana|rok|skirt|outerwear|hoodie|sweater|jacket|jaket/',
                        $category
                    );

                    $isPants = preg_match('/pants|celana/', $category);

                    $isTshirt = preg_match('/tshirt|t-shirt|kaos/', $category);

                    $productDescription = $product->deskripsi
                        ?? $product->description
                        ?? 'Produk pilihan WEARLY dengan desain menarik dan nyaman digunakan untuk melengkapi gaya sehari-hari.';

                    $productStock = $product->stok ?? $product->stock ?? '';

                    $productImage = asset('images/products/' . $product->gambar);
                @endphp

                <div class="product-card"
                     data-product-id="{{ $product->id }}"
                     data-category="{{ $category }}"
                     data-name="{{ $product->nama }}"
                     data-price="{{ $product->harga }}"
                     data-description="{{ $productDescription }}"
                     data-stock="{{ $productStock }}"
                     data-image="{{ $productImage }}"
                     data-has-size="{{ $hasSize ? '1' : '0' }}"
                     data-is-pants="{{ $isPants ? '1' : '0' }}"
                     data-is-tshirt="{{ $isTshirt ? '1' : '0' }}"
                     data-cart-url="{{ route('cart.add', $product->id) }}"
                     role="button"
                     tabindex="0"
                     aria-label="Lihat detail {{ $product->nama }}">

                    <div class="product-image">
                        <img src="{{ $productImage }}"
                             alt="{{ $product->nama }}"
                             loading="lazy">

                        <button type="button"
                                class="wishlist-button"
                                data-product-id="{{ $product->id }}"
                                aria-label="Tambahkan ke favorit"
                                aria-pressed="false">♡</button>
                    </div>

                    <div class="product-info">
                        <h3 class="product-name">{{ $product->nama }}</h3>

                        <div class="product-price-row">
                            <p class="product-price">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>

                            <button type="button"
                                    class="product-button"
                                    aria-label="Pilih produk {{ $product->nama }}">
                                +
                            </button>
                        </div>
                    </div>
                </div>

            @empty
                <p class="empty-product">Belum ada produk tersedia.</p>
            @endforelse

            <p class="empty-product" id="filterEmptyMessage" hidden>
                Produk yang kamu cari belum tersedia dalam kategori ini.
            </p>

        </div>
    </section>

    <!-- ABOUT -->
    <section class="intro" id="tentang">

        <div class="intro-image">
            <img src="{{ asset('images/hero/wearly-intro.jpg') }}"
                 alt="Koleksi fashion WEARLY">
        </div>

        <div class="intro-content">
            <div class="section-label">GET TO KNOW WEARLY</div>
            <h2>Welcome to WEARLY!</h2>

            <p>
                WEARLY hadir untuk menemani setiap aktivitas dan
                kebutuhan fashion sehari-hari. Kami menyediakan
                berbagai pilihan pakaian dan accessories dengan
                desain menarik yang dapat melengkapi gaya personalmu.
            </p>

            <p>
                Temukan pilihan favoritmu dan ciptakan gaya yang
                nyaman, percaya diri, serta sesuai dengan karaktermu.
            </p>

            <a href="#produk" class="intro-link">Explore Collection</a>
        </div>

    </section>

    <!-- PRODUCT DETAIL MODAL -->
    <div class="product-modal" id="productModal">
        <div class="product-modal-content">

            <button type="button"
                    class="modal-close"
                    id="modalClose"
                    aria-label="Tutup">&times;</button>

            <div class="modal-image">
                <img src="" id="modalProductImage" alt="Detail produk">
            </div>

            <div class="modal-info">
                <span class="modal-category" id="modalProductCategory"></span>
                <h2 id="modalProductName"></h2>
                <div class="modal-price" id="modalProductPrice"></div>
                <p class="modal-description" id="modalProductDescription"></p>
                <div class="modal-stock" id="modalProductStock"></div>

                <form action="#" method="POST" id="modalAddForm">
                    @csrf

                    <div class="modal-field" id="modalSizeField">
                        <label for="modalProductSize">Pilih Ukuran</label>
                        <select name="ukuran" id="modalProductSize">
                            <option value="">Pilih ukuran</option>
                        </select>
                    </div>

                    <div class="modal-field" id="modalColorField" style="display:none;">
                        <label>Pilih Warna</label>

                        <div class="modal-color-options">
                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Hitam">
                                <span class="modal-color-circle" style="background:#292929;"></span>
                                <span class="modal-color-name">Hitam</span>
                            </label>

                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Putih">
                                <span class="modal-color-circle" style="background:#FFFFFF;"></span>
                                <span class="modal-color-name">Putih</span>
                            </label>

                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Cream">
                                <span class="modal-color-circle" style="background:#E9DCC8;"></span>
                                <span class="modal-color-name">Cream</span>
                            </label>

                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Cokelat">
                                <span class="modal-color-circle" style="background:#795548;"></span>
                                <span class="modal-color-name">Cokelat</span>
                            </label>

                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Navy">
                                <span class="modal-color-circle" style="background:#263B59;"></span>
                                <span class="modal-color-name">Navy</span>
                            </label>

                            <label class="modal-color-option">
                                <input type="radio" name="warna" value="Maroon">
                                <span class="modal-color-circle" style="background:#762E3B;"></span>
                                <span class="modal-color-name">Maroon</span>
                            </label>
                        </div>
                    </div>

                    <div class="modal-field">
                        <label for="modalProductQuantity">Jumlah</label>
                        <input type="number"
                               name="quantity"
                               id="modalProductQuantity"
                               value="1"
                               min="1"
                               required>
                    </div>

                    <button type="submit"
                            class="modal-add-button"
                            id="modalAddButton">
                        Tambahkan ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="cart-success-message" id="cartSuccessMessage"></div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-container">

            <div class="footer-about">
                <div class="footer-logo">WEAR<span>LY</span></div>
                <p>
                    WEARLY menyediakan berbagai pilihan fashion
                    dan accessories untuk melengkapi gaya sehari-hari.
                    Temukan gaya yang mencerminkan kepribadianmu
                    bersama WEARLY.
                </p>
            </div>

            <div>
                <h4>Quick Links</h4>
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#kategori">Kategori</a>
                    <a href="#produk">Produk</a>
                    <a href="#tentang">Tentang Kami</a>
                </div>
            </div>

            <div>
                <h4>Customer Service</h4>
                <div class="footer-links">
                    <a href="{{ route('cart.index') }}">Keranjang Belanja</a>
                    <a href="{{ route('checkout.index') }}">Checkout</a>

                    @auth
                        <a href="{{ route('user.history') }}">Riwayat Belanja</a>
                    @endauth

                    <p>
                        Ada pertanyaan mengenai produk atau pesanan?
                        Silakan hubungi admin toko melalui layanan
                        pelanggan WEARLY.
                    </p>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <span>© 2026 WEARLY. All Rights Reserved.</span>
            <span>Wear Your Everyday Style.</span>
            <a href="{{ route('login') }}" class="footer-admin-link">Admin Login</a>
        </div>
    </footer>

    @include('chatbot')

    <!-- ACTIVE NAVBAR -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
            const sections = ['home', 'kategori', 'produk', 'tentang']
                .map(id => document.getElementById(id))
                .filter(Boolean);

            function updateActiveMenu() {
                let currentSection = 'home';
                const scrollPosition = window.scrollY + 180;

                sections.forEach(function (section) {
                    if (scrollPosition >= section.offsetTop) {
                        currentSection = section.id;
                    }
                });

                navLinks.forEach(function (link) {
                    link.classList.toggle(
                        'active',
                        link.getAttribute('href') === '#' + currentSection
                    );
                });
            }

            window.addEventListener('scroll', updateActiveMenu, { passive: true });
            updateActiveMenu();
        });
    </script>

    <!-- CATEGORY FILTER -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const filterButtons = document.querySelectorAll('.filter-button');
            const productCards = document.querySelectorAll('.product-card');
            const categoryCards = document.querySelectorAll('.category-card');
            const categoryCarousel = document.getElementById('categoryCarousel');
            const emptyMessage = document.getElementById('filterEmptyMessage');

            const categoryAliases = {
                't-shirt': ['tshirt', 't-shirt', 'kaos'],
                'dress': ['dress', 'gaun'],
                'skirts': ['rok', 'skirt', 'skirts'],
                'outerwear': ['outerwear', 'hoodie', 'sweater', 'jacket', 'jaket', 'cardigan'],
                'bags': ['bags', 'bag', 'tas'],
                'watches': ['watch', 'watches', 'jam'],
                'eyewear': ['eyewear', 'sunglasses', 'glasses', 'kacamata'],
                'accessories': ['accessories', 'accessory', 'aksesoris', 'aksesori']
            };

            function normalize(value) {
                return (value || '')
                    .toLowerCase()
                    .replace(/[^a-z0-9]/g, '');
            }

            function filterProducts(selectedFilter) {

                filterButtons.forEach(function (button) {
                    button.classList.toggle(
                        'active',
                        button.dataset.filter === selectedFilter
                    );
                });

                const aliases = categoryAliases[selectedFilter] || [selectedFilter];
                const normalizedAliases = aliases.map(normalize);

                let visibleCount = 0;

                productCards.forEach(function (card) {
                    const productCategory = normalize(card.dataset.category);

                    const show = selectedFilter === 'all' ||
                        normalizedAliases.some(function (alias) {
                            return alias && productCategory.includes(alias);
                        });

                    card.hidden = !show;

                    if (show) visibleCount++;
                });

                if (emptyMessage) {
                    emptyMessage.hidden = visibleCount !== 0;
                }
            }

            // FILTER BUTTON
            filterButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    filterProducts(this.dataset.filter);

                    document.querySelector('#produk').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });

            // CATEGORY CARD
            categoryCards.forEach(function (card) {

                function selectCategory() {
                    const categoryName = normalize(card.dataset.categoryFilter);

                    const matchingFilter = Object.keys(categoryAliases).find(function (filter) {
                        return categoryAliases[filter].some(function (alias) {
                            const normalizedAlias = normalize(alias);

                            return categoryName.includes(normalizedAlias) ||
                                normalizedAlias.includes(categoryName);
                        });
                    });

                    filterProducts(matchingFilter || categoryName);

                    document.querySelector('#produk').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }

                card.addEventListener('click', selectCategory);

                card.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        selectCategory();
                    }
                });
            });

            // CENTER CARD EFFECT
            if (categoryCarousel) {
                const track = document.getElementById('categoryTrack');

                function updateCenterCard() {
                    if (!track || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                        return;
                    }

                    const cards = track.querySelectorAll('.category-card');
                    const carouselRect = categoryCarousel.getBoundingClientRect();
                    const centerPosition = carouselRect.left + carouselRect.width / 2;

                    let closestCard = null;
                    let closestDistance = Infinity;

                    cards.forEach(function (card) {
                        const rect = card.getBoundingClientRect();
                        const cardCenter = rect.left + rect.width / 2;
                        const distance = Math.abs(centerPosition - cardCenter);

                        if (distance < closestDistance) {
                            closestDistance = distance;
                            closestCard = card;
                        }
                    });

                    cards.forEach(function (card) {
                        card.classList.toggle('is-center', card === closestCard);
                    });
                }

                let centerTimer;

                function startCenterTimer() {
                    if (centerTimer) return;

                    centerTimer = setInterval(updateCenterCard, 250);
                }

                function stopCenterTimer() {
                    clearInterval(centerTimer);
                    centerTimer = null;
                }

                categoryCarousel.addEventListener('mouseenter', stopCenterTimer);
                categoryCarousel.addEventListener('mouseleave', startCenterTimer);
                window.addEventListener('resize', updateCenterCard);

                updateCenterCard();
                startCenterTimer();
            }

        });
    </script>

    <!-- PRODUCT DETAIL MODAL -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modal = document.getElementById('productModal');
            const closeButton = document.getElementById('modalClose');

            const modalImage = document.getElementById('modalProductImage');
            const modalName = document.getElementById('modalProductName');
            const modalCategory = document.getElementById('modalProductCategory');
            const modalPrice = document.getElementById('modalProductPrice');
            const modalDescription = document.getElementById('modalProductDescription');
            const modalStock = document.getElementById('modalProductStock');

            const modalForm = document.getElementById('modalAddForm');
            const sizeField = document.getElementById('modalSizeField');
            const sizeSelect = document.getElementById('modalProductSize');
            const colorField = document.getElementById('modalColorField');
            const quantityInput = document.getElementById('modalProductQuantity');
            const addButton = document.getElementById('modalAddButton');

            const successMessage = document.getElementById('cartSuccessMessage');
            const productCards = document.querySelectorAll('.product-card');
            const cartBadge = document.querySelector('.cart-badge');

            let successTimer;

            function formatRupiah(value) {
                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
            }

            function showMessage(message, isError = false) {
                successMessage.textContent = message;
                successMessage.style.display = 'block';
                successMessage.style.background = isError ? '#8B3D35' : '#493C33';

                clearTimeout(successTimer);

                successTimer = setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 3500);
            }

            function updateCartBadge(count) {
                const badge = document.querySelector('.cart-badge');

                if (!badge) return;

                const total = Number(count) || 0;

                badge.textContent = total > 99 ? '99+' : total;
                badge.style.display = total > 0 ? 'flex' : 'none';
            }

            function closeModal() {
                modal.classList.remove('show');
                document.body.style.overflow = '';
            }

            function openModal(card) {
                const name = card.dataset.name || 'Produk WEARLY';
                const category = card.dataset.category || 'Fashion';
                const price = Number(card.dataset.price || 0);
                const description = card.dataset.description || '';

                const rawStock = card.dataset.stock;
                const stock = rawStock === '' || rawStock === undefined
                    ? null
                    : Number(rawStock);

                const image = card.dataset.image || '';
                const hasSize = card.dataset.hasSize === '1';
                const isPants = card.dataset.isPants === '1';
                const isTshirt = card.dataset.isTshirt === '1';

                modalImage.src = image;
                modalImage.alt = name;

                modalName.textContent = name;
                modalCategory.textContent = category;
                modalPrice.textContent = formatRupiah(price);
                modalDescription.textContent = description;

                if (stock === null || Number.isNaN(stock)) {
                    modalStock.textContent = 'Stok dapat dikonfirmasi saat checkout';
                } else if (stock > 0) {
                    modalStock.textContent = 'Stok tersedia: ' + stock;
                } else {
                    modalStock.textContent = 'Stok habis';
                }

                modalForm.action = card.dataset.cartUrl;

                // SIZE
                sizeSelect.innerHTML = '<option value="">Pilih ukuran</option>';

                if (hasSize) {
                    sizeField.style.display = 'block';
                    sizeSelect.required = true;

                    const sizes = isPants
                        ? ['28', '30', '32', '34', '36']
                        : ['S', 'M', 'L', 'XL'];

                    sizes.forEach(function (size) {
                        const option = document.createElement('option');
                        option.value = size;
                        option.textContent = size;
                        sizeSelect.appendChild(option);
                    });
                } else {
                    sizeField.style.display = 'none';
                    sizeSelect.required = false;
                    sizeSelect.value = '';
                }

                // COLOR: T-SHIRT ONLY
                colorField.style.display = isTshirt ? 'block' : 'none';

                const colorInputs = modalForm.querySelectorAll('input[name="warna"]');

                colorInputs.forEach(function (color) {
                    color.checked = false;
                    color.required = isTshirt;
                });

                // QUANTITY
                quantityInput.value = 1;
                quantityInput.min = 1;
                quantityInput.max = stock !== null && stock > 0
                    ? stock
                    : 999;

                const soldOut = stock !== null && stock <= 0;

                quantityInput.disabled = soldOut;
                addButton.disabled = soldOut;

                addButton.textContent = soldOut
                    ? 'Stok Habis'
                    : 'Tambahkan ke Keranjang';

                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            // OPEN MODAL
            productCards.forEach(function (card) {

                card.addEventListener('click', function (event) {
                    if (event.target.closest('.wishlist-button')) {
                        return;
                    }

                    openModal(this);
                });

                card.addEventListener('keydown', function (event) {
                    if (event.target !== card) return;

                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        openModal(this);
                    }
                });
            });

            // CLOSE MODAL
            closeButton.addEventListener('click', closeModal);

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('show')) {
                    closeModal();
                }
            });

            // VALIDASI JUMLAH
            quantityInput.addEventListener('change', function () {
                const max = Number(this.max);
                let value = Number(this.value);

                if (!value || value < 1) value = 1;
                if (value > max) value = max;

                this.value = value;
            });

            // AJAX ADD TO CART
            modalForm.addEventListener('submit', async function (event) {
                event.preventDefault();

                if (!modalForm.reportValidity()) {
                    return;
                }

                const originalText = addButton.textContent;

                addButton.disabled = true;
                addButton.textContent = 'Menambahkan...';

                try {
                    const response = await fetch(modalForm.action, {
                        method: 'POST',
                        body: new FormData(modalForm),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin'
                    });

                    let result;

                    try {
                        result = await response.json();
                    } catch (error) {
                        throw new Error('Respons server tidak dapat dibaca. Silakan coba lagi.');
                    }

                    if (!response.ok || !result.success) {
                        let errorMessage = result.message || 'Produk gagal ditambahkan ke keranjang.';

                        if (result.errors) {
                            errorMessage = Object.values(result.errors).flat().join(' ');
                        }

                        throw new Error(errorMessage);
                    }

                    // UPDATE BADGE DARI RESPONS CONTROLLER
                    if (typeof result.cart_count !== 'undefined') {
                        updateCartBadge(result.cart_count);
                    }

                    closeModal();
                    showMessage(result.message || '✓ Produk berhasil ditambahkan ke keranjang!');

                } catch (error) {
                    showMessage(
                        error.message || 'Terjadi kesalahan saat menambahkan produk.',
                        true
                    );

                } finally {
                    addButton.disabled = false;
                    addButton.textContent = originalText;
                }
            });

        });
    </script>

    <!-- HERO SLIDER SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.hero-dot');
            const prevButton = document.querySelector('.hero-prev');
            const nextButton = document.querySelector('.hero-next');
            const hero = document.querySelector('.hero');

            if (!slides.length || !dots.length || !prevButton || !nextButton || !hero) {
                return;
            }

            let currentSlide = 0;
            let sliderInterval;

            function showSlide(index) {
                slides[currentSlide].classList.remove('active');
                dots[currentSlide].classList.remove('active');

                currentSlide = (index + slides.length) % slides.length;

                slides[currentSlide].classList.add('active');
                dots[currentSlide].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentSlide + 1);
            }

            function prevSlide() {
                showSlide(currentSlide - 1);
            }

            function startSlider() {
                clearInterval(sliderInterval);
                sliderInterval = setInterval(nextSlide, 6500);
            }

            function stopSlider() {
                clearInterval(sliderInterval);
            }

            nextButton.addEventListener('click', function () {
                nextSlide();
                startSlider();
            });

            prevButton.addEventListener('click', function () {
                prevSlide();
                startSlider();
            });

            dots.forEach(function (dot, index) {
                dot.addEventListener('click', function () {
                    showSlide(index);
                    startSlider();
                });
            });

            hero.addEventListener('mouseenter', stopSlider);
            hero.addEventListener('mouseleave', startSlider);

            document.addEventListener('visibilitychange', function () {
                if (document.hidden) {
                    stopSlider();
                } else {
                    startSlider();
                }
            });

            startSlider();
        });
    </script>

    <!-- WISHLIST SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const wishlistButtons = document.querySelectorAll('.wishlist-button');

            let favorites = [];

            try {
                favorites = JSON.parse(
                    localStorage.getItem('wearly_favorites') || '[]'
                );

                if (!Array.isArray(favorites)) {
                    favorites = [];
                }
            } catch (error) {
                favorites = [];
            }

            function updateButton(button) {
                const productId = String(button.dataset.productId);
                const isFavorite = favorites.includes(productId);

                button.classList.toggle('active', isFavorite);
                button.setAttribute('aria-pressed', isFavorite ? 'true' : 'false');

                button.setAttribute(
                    'aria-label',
                    isFavorite ? 'Hapus dari favorit' : 'Tambahkan ke favorit'
                );

                button.textContent = isFavorite ? '♥' : '♡';
            }

            wishlistButtons.forEach(function (button) {
                updateButton(button);

                button.addEventListener('click', function (event) {
                    event.stopPropagation();

                    const productId = String(this.dataset.productId);

                    if (favorites.includes(productId)) {
                        favorites = favorites.filter(function (id) {
                            return id !== productId;
                        });
                    } else {
                        favorites.push(productId);
                    }

                    localStorage.setItem(
                        'wearly_favorites',
                        JSON.stringify(favorites)
                    );

                    updateButton(this);
                });
            });

        });
    </script>

</body>
</html>
