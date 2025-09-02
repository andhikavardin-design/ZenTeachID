<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil - ZenTechID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* ==================== Global Styles ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Poppins', sans-serif;
            background-color: #0f0f0f;
            color: white;
        }

        /* ==================== Header & Navigasi ==================== */
        header {
            padding: 10px 40px;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            height: 40px;
        }

        .logo-text {
            font-size: 1.3em;
            font-weight: 100;
            margin-left: 10px;
            color: #00c2ff;
        }
        
        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #00e0ff;
        }
        
        .nav-icon {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-left: 20px;
            font-size: 1.4em;
        }

        .nav-icon:hover {
            color: #00e0ff;
        }

        .nav-icon .fas {
            font-size: 1.2em;
            color: #00e0ff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1a1a1a;
            min-width: 160px;
            border-radius: 5px;
            top: 100%;
            left: 0;
            padding-top: 10px;
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-weight: normal;
        }
        
        .dropdown-content a:hover {
            background-color: #00c2ff;
            color: black;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* ==================== Konten Utama ==================== */
        .container {
            max-width: 900px;
            margin: 80px auto;
            background: rgba(255,255,255,0.04);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #00e0ff;
            font-size: 2em;
        }

        p {
            font-size: 1.1em;
            line-height: 1.8;
            color: #e0e0e0;
        }

        .highlight {
            color: #00c2ff;
            font-weight: bold;
        }

        .logo-section {
            text-align: center;
            margin-top: 40px;
        }

        .logo-section img {
            height: 80px;
            border-radius: 12px;
            margin-top: 10px;
        }

        /* ==================== Link Komentar ==================== */
        .komentar-link {
            margin-top: 50px;
            text-align: center;
            font-size: 15px;
            padding: 12px;
            background: rgba(0, 194, 255, 0.1);
            border-radius: 8px;
        }

        .komentar-link a {
            color: #00e0ff;
            text-decoration: underline;
            font-weight: bold;
        }

        .komentar-link a:hover {
            color: #ffffff;
        }

        /* ==================== Kontak & Sosial Bawah Kiri ==================== */
        .kontak-bottom {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: rgba(0, 0, 0, 0.3);
            padding: 10px 15px;
            border-radius: 10px;
        }

        .kendala-text {
            font-size: 0.9em;
            color: #e0e0e0;
            margin-bottom: 8px;
        }

        .social-links-bottom {
            display: flex;
            gap: 20px;
        }

        .social-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: white;
            font-size: 0.8em;
            transition: color 0.3s;
        }

        .social-item:hover {
            color: #00e0ff;
        }

        .social-item img, 
        .social-item .fab {
            width: 28px;
            height: 28px;
            font-size: 28px;
            margin-bottom: 4px;
            color: white;
            transition: color 0.3s;
        }

        .social-item:hover img,
        .social-item:hover .fab {
            color: #00e0ff;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img">
            <span class="logo-text">ZenTechID</span>
        </div>
       </div>
   <nav>
        <a href="{{ route('admin.dashboard') }}">Beranda</a>
        <div class="dropdown">
            <a href="#">Produk</a>
            <div class="dropdown-content">
                <a href="{{ route('admin.produk.index') }}">Produk</a>
                <a href="{{ route('admin.promosi.index') }}">Promosi</a>
                <a href="{{ route('admin.pemesanan_produk') }}">Pemesanan</a>
            </div>
        </div>
        <a href="{{ route('admin.profil.index') }}">Profil</a>
        <a href="#" class="nav-icon cart-icon"><i class="fas fa-shopping-cart"></i></a>
        <a href="{{ route('admin.foto_profil') }}" class="nav-icon profile-icon"><i class="fas fa-user-circle"></i></a>
    </nav>
</header>

</header>

    </header>
    
    <div class="container">
        <h2>Tentang ZenTechID</h2>
        <p>
            <span class="highlight">ZenTechID</span> adalah platform penjualan resmi untuk berbagai produk teknologi unggulan dari ASUS Indonesia.
            Kami berkomitmen untuk menyediakan laptop, perangkat keras, dan aksesoris terbaik dengan harga kompetitif serta layanan pelanggan terpercaya.
        </p>

        <p>
            Didirikan oleh tim yang berpengalaman di dunia teknologi, ZenTechID hadir untuk memudahkan Anda dalam memilih produk yang sesuai kebutuhan.
            Dengan katalog produk yang lengkap dan sistem checkout yang aman, kami siap menjadi mitra teknologi terbaik Anda.
        </p>

        <p>
            Kami percaya bahwa teknologi seharusnya <span class="highlight">mudah diakses</span>, <span class="highlight">terjangkau</span>, dan <span class="highlight">dapat diandalkan</span>.
            Itulah mengapa kami bekerja keras menjaga kualitas layanan kami — dari pengalaman belanja hingga pengiriman.
        </p>

        <div class="logo-section">
            <p>Didukung oleh:</p>
            <img src="{{ asset('Video/A.jpg') }}" alt="Logo ZenTechID">
        </div>

        <div class="komentar-link">
            Ingin lihat apa yang dikatakan orang lain terhadap aplikasi ini? 
            <a href="{{ route('admin.komentar.index') }}">Silahkan klik di sini</a>
        </div>

        <div class="kontak-bottom">
            <p class="kendala-text">Mengalami kendala? Hubungi kami:</p>
            <div class="social-links-bottom">
                <a href="https://wa.me/+6281234567890" target="_blank" class="social-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                    <span>+6281234567890</span>
                </a>
                <a href="https://www.instagram.com/ZenTeachID" target="_blank" class="social-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
                    <span>ZenTeachID</span>
                </a>
                <a href="https://www.tiktok.com/" target="_blank" class="social-item">
                    <i class="fab fa-tiktok"></i>
                    <span>ZenTeachID</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
