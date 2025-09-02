<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ulasan Pengguna - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #0f0f0f; color: white; min-height: 100vh; margin: 0; }
        header { padding: 10px 40px; background: rgba(0, 0, 0, 0.9); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 40px; }
        .logo-text { font-size: 1.3em; font-weight: 100; margin-left: 10px; color: #00c2ff; }
        nav { display: flex; align-items: center; }
        nav a { margin-left: 20px; text-decoration: none; color: white; font-weight: bold; font-size: 15px; transition: color 0.3s ease; }
        nav a:hover { color: #00e0ff; }
        .cart-link, .profile-link { display: flex; align-items: center; text-decoration: none; color: white; font-weight: bold; margin-left: 20px; }
        .cart-link:hover, .profile-link:hover { color: #00e0ff; }
        .cart-link i { font-size: 20px; color: #00e0ff; }
        .profile-link i { margin-right: 5px; font-size: 30px; color: #00e0ff; }
        .container { max-width: 700px; margin: 40px auto; padding: 20px; }
        .komentar-box { background: rgba(255,255,255,0.05); padding: 15px 20px; border-radius: 10px; margin-bottom: 15px; }
        .nama { font-weight: bold; color: #00c2ff; }
        .bintang { color: gold; margin: 5px 0; }
        .pesan { color: #ccc; }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="{{ asset('Video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img" />
        <span class="logo-text">ZenTechID</span>
    </div>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Beranda</a>
        <a href="{{ route('admin.produk.index') }}">Produk</a>
        <a href="{{ route('admin.profil.index') }}">Profil</a>
        <a href="{{ route('admin.pemesanan_produk') }}" class="cart-link"><i class="fas fa-shopping-cart"></i></a>
        <a href="{{ route('admin.foto_profil') }}" class="profile-link"><i class="fas fa-user-circle"></i></a>
    </nav>
</header>

<div class="container">
    <h2>Ulasan Pengguna</h2>

    @if($komentarData->isEmpty())
        <p>Belum ada komentar.</p>
    @else
        @foreach($komentarData as $komentar)
            <div class="komentar-box">
                <div class="nama">{{ $komentar->username }}</div>
                <div class="bintang">
                    {!! str_repeat("★", $komentar->rating) . str_repeat("☆", 5 - $komentar->rating) !!}
                </div>
                <div class="pesan">{{ $komentar->pesan }}</div>
            </div>
        @endforeach
    @endif
</div>
</body>
</html>
