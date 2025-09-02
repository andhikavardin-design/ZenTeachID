<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - ZenTechID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ... (CSS Anda di sini) ... */
        body { font-family: 'Segoe UI', sans-serif; color: white; margin: 0; padding: 0; }
        header { position: fixed; top: 0; left: 0; width: 100%; height: 70px; padding: 0 40px; background: #000; display: flex; justify-content: space-between; align-items: center; z-index: 10; box-sizing: border-box; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 45px; }
        .logo-text { font-family: 'Poppins', cursive; font-size: 1.4em; font-weight: 100; margin-left: 12px; color: #00c2ff; letter-spacing: 1px; }
        nav { display: flex; align-items: center; gap: 20px; }
        nav a { text-decoration: none; color: white; font-weight: bold; font-size: 15px; transition: color 0.3s; display: flex; align-items: center; }
        nav a:hover { color: #00e0ff; }
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 160px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); z-index: 1; border-radius: 5px; top: 100%; left: 0; padding-top: 10px; }
        .dropdown-content a { color: white; padding: 12px 16px; text-decoration: none; display: block; text-align: left; font-weight: normal; }
        .dropdown-content a:hover { background-color: #00c2ff; color: black; }
        .dropdown:hover .dropdown-content { display: block; }
        .nav-icon { font-size: 1.4em; }
        .nav-icon .fas { color: #00c2ff; transition: color 0.3s; }
        .nav-icon:hover .fas { color: #00e0ff; }
        .nav-icon.profile-icon { font-size: 1.8em; }
        .nav-icon.profile-icon .fas { font-size: 1.6em; }
        .video-background { position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1; }
        .video-background video { min-width: 100%; min-height: 100%; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); }
        .main-content { position: relative; padding: 80px 40px; max-width: 1200px; margin: 100px auto; text-align: center; background: rgba(0, 0, 0, 0.6); border-radius: 15px; padding-top: 120px; }
        .welcome-section { background: linear-gradient(45deg, #00c2ff, #005a7f); padding: 60px; border-radius: 15px; margin-bottom: 40px; box-shadow: 0 10px 20px rgba(0,0,0,0.4); animation: fadeIn 1s ease-in-out; }
        .welcome-section h1 { font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 3em; margin-bottom: 10px; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .welcome-section p { font-size: 1.2em; color: rgba(255, 255, 255, 0.9); }
        .promotions-preview { display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; }
        .promotion-card { background: rgba(255,255,255,0.05); backdrop-filter: blur(8px); border-radius: 15px; padding: 20px; width: 300px; text-align: left; box-shadow: 0 0 15px rgba(0,0,0,0.3); transition: transform 0.3s ease; }
        .promotion-card:hover { transform: translateY(-10px); }
        .promotion-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
        .promotion-card h3 { font-size: 1.2em; color: #00e0ff; margin-bottom: 10px; }
        .promotion-card p { font-size: 0.9em; color: #ccc; line-height: 1.4; }
        .view-all-btn { display: inline-block; margin-top: 25px; padding: 12px 30px; background-color: #00c2ff; color: black; text-decoration: none; font-weight: bold; border-radius: 25px; transition: background-color 0.3s; }
        .view-all-btn:hover { background-color: #00e0ff; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @media (max-width: 768px) {
            header { padding: 10px 20px; }
            .logo-text { font-size: 1.2em; }
            nav { gap: 10px; }
            nav a { font-size: 14px; }
            .main-content { padding: 40px 20px; margin-top: 80px; }
            .welcome-section { padding: 40px; }
            .welcome-section h1 { font-size: 2em; }
            .welcome-section p { font-size: 1em; }
            .promotions-preview { flex-direction: column; align-items: center; }
            .promotion-card { width: 100%; max-width: 300px; }
        }
    </style>
</head>
<body>

<div class="video-background">
    <video autoplay loop muted>
        <source src="{{ asset('video/v.mp4') }}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
</div>

<header>
    <div class="logo">
        <img src="{{ asset('video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img">
        <span class="logo-text">ZenTechID</span>
    </div>
    
    <nav>
        <a href="{{ route('halaman_utama') }}">Beranda</a>
        <div class="dropdown">
            <a href="#">Produk</a>
            <div class="dropdown-content">
                <a href="{{ url('produk') }}">ASUS</a>
                <a href="{{ url('promosi') }}">Promosi</a>
            </div>
        </div>
        <a href="{{ url('profil') }}">Profil</a>
        <a href="{{ url('keranjang') }}" class="nav-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="{{ url('foto_profil') }}" class="nav-icon profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </nav>
</header>

<div class="main-content">
    <div class="welcome-section">
        <h1>Halo, {{ $nama_pengguna }}!</h1>
        <p>Selamat datang kembali di ZenTechID. Temukan produk teknologi terbaru dan promosi menarik hanya untuk Anda.</p>
    </div>

    <h2>Promosi Terbaru</h2>

    <div class="promotions-preview">
        <div class="promotion-card">
            <img src="{{ asset('Video/k.jpg') }}" alt="Promo Asus Vivobook 14 pro Series">
            <h3>Promo Asus Vivobook 14 pro Series</h3>
            <p>Dapatkan diskon eksklusif untuk setiap pembelian laptop Zenbook terbaru, kinerja luar biasa dengan desain elegan.</p>
        </div>

        <div class="promotion-card">
            <img src="{{ asset('Video/f.jpg') }}" alt="Promo TUF Gaming">
            <h3>Diskon TUF Gaming</h3>
            <p>Raih pengalaman gaming tanpa batas dengan seri TUF Gaming. Performa tinggi, harga terbaik.</p>
        </div>
    </div>

    <a href="{{ url('promosi') }}" class="view-all-btn">Lihat Semua Promosi</a>
</div>

</body>
</html>