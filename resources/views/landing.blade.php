
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEARLY | Find Your Style</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f5f0;
        }

        .landing {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(
                    90deg,
                    rgba(35, 29, 25, 0.72) 0%,
                    rgba(35, 29, 25, 0.42) 48%,
                    rgba(35, 29, 25, 0.12) 100%
                ),
                linear-gradient(
                    0deg,
                    rgba(35, 29, 25, 0.35),
                    transparent 45%
                ),
                url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=2000&q=90');

            background-size: cover;
            background-position: center;
            color: #fff;
        }

        /* NAVBAR */

        .navbar {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 30px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.16);
        }

        .logo {
            text-decoration: none;
            color: #f8f5f0;
            font-size: 30px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .logo span {
            color: #d6b98c;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .nav-label {
            color: rgba(255,255,255,0.8);
            font-size: 11px;
            letter-spacing: 2px;
            margin-right: 12px;
        }

        .nav-btn {
            text-decoration: none;
            padding: 11px 27px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .login {
            color: white;
            border: 1px solid rgba(255,255,255,0.8);
        }

        .login:hover {
            background: white;
            color: #2f2925;
        }

        .register {
            background: #2f2925;
            color: #f8f5f0;
            border: 1px solid #2f2925;
        }

        .register:hover {
            background: #493c33;
            border-color: #493c33;
            transform: translateY(-2px);
        }

        /* HERO */

        .hero-content {
            position: relative;
            z-index: 1;
            min-height: calc(100vh - 95px);
            padding: 40px 7% 85px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(55px, 7.5vw, 100px);
            font-weight: 500;
            line-height: 1.08;
            letter-spacing: -2px;
            max-width: 700px;
            margin-bottom: 24px;
        }

        .hero-content h1 span {
            color: #d6b98c;
            font-style: italic;
        }

        .hero-description {
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            line-height: 1.9;
            max-width: 410px;
            margin-bottom: 25px;
        }

        .hero-note {
            color: rgba(255,255,255,0.7);
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* BOTTOM INFORMATION */

        .bottom-info {
            position: absolute;
            z-index: 2;
            bottom: 28px;
            left: 7%;
            right: 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgba(255,255,255,0.75);
            font-size: 10px;
            letter-spacing: 2px;
        }

        .bottom-info .right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .bottom-info .right::before {
            content: "";
            width: 35px;
            height: 1px;
            background: #d6b98c;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {
            .navbar {
                padding: 23px 5%;
            }

            .logo {
                font-size: 25px;
            }

            .nav-label {
                display: none;
            }

            .nav-right {
                gap: 8px;
            }

            .nav-btn {
                padding: 9px 16px;
                font-size: 11px;
            }

            .hero-content {
                padding: 40px 7% 100px;
                min-height: calc(100vh - 75px);
            }

            .hero-content h1 {
                font-size: clamp(48px, 10vw, 72px);
            }

            .hero-description {
                font-size: 13px;
                max-width: 340px;
            }

            .bottom-info {
                left: 7%;
                right: 7%;
                font-size: 8px;
                letter-spacing: 1px;
            }
        }

        @media (max-width: 420px) {
            .navbar {
                padding: 20px 4%;
            }

            .logo {
                font-size: 22px;
                letter-spacing: 2px;
            }

            .nav-btn {
                padding: 8px 12px;
            }

            .hero-content h1 {
                font-size: 48px;
            }

            .bottom-info {
                font-size: 7px;
            }
        }
    </style>
</head>

<body>

    <main class="landing">

        <nav class="navbar">

            <a href="{{ url('/') }}" class="logo">
                WEAR<span>LY</span>
            </a>

            <div class="nav-right">

                <span class="nav-label">
                    YOUR STYLE, YOUR STORY
                </span>

                <a href="{{ route('login') }}" class="nav-btn login">
                    Login
                </a>

                <a href="{{ url('/register') }}" class="nav-btn register">
                    Register
                </a>

            </div>

        </nav>

        <section class="hero-content">

            <h1>
                Find Your<br>
                Own <span>Style.</span>
            </h1>

            <p class="hero-description">
                Discover a collection that reflects your personality.
                Find your favorite style and make every moment
                a little more special with WEARLY.
            </p>

            <p class="hero-note">
                Elegance in Every Detail
            </p>

        </section>

        <div class="bottom-info">

            <span>WEARLY © 2026</span>

            <span class="right">
                DISCOVER YOUR EVERYDAY STYLE
            </span>

        </div>

    </main>

</body>
</html>
