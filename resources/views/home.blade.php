<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteName }} - Laravel MVC</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fdf2f8;
            color: #831843;
            line-height: 1.6;
        }

        header {
            background: #db2777;
            color: white;
            padding: 18px 6%;
        }

        .header-top, .logo, .nav-links, .buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-top {
            max-width: 1200px;
            margin: auto;
            justify-content: space-between;
        }

        .logo-icon {
            background: white;
            color: #db2777;
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 8px;
            font-weight: bold;
        }

        .logo p {
            font-size: 12px;
            color: #fce7f3;
        }

        .milestone {
            border: 1px solid white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        nav {
            background: #be185d;
            padding: 12px 6%;
        }

        .nav-links {
            max-width: 1200px;
            margin: auto;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .hero {
            max-width: 1200px;
            margin: auto;
            padding: 65px 6%;
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .hero-text, .hero-image {
            flex: 1;
            min-width: 0;
        }

        .subtitle, .section-title {
            color: #db2777;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 40px;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .description, .section-desc {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .buttons {
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-primary {
            background: #db2777;
            color: white;
        }

        .btn-secondary {
            background: white;
            border: 1px solid #f9a8d4;
            color: #831843;
        }

        .hero-image img {
            width: 100%;
            display: block;
            border-radius: 16px;
            box-shadow: 0 8px 25px #db277733;
        }

        .section {
            max-width: 1200px;
            margin: auto;
            padding: 40px 6%;
            scroll-margin-top: 20px;
        }

        .section-heading {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .section-desc {
            margin-bottom: 25px;
        }

        .flow-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 15px;
        }

        .flow-card, .course-card {
            background: white;
            border: 1px solid #fbcfe8;
            border-radius: 12px;
            padding: 20px 15px;
        }

        .flow-card {
            text-align: center;
        }

        .flow-number {
            width: 32px;
            height: 32px;
            display: grid;
            place-items: center;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: #fce7f3;
            color: #db2777;
            font-weight: bold;
        }

        .flow-card h3 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .flow-card p {
            font-size: 11px;
            color: #9d174d;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            background: #fce7f3;
            color: #db2777;
            font-size: 11px;
            font-weight: bold;
        }

        .course-card h3 {
            margin: 12px 0 8px;
            font-size: 18px;
        }

        .course-card p {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .course-link {
            color: #db2777;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .empty-message {
            grid-column: 1 / -1;
            padding: 18px;
            background: white;
            border: 1px solid #fbcfe8;
            border-radius: 10px;
        }

        footer {
            margin-top: 30px;
            padding: 20px;
            text-align: center;
            color: white;
            background: #831843;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .flow-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 40px 7%;
            }

            .hero-text, .hero-image {
                width: 100%;
            }

            h1 {
                font-size: 32px;
            }

            .flow-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .course-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <div class="logo-icon">K</div>
                <div>
                    <h2>{{ $siteName }}</h2>
                    <p>Laravel MVC</p>
                </div>
            </div>
            <span class="milestone">Milestone 7</span>
        </div>
    </header>

    <nav>
        <div class="nav-links">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#alur">Alur MVC</a>
            <a href="#kursus">Kursus Pilihan</a>
        </div>
    </nav>

    <main class="hero">
        <section class="hero-text">
            <p class="subtitle">PERTEMUAN 7 · FRAMEWORK LARAVEL</p>
            <h1>Belajar terstruktur dengan Route, Controller, dan Blade.</h1>

            <p class="description">
                Landing page {{ $siteName }} menggunakan framework Laravel.
                Request masuk melalui route, data disiapkan controller,
                lalu Blade merender HTML.
            </p>

            <div class="buttons">
                <a href="#kursus" class="btn btn-primary">
                    Program Belajar Unggulan
                </a>
                <a href="#alur" class="btn btn-secondary">
                    Lihat Alur MVC
                </a>
            </div>
        </section>

        <section class="hero-image">
            <img
                src="{{ asset('images/hero-kursus.png') }}"
                alt="Ilustrasi belajar pemrograman"
            >
        </section>
    </main>

    <section class="section" id="alur">
        <p class="section-title">MEMAHAMI PROSES</p>
        <h2 class="section-heading">Alur MVC</h2>
        <p class="section-desc">
            Memahami proses halaman web di dalam Laravel.
        </p>

        <div class="flow-grid">
            <article class="flow-card">
                <div class="flow-number">1</div>
                <h3>Browser</h3>
                <p>GET /</p>
            </article>

            <article class="flow-card">
                <div class="flow-number">2</div>
                <h3>Route</h3>
                <p>routes/web.php</p>
            </article>

            <article class="flow-card">
                <div class="flow-number">3</div>
                <h3>Controller</h3>
                <p>HomeController</p>
            </article>

            <article class="flow-card">
                <div class="flow-number">4</div>
                <h3>Blade View</h3>
                <p>home.blade.php</p>
            </article>

            <article class="flow-card">
                <div class="flow-number">5</div>
                <h3>Response</h3>
                <p>HTML ke browser</p>
            </article>
        </div>
    </section>

    <section class="section" id="kursus">
        <p class="section-title">TINGKATKAN KETERAMPILAN</p>
        <h2 class="section-heading">Program Kursus Pilihan</h2>
        <p class="section-desc">
            Mulai belajar pemrograman dari dasar dan kembangkan kemampuanmu.
        </p>

        <div class="course-grid">
            @forelse ($featured as $course)
                <article class="course-card">
                    <span class="badge">{{ $course['code'] }}</span>
                    <h3>{{ $course['name'] }}</h3>
                    <p>{{ $course['description'] }}</p>
                    <a href="#kursus" class="course-link">
                        Mulai Belajar →
                    </a>
                </article>
            @empty
                <p class="empty-message">
                    Belum ada kursus yang tersedia.
                </p>
            @endforelse
        </div>
    </section>

    <footer>
        <p>© 2026 {{ $siteName }}. Belajar, Praktik, Bangun Proyek.</p>
    </footer>

</body>
</html>