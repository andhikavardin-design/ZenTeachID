<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenTechID | Jual Beli Produk Elektronik Modern</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ==================== Global Styles & Animations ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #00c2ff;
            --secondary-color: #00e0ff;
            --background-dark: #0f0f0f;
            --background-light: #1a1a1a;
            --text-color: #e0e0e0;
            --text-highlight: #ffffff;
            --button-border-radius: 8px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body, html {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-dark);
            color: var(--text-color);
            line-height: 1.6;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        
        /* ==================== Header & Navigasi ==================== */
        header {
            padding: 15px 40px;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            height: 40px;
        }

        .logo-text {
            font-size: 1.5em;
            font-weight: 600;
            margin-left: 10px;
            color: var(--primary-color);
            letter-spacing: 1px;
        }
        .nav-buttons {
            display: flex;
            gap: 20px;
        }

        .nav-button {
            text-decoration: none;
            color: var(--text-highlight);
            padding: 10px 25px;
            border-radius: var(--button-border-radius);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login {
            border: 2px solid var(--primary-color);
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            color: var(--background-dark);
            box-shadow: 0 0 15px rgba(0, 194, 255, 0.4);
        }

        .btn-register {
            background-color: var(--primary-color);
            color: var(--background-dark);
        }

        .btn-register:hover {
            background-color: var(--secondary-color);
            box-shadow: 0 0 15px rgba(0, 194, 255, 0.6);
        }

        /* ==================== Hero Section ==================== */
        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-image: url('{{ asset('Video/asus-rog-strix-scar.jpg') }}');
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
            padding: 60px;
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            font-size: 4em;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }

        .tagline {
            font-size: 1.5em;
            font-weight: 300;
            color: var(--text-color);
            margin-bottom: 40px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 25px;
        }

        .cta-button {
            text-decoration: none;
            padding: 15px 40px;
            border-radius: var(--button-border-radius);
            font-size: 1.1em;
            font-weight: 600;
            transition: transform 0.3s, background-color 0.3s, box-shadow 0.3s;
        }
        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 194, 255, 0.3);
        }
        .btn-jelajahi {
            background-color: var(--primary-color);
            color: var(--background-dark);
            border: 2px solid var(--primary-color);
        }
        .btn-jelajahi:hover { background-color: var(--secondary-color); border-color: var(--secondary-color); }
        .btn-login-hero {
            background-color: transparent;
            color: var(--text-highlight);
            border: 2px solid var(--text-highlight);
        }
        .btn-login-hero:hover { background-color: var(--text-highlight); color: var(--background-dark); }
        
        /* ==================== Section Keunggulan ==================== */
        .section-wrapper {
            padding: 100px 40px;
        }

        .section-title {
            text-align: center;
            font-size: 2.8em;
            color: var(--primary-color);
            margin-bottom: 20px;
            font-weight: 700;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2em;
            color: var(--text-color);
            max-width: 800px;
            margin: auto auto 60px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .feature-card {
            background: var(--background-light);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 194, 255, 0.2);
        }

        .feature-card i {
            font-size: 3.5em;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(0, 194, 255, 0.5);
        }

        .feature-card h3 {
            font-size: 1.6em;
            margin-bottom: 15px;
            color: var(--text-highlight);
        }

        .feature-card p {
            font-size: 1em;
            color: var(--text-color);
        }

        /* ==================== Section Kategori Produk ==================== */
        .product-categories {
            background-color: var(--background-dark);
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .category-card {
            position: relative;
            height: 350px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            transition: transform 0.4s, box-shadow 0.4s;
        }
        .category-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(0, 194, 255, 0.3);
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s;
        }
        .category-card:hover img {
            transform: scale(1.1);
        }
        .category-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
            display: flex;
            align-items: flex-end;
            padding: 30px;
        }
        .category-card h3 {
            font-size: 2em;
            color: var(--text-highlight);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            margin: 0;
        }

        /* ==================== Testimonial Section ==================== */
        .testimonial-section {
            background-color: var(--background-light);
        }

        .testimonial-slider {
            max-width: 900px;
            margin: auto;
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding: 20px;
            gap: 20px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .testimonial-slider::-webkit-scrollbar { display: none; }

        .testimonial-card {
            flex: 0 0 100%;
            scroll-snap-align: center;
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .testimonial-card p {
            font-size: 1.1em;
            font-style: italic;
            color: var(--text-color);
            margin-bottom: 20px;
        }

        .testimonial-card .author {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.2em;
        }

        /* ==================== Footer ==================== */
        footer {
            padding: 25px 40px;
            background: rgba(0, 0, 0, 0.9);
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('Video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img">
        <span class="logo-text">ZenTechID</span>
    </div>
    <div class="nav-buttons">
        <a href="{{ route('login') }}" class="nav-button btn-login">Login</a>
        <a href="{{ route('register') }}" class="nav-button btn-register">Daftar</a>
    </div>
</header>

<main>
    <div class="hero-section" id="home">
        <div class="hero-content">
            <h1>Platform ASUS Terlengkap</h1>
            <p class="tagline">Temukan laptop, PC gaming, dan aksesoris terbaik dengan harga kompetitif dan layanan terpercaya. #ZenTechID</p>
            <div class="cta-buttons">
                <a href="#products" class="cta-button btn-jelajahi">Jelajahi Produk</a>
                <a href="{{ route('login') }}" class="cta-button btn-login-hero">Sudah Punya Akun?</a>
            </div>
        </div>
    </div>

    <section class="section-wrapper" id="features">
        <h2 class="section-title">Mengapa Memilih ZenTechID?</h2>
        <p class="section-subtitle">Kami berkomitmen untuk memberikan pengalaman belanja terbaik dengan layanan yang dapat Anda andalkan.</p>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-check-circle"></i>
                <h3>Produk Original ASUS</h3>
                <p>Jaminan produk asli dengan garansi resmi ASUS Indonesia.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shipping-fast"></i>
                <h3>Pengiriman Seluruh Indonesia</h3>
                <p>Layanan pengiriman cepat dan aman ke seluruh penjuru nusantara.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-handshake"></i>
                <h3>Transaksi Aman & Mudah</h3>
                <p>Berbagai pilihan metode pembayaran yang aman dan terenkripsi.</p>
            </div>
        </div>
    </section>
    
    <section class="section-wrapper product-categories" id="products">
        <h2 class="section-title">Laptop Unggulan</h2>
        <p class="section-subtitle">Temukan laptop ASUS terbaik yang sesuai dengan kebutuhan Anda.</p>
        <div class="category-grid">
            
            <a href="{{ route('login') }}" class="category-card">
                <img src="{{ asset('Video/e.jpg') }}" alt="ASUS ROG Strix SCAR 17 G733P">
                <div class="category-card-overlay">
                    <h3>ASUS ROG Strix SCAR 17 G733P</h3>
                </div>
            </a>

            <a href="{{ route('login') }}" class="category-card">
                <img src="{{ asset('Video/b.jpg') }}" alt="ASUS Zenbook 14 OLED UX3402">
                <div class="category-card-overlay">
                    <h3>ASUS Zenbook 14 OLED UX3402</h3>
                </div>
            </a>

            <a href="{{ route('login') }}" class="category-card">
                <img src="{{ asset('Video/d.jpg') }}" alt="ASUS Vivobook Pro 15 OLED M6500">
                <div class="category-card-overlay">
                    <h3>ASUS Vivobook Pro 15 OLED M6500</h3>
                </div>
            </a>

        </div>
    </section>

    <section class="section-wrapper testimonial-section" id="testimonials">
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <p class="section-subtitle">Simak pengalaman nyata dari para pelanggan setia kami.</p>
        <div class="testimonial-slider">
            <div class="testimonial-card">
                <p>"Pelayanan cepat, produknya original. Benar-benar platform terpercaya untuk beli produk ASUS. Sangat direkomendasikan!"</p>
                <div class="author">- Dika nih boss</div>
            </div>
            <div class="testimonial-card">
                <p>"Tampilan webnya profesional, mudah dicari, dan proses checkout-nya lancar. Saya pasti akan belanja lagi di sini."</p>
                <div class="author">- Ikhsan</div>
            </div>
            <div class="testimonial-card">
                <p>"Sangat terbantu dengan tim support yang responsif. Produk sampai dengan aman dan sesuai deskripsi."</p>
                <div class="author">- Erlina Anjayani</div>
            </div>
        </div>
    </section>
</main>

<footer>
    &copy; 2025 ZenTechID. All rights reserved.
</footer>

</body>
</html>