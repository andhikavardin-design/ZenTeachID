<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Komentar - ZenTechID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* ===== Navbar Styles ===== */
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #0f0f0f;
            color: white;
            min-height: 100vh;
            margin: 0;
        }
        header {
            padding: 10px 40px;
            background: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo-img {
            height: 40px;
        }
        .logo-text {
            font-family: 'Poppins', cursive;
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
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #00e0ff;
        }
        .cart-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-left: 20px;
        }
        .cart-link:hover {
            color: #00e0ff;
        }
        .cart-link i {
            font-size: 20px;
            color: #00e0ff;
        }
        .profile-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-left: 20px;
        }
        .profile-link:hover {
            color: #00e0ff;
        }
        .profile-link i {
            margin-right: 5px;
            font-size: 30px;
            color: #00e0ff;
        }

        /* ===== Komentar Styles ===== */
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
        }
        .komentar-box {
            background: rgba(255,255,255,0.05);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        .nama {
            font-weight: bold;
            color: #00c2ff;
        }
        .bintang {
            color: gold;
            margin: 5px 0;
        }
        .pesan {
            color: #ccc;
        }
        form {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        textarea {
            flex: 1;
            border-radius: 20px;
            padding: 10px;
            border: none;
            resize: none;
            height: 45px;
            font-size: 14px;
        }
        select {
            border-radius: 10px;
            border: none;
            padding: 6px 10px;
            font-size: 14px;
        }
        button {
            background: #00c2ff;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        button:hover {
            background: #00e0ff;
        }
        button svg {
            fill: black;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="{{ asset('video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img" />
        <span class="logo-text">ZenTechID</span>
    </div>
    <nav>
        <a href="{{ route('halaman_utama') }}">Beranda</a>
        <a href="{{ route('produk') }}">Produk</a>
        <a href="{{ route('profil') }}">Profil</a>
        <a href="{{ route('keranjang') }}" class="cart-link"><i class="fas fa-shopping-cart"></i></a>
        <a href="{{ route('foto_profil') }}" class="profile-link"><i class="fas fa-user-circle"></i></a>
    </nav>
</header>

<div class="container">
    <h2>Ulasan</h2>

    @if ($komentarData->isEmpty())
        <p>Belum ada komentar.</p>
    @else
        @foreach ($komentarData as $komentar)
            <div class="komentar-box">
                <div class="nama">{{ $komentar->username }}</div>
                <div class="bintang">{{ str_repeat("★", $komentar->rating) . str_repeat("☆", 5 - $komentar->rating) }}</div>
                <div class="pesan">{{ $komentar->pesan }}</div>
            </div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('komentar_pengguna.store') }}">
        @csrf
        <textarea name="pesan" placeholder="Tulis komentar..." required></textarea>
        <select name="rating" required>
            <option value="">⭐</option>
            <option value="1">★☆☆☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="3">★★★☆☆</option>
            <option value="4">★★★★☆</option>
            <option value="5">★★★★★</option>
        </select>
        <button type="submit" title="Kirim">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="20" width="20" viewBox="0 0 24 24">
                <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </button>
    </form>
</div>
</body>
</html>