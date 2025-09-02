<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promosi - ZenTechID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
            background: #1c1c1c;
            line-height: 1.6;
        }

        header {
            background-color: #000;
            color: white;
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
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
            margin-right: 10px;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #00e0ff;
        }

        nav {
            display: flex;
            gap: 20px;
            align-items: center; 
        }

        nav a, .dropdown a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav a:hover, .dropdown a:hover {
            color: #00e0ff;
        }
        
        .nav-icon.cart-icon {
            position: relative;
            margin-right: 5px; /* Menambahkan jarak di sisi kanan */
        }
        
        .nav-icon.cart-icon .fa-shopping-cart {
            color: #00e0ff;
            font-size: 1.3rem;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #ff0000;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .nav-icon.profile-icon .fa-user-circle {
            color: #00e0ff;
            font-size: 2.2rem;
            transition: color 0.3s;
             margin-right: 30px;
        }

        .nav-icon.profile-icon .fa-user-circle:hover {
            color: #fff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #00e0ff;
            color: #1c1c1c;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .nav-icon {
            font-size: 1.2rem;
        }

        .main-container {
            padding-top: 100px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px 20px 20px;
        }

        .content-section {
            background-color: #2a2a2a;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        .content-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #00e0ff;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .search-bar-container {
            text-align: center;
            margin-bottom: 30px;
        }
        
        #searchInput {
            width: 80%;
            max-width: 400px;
            padding: 12px 20px;
            border-radius: 25px;
            border: 2px solid #00e0ff;
            background: #1c1c1c;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s;
        }

        #searchInput:focus {
            outline: none;
            box-shadow: 0 0 10px #00e0ff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            justify-content: center;
        }

        .card {
            background: #2a2a2a;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 224, 255, 0.2);
        }

        .card-image-wrapper {
            background-color: #1c1c1c;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            width: 90%;
            max-width: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .card img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: contain;
            transition: transform 0.3s;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 1.3rem;
            color: #00e0ff;
            margin-bottom: 10px;
            text-align: center;
        }

        .card-description-container {
            position: relative;
            height: 70px;
            overflow: hidden;
            margin-bottom: 15px;
            padding: 0 10px;
            text-align: center;
        }
        
        .card-description-container::-webkit-scrollbar {
            width: 8px;
        }

        .card-description-container::-webkit-scrollbar-track {
            background: #333;
            border-radius: 10px;
        }

        .card-description-container::-webkit-scrollbar-thumb {
            background: #00e0ff;
            border-radius: 10px;
            border: 2px solid #333;
        }

        .card-description-container::-webkit-scrollbar-thumb:hover {
            background: #00a0b0;
        }


        .card-description {
            font-size: 0.9rem;
            color: #ccc;
            line-height: 1.4;
            margin: 0;
        }

        .card-price-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #333;
            width: 100%;
        }

        .card-old-price {
            text-decoration: line-through;
            color: #aaa;
            font-size: 0.8rem;
            margin-bottom: 5px;
        }

        .card-new-price {
            font-size: 1.4rem;
            color: #fff;
            font-weight: 600;
        }
        
        .no-result {
            grid-column: 1 / -1;
            text-align: center;
            color: #ccc;
            padding: 50px;
            font-size: 1.2rem;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
            position: relative;
            animation: slideIn 0.5s;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .buy-modal-content {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-close {
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: #00e0ff;
        }

        .modal-body {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .modal-image {
            flex: 1;
            min-width: 250px;
        }

        .modal-image img {
            width: 100%;
            border-radius: 10px;
        }

        .modal-details {
            flex: 2;
            min-width: 300px;
        }

        .modal-details h3 {
            font-size: 2rem;
            color: #00e0ff;
            margin-top: 0;
        }

        .modal-details p {
            margin-bottom: 15px;
        }

        .modal-details .price {
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 20px;
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .modal-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .modal-btn:hover {
            transform: translateY(-3px);
        }

        .add-to-cart-btn {
            background-color: #00e0ff;
            color: #1c1c1c;
        }

        .buy-now-btn {
            background-color: #fff;
            color: #1c1c1c;
        }
        
        .comment-section {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }

        .comment-section h4 {
            font-size: 1.5rem;
            color: #00e0ff;
            margin-bottom: 15px;
        }
        
        .comment-as {
            color: #bbb;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .comment-as strong {
            color: #00e0ff;
        }

        .rating-container {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-container input[type="radio"] {
            display: none;
        }

        .rating-container label {
            font-size: 1.5rem;
            color: #555;
            cursor: pointer;
            transition: color 0.2s;
        }

        .rating-container input[type="radio"]:checked ~ label,
        .rating-container label:hover,
        .rating-container label:hover ~ label {
            color: #ffc107;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #1c1c1c;
            color: #fff;
            resize: vertical;
            margin-bottom: 10px;
        }

        .submit-comment-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #00e0ff;
            color: #1c1c1c;
            font-weight: 600;
            cursor: pointer;
        }

        .comment-list {
            margin-top: 20px;
            border-top: 1px solid #555;
            padding-top: 20px;
        }

        .comment-item {
            background-color: #444;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .comment-item .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: #ddd;
            margin-bottom: 5px;
        }

        .comment-item .user-info b {
            color: #00e0ff;
        }

        .comment-item .rating {
            color: #ffc107;
        }

        .comment-item .user-comment {
            font-size: 1rem;
            color: #ccc;
        }
        
        .buy-modal-content, .confirm-modal-content, .success-modal-content {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.7);
            position: relative;
        }
        
        .buy-modal-content h3, .confirm-modal-content h3, .success-modal-content h3 {
            text-align: center;
            color: #00e0ff;
            margin-top: 0;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .buy-modal-content form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .buy-modal-content label {
            color: #ccc;
            font-size: 0.9rem;
        }

        .buy-modal-content input[type="text"], .buy-modal-content input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #1c1c1c;
            color: #fff;
            font-size: 1rem;
        }
        
        .product-info-modal {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            background-color: #333;
            padding: 15px;
            border-radius: 10px;
        }
        
        .product-info-modal img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-info-modal h4 {
            margin: 0;
            font-size: 1.1rem;
            color: #fff;
        }

        .product-info-modal p {
            margin: 5px 0 0;
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .alamat-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .alamat-group input {
            flex-grow: 1;
        }

        .search-map-btn {
            background-color: #00e0ff;
            color: #1c1c1c;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-map-btn:hover {
            background-color: #00a0b0;
        }
        
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .payment-btn {
            background-color: #1c1c1c;
            border: 2px solid #555;
            color: #fff;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }
        
        .payment-btn.selected, .payment-btn:hover {
            border-color: #00e0ff;
            box-shadow: 0 0 10px rgba(0, 224, 255, 0.5);
        }

        .payment-btn img {
            height: 24px;
        }

        .submit-btn {
            background-color: #00e0ff;
            color: #1c1c1c;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, opacity 0.3s;
            margin-top: 20px;
        }

        .submit-btn:disabled {
            background-color: #555;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .confirm-modal-content p, .success-modal-content p {
            color: #ccc;
            margin-bottom: 10px;
        }

        .confirm-modal-content strong, .success-modal-content strong {
            color: #fff;
        }
        
        .confirm-modal-content .confirm-item, .success-modal-content .success-summary-item {
            background-color: #333;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .confirm-modal-content .confirm-item p, .success-modal-content .success-summary-item p {
            margin: 5px 0;
        }

        .confirm-modal-content .total-price, .success-modal-content .total-price {
            font-size: 1.5rem;
            color: #00e0ff;
            font-weight: 600;
            text-align: right;
            margin-top: 20px;
        }

        .final-confirm-btn, .success-close-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #00e0ff;
            color: #1c1c1c;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .final-confirm-btn:hover, .success-close-btn:hover {
            background-color: #00a0b0;
        }

        .success-checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #4BB71B;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #4BB71B;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            margin: 0 auto 20px;
            background-color: #1c1c1c;
        }

        .success-checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4BB71B;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .success-checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) .8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4BB71B;
            }
        }

        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        
        @media (max-width: 768px) {
            .modal-body {
                flex-direction: column;
            }

            .modal-details {
                min-width: unset;
                text-align: center;
            }

            .modal-details img {
                margin: 0 auto;
            }
             .product-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>

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
        <a href="{{ url('keranjang') }}" class="nav-icon cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count" class="cart-count">0</span>
        </a>
        <a href="{{ url('foto_profil') }}" class="nav-icon profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </nav>
</header>

<div class="main-container">
    <div class="content-section">
        <h2>Promosi Terbaru</h2>
        <div class="search-bar-container">
            <input type="text" id="searchInput" placeholder="Cari produk promosi...">
        </div>
        <div id="productGrid" class="product-grid">
        </div>
    </div>
</div>

<div id="descriptionModal" class="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeDescriptionModal()">×</span>
        <div class="modal-body">
            <div class="modal-image">
                <img id="descImage" src="" alt="Produk">
            </div>
            <div class="modal-details">
                <h3 id="descName"></h3>
                <p id="descDescription"></p>
                <p class="price" id="descPrice"></p>
                <div class="modal-actions">
                    <button class="modal-btn add-to-cart-btn" id="modalAddCartBtn">Tambah ke Keranjang</button>
                    <button class="modal-btn buy-now-btn" id="modalBuyNowBtn">Beli Sekarang</button>
                </div>
            </div>
        </div>
        
        <div class="comment-section">
            <h4>Komentar & Rating</h4>
            <p class="comment-as">Komentar sebagai: <strong><span id="displayUsername"></span></strong></p>
            <div class="rating-container">
                <input type="radio" id="star5" name="rating" value="5" /><label for="star5">★</label>
                <input type="radio" id="star4" name="rating" value="4" /><label for="star4">★</label>
                <input type="radio" id="star3" name="rating" value="3" /><label for="star3">★</label>
                <input type="radio" id="star2" name="rating" value="2" /><label for="star2">★</label>
                <input type="radio" id="star1" name="rating" value="1" /><label for="star1">★</label>
            </div>
            <textarea id="commentText" placeholder="Tulis komentar Anda..."></textarea>
            <button class="submit-comment-btn" onclick="submitComment()">Kirim Komentar</button>
            
            <div id="commentList" class="comment-list">
                </div>
        </div>
    </div>
</div>

<div id="buyModal" class="modal">
    <div class="modal-content buy-modal-content">
        <span class="modal-close" onclick="closeBuyModal()">×</span>
        <h3>Formulir Pembelian</h3>
        
        <div class="product-info-modal">
            <img id="productImageModal" src="" alt="Gambar Produk">
            <div>
                <h4 id="productTitleModal"></h4>
                <p id="productPriceModal"></p>
            </div>
        </div>
        
        <form id="buyForm">
            <input type="hidden" id="buyProductId">
            <input type="hidden" id="buyQuantity">
            
            <label for="namaPembeli">Nama Lengkap:</label>
            <input type="text" id="namaPembeli" name="namaPembeli" required>

            <label for="nomorTelepon">Nomor Telepon:</label>
            <input type="tel" id="nomorTelepon" name="nomorTelepon" required>

            <label for="alamat">Alamat Pengiriman:</label>
            <div class="alamat-group">
                <input type="text" id="alamat" name="alamat" required>
                <button type="button" class="search-map-btn" onclick="searchAddress()"><i class="fas fa-search-location"></i> Cari di Maps</button>
            </div>

            <label>Metode Pembayaran:</label>
            <div class="payment-methods">
                <button type="button" class="payment-btn" data-method="dana">
                    <img src="{{ asset('Video/Dana.jpg') }}" alt="Logo DANA" style="height:24px;">
                    <span>DANA</span>
                </button>
                <button type="button" class="payment-btn" data-method="cod">
                    <i class="fas fa-truck"></i>
                    <span>Bayar di Tempat</span>
                </button>
            </div>

            <input type="hidden" id="metodePembayaran" name="metodePembayaran" required>

            <button type="submit" class="submit-btn" disabled>Bayar Sekarang</button>
        </form>
    </div>
</div>

<div id="confirmModal" class="modal">
    <div class="modal-content confirm-modal-content">
        <span class="modal-close" onclick="closeConfirmModal()">×</span>
        <h3>Konfirmasi Pembelian</h3>
        <div class="confirm-details">
            <p><strong>Nama:</strong> <span id="confirmNama"></span></p>
            <p><strong>Nomor Telepon:</strong> <span id="confirmNomorTelepon"></span></p>
            <p><strong>Alamat:</strong> <span id="confirmAlamat"></span></p>
            <p><strong>Metode Pembayaran:</strong> <span id="confirmMetodeBayar"></span></p>
            <h4>Ringkasan Pesanan:</h4>
            <div id="confirmProductSummary"></div>
            <p><strong>Total Harga:</strong> <span id="confirmTotalHarga"></span></p>
        </div>
        <button class="final-confirm-btn" onclick="processPayment()">Konfirmasi Pembelian</button>
    </div>
</div>

<div id="successModal" class="modal">
    <div class="modal-content success-modal-content">
        <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="success-checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="success-checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        <h3>Pembayaran Berhasil!</h3>
        <p>Pesanan Anda sedang diproses. Terima kasih telah berbelanja.</p>
        <div class="success-summary">
            <p><strong>Nama:</strong> <span id="successNama"></span></p>
            <p><strong>Nomor Telepon:</strong> <span id="successNomorTelepon"></span></p>
            <p><strong>Alamat:</strong> <span id="successAlamat"></span></p>
            <p><strong>Metode Pembayaran:</strong> <span id="successMetodeBayar"></span></p>
            <h4>Ringkasan Pesanan:</h4>
            <div id="successProductSummary"></div>
            <p><strong>Total Pembayaran:</strong> <span id="successTotalHarga"></span></p>
        </div>
        <button class="success-close-btn" onclick="closeSuccessModal()">Selesai</button>
    </div>
</div>

<script>
    const initialProducts = [
        // Ganti nama variabel untuk konsistensi, meskipun namanya 'products'
        // di sini, kita akan menyimpannya dengan kunci 'promotions'
        {
            id: '1',
            name: 'ASUS ROG Zephyrus G14',
            price: 25000000,
            oldPrice: 28000000,
            description: 'Laptop gaming ultra-portabel dengan performa tinggi. Cocok untuk gamer dan kreator konten yang sering bepergian.',
            image: 'video/A.jpg',
            stock: 10
        },
        {
            id: '2',
            name: 'ASUS TUF Gaming A15',
            price: 15500000,
            oldPrice: 17000000,
            description: 'Laptop gaming tangguh dengan daya tahan baterai luar biasa dan harga yang terjangkau. Ideal untuk gaming kasual.',
            image: 'video/B.jpg',
            stock: 15
        },
        {
            id: '3',
            name: 'ASUS Zenbook 14X OLED',
            price: 19800000,
            oldPrice: 21500000,
            description: 'Laptop premium dengan layar OLED yang memukau. Desain tipis dan ringan, sempurna untuk profesional.',
            image: 'video/C.jpg',
            stock: 5
        },
        {
            id: '4',
            name: 'ASUS Vivobook Pro 15',
            price: 13900000,
            oldPrice: 15000000,
            description: 'Laptop andal untuk produktivitas sehari-hari dan hiburan, dilengkapi layar NanoEdge yang imersif.',
            image: 'video/D.jpg',
            stock: 20
        },
        {
            id: '5',
            name: 'ASUS ROG Strix',
            price: 15000000,
            oldPrice: 16500000,
            description: 'Laptop gaming ASUS ROG Strix menawarkan performa maksimal untuk pengalaman bermain game.',
            image: 'http://googleusercontent.com/file_content/0',
            stock: 8
        },
        {
            id: '6',
            name: 'ASUS ZenBook',
            price: 12500000,
            oldPrice: 14000000,
            description: 'ASUS ZenBook adalah laptop ultra-portabel yang stylish dan bertenaga, ideal untuk produktivitas.',
            image: 'http://googleusercontent.com/file_content/0',
            stock: 12
        }
    ];

    let products = []; // Variabel ini sekarang akan menampung data promosi
    let currentProduct = null;
    let currentOrderData = {};

    function getCurrentUser() {
        const username = "{{ auth()->user()->username ?? 'Pengguna Anonim' }}";
        return username;
    }

    function displayUsername() {
        const username = getCurrentUser();
        const usernameElements = document.querySelectorAll('#displayUsername');
        usernameElements.forEach(element => {
            element.innerText = username;
        });
    }

    function loadCart() {
        try {
            const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
            return cart;
        } catch (e) {
            console.error("Gagal memuat keranjang dari localStorage", e);
            return [];
        }
    }

    function saveCart(cart) {
        try {
            localStorage.setItem('cartItems', JSON.stringify(cart));
            updateCartCount();
        } catch (e) {
            console.error("Gagal menyimpan keranjang ke localStorage", e);
        }
    }

    function updateCartCount() {
        const cart = loadCart();
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.getElementById('cart-count').innerText = count;
    }

    function addToCart(productId) {
        const product = products.find(p => p.id === productId.toString());
        if (!product) {
            alert('Produk tidak ditemukan.');
            return;
        }

        let cart = loadCart();
        const existingItem = cart.find(item => item.id === productId.toString());

        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({
                id: product.id,
                title: product.name,
                price: product.price,
                quantity: 1,
                image: product.image
            });
        }
        
        saveCart(cart);
        alert('Produk berhasil ditambahkan ke keranjang!');
        closeDescriptionModal();
    }
    
    function showBuyForm(id, quantity = 1) {
        const product = products.find(p => p.id === id.toString());
        if (!product) {
            alert('Produk tidak ditemukan.');
            return;
        }

        const modalImage = document.getElementById('productImageModal');
        const modalTitle = document.getElementById('productTitleModal');
        const modalPrice = document.getElementById('productPriceModal');
        
        const imagePath = product.image.startsWith("data:image") ? product.image : product.image;
        const fallbackImage = 'https://via.placeholder.com/80/1c1c1c/999999?text=Tidak+Ada+Gambar';
        modalImage.src = imagePath;
        modalImage.onerror = () => modalImage.src = fallbackImage;

        modalTitle.innerText = product.name;
        modalPrice.innerText = formatRupiah(product.price * quantity);

        document.getElementById('buyProductId').value = product.id;
        document.getElementById('buyQuantity').value = quantity;
        
        document.getElementById('buyForm').reset();
        document.querySelectorAll('.payment-btn').forEach(btn => btn.classList.remove('selected'));
        document.getElementById('metodePembayaran').value = '';
        document.getElementById('buyForm').querySelector('.submit-btn').disabled = true;

        closeDescriptionModal();
        document.getElementById('buyModal').style.display = 'flex';
    }

    function closeBuyModal() {
        document.getElementById('buyModal').style.display = 'none';
    }

    function closeConfirmModal() {
        document.getElementById('confirmModal').style.display = 'none';
    }

    function closeSuccessModal() {
        document.getElementById('successModal').style.display = 'none';
    }

    function processPayment() {
        const orderData = currentOrderData;
        const paymentMethod = orderData.customer.payment_method;

        if (paymentMethod === 'dana') {
            window.open('https://www.dana.id/', '_blank');
        }

        let orders = JSON.parse(localStorage.getItem('adminOrders')) || [];
        
        const newOrder = {
            id: new Date().getTime(),
            nama: orderData.customer.name,
            nomor_telepon: orderData.customer.phone,
            alamat: orderData.customer.address,
            metode_pembayaran: orderData.customer.payment_method,
            total: orderData.item.price * orderData.item.quantity,
            tanggal: new Date(),
            items: [orderData.item]
        };
        
        orders.push(newOrder);
        localStorage.setItem('adminOrders', JSON.stringify(orders));

        // Mengubah kunci 'products' menjadi 'promotions' saat memperbarui stok
        let updatedPromotions = JSON.parse(localStorage.getItem('promotions')) || [];
        const boughtProductIndex = updatedPromotions.findIndex(p => p.id === orderData.item.id);
        if (boughtProductIndex > -1) {
            updatedPromotions[boughtProductIndex].stock -= newOrder.items[0].quantity;
        }
        localStorage.setItem('promotions', JSON.stringify(updatedPromotions));

        closeConfirmModal();
        showSuccessModal(orderData);
    }
    
    function showSuccessModal(orderData) {
        const modal = document.getElementById('successModal');
        const item = orderData.item;
        const customer = orderData.customer;

        document.getElementById('successNama').innerText = customer.name;
        document.getElementById('successNomorTelepon').innerText = customer.phone;
        document.getElementById('successAlamat').innerText = customer.address;
        
        const metodePembayaran = customer.payment_method;
        if (metodePembayaran === 'dana') {
            document.getElementById('successMetodeBayar').innerHTML = 
                '<a href="https://www.dana.id/" target="_blank">Dana</a>';
        } else {
            document.getElementById('successMetodeBayar').innerText = metodePembayaran.toUpperCase();
        }
        
        const successProductSummary = document.getElementById('successProductSummary');
        successProductSummary.innerHTML = `
            <div class="success-summary-item">
                <p><strong>Produk:</strong> <span>${item.title}</span></p>
                <p><strong>Jumlah:</strong> <span>${item.quantity}</span></p>
            </div>
        `;
        document.getElementById('successTotalHarga').innerText = formatRupiah(item.price * item.quantity);
        
        modal.style.display = 'flex';
    }

    function loadProducts() { // Fungsi ini akan memuat data promosi
        try {
            const storedPromotions = localStorage.getItem('promotions');
            if (storedPromotions) {
                products = JSON.parse(storedPromotions);
            } else {
                products = initialProducts;
                savePromotions(); // Simpan data awal dengan kunci 'promotions'
            }
        } catch (e) {
            console.error("Gagal memuat promosi dari localStorage", e);
            products = initialProducts;
        }
    }

    function savePromotions() { // Fungsi baru untuk menyimpan data promosi
        try {
            localStorage.setItem('promotions', JSON.stringify(products));
        } catch (e) {
            console.error("Gagal menyimpan promosi ke localStorage", e);
        }
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function formatRupiah(number) {
        return `Rp ${number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
    }

    function loadComments(productName) {
        try {
            const stored = JSON.parse(localStorage.getItem('comments')) || {};
            return stored[productName] || [];
        } catch (e) {
            console.error("Gagal memuat komentar", e);
            return [];
        }
    }

    function saveComment(productName, comment) {
        try {
            const stored = JSON.parse(localStorage.getItem('comments')) || {};
            if (!stored[productName]) {
                stored[productName] = [];
            }
            stored[productName].push(comment);
            localStorage.setItem('comments', JSON.stringify(stored));
        } catch (e) {
            console.error("Gagal menyimpan komentar", e);
        }
    }

    function renderProducts(filteredProducts = products) {
        const grid = document.getElementById('productGrid');
        grid.innerHTML = '';
        if (filteredProducts.length === 0) {
            grid.innerHTML = '<div class="no-result">Produk tidak ditemukan.</div>';
        } else {
            filteredProducts.forEach(item => {
                let imgSrc = item.image.startsWith("data:image") ? item.image : item.image;
                const card = document.createElement('div');
                card.className = 'card';
                
                let priceHTML = `<div class="card-price-container">
                                     ${item.oldPrice && item.oldPrice > item.price ? `<p class="card-old-price">Rp ${numberWithCommas(item.oldPrice)}</p>` : ''}
                                     <p class="card-new-price">Rp ${numberWithCommas(item.price)}</p>
                                     </div>`;
                
                card.innerHTML = `
                    <div class="card-image-wrapper">
                        <img src="${imgSrc}" alt="${item.name}" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                    </div>
                    <h3 class="card-title">${item.name}</h3>
                    <div class="card-description-container">
                        <p class="card-description">${item.description}</p>
                    </div>
                    ${priceHTML}
                `;
                card.onclick = () => showDescriptionModal(item);
                grid.appendChild(card);
            });
        }
    }

    function showDescriptionModal(product) {
        currentProduct = product;
        let imgSrc = product.image.startsWith("data:image") ? product.image : product.image;
        document.getElementById('descImage').src = imgSrc;
        document.getElementById('descName').innerText = product.name;
        
        let priceText = `Rp ${numberWithCommas(product.price)}`;
        if (product.oldPrice && product.oldPrice > product.price) {
            priceText = `Rp ${numberWithCommas(product.price)} (Harga Normal: Rp ${numberWithCommas(product.oldPrice)})`;
        }
        document.getElementById('descPrice').innerText = priceText;
        
        document.getElementById('descDescription').innerText = product.description;
        
        document.getElementById('modalAddCartBtn').dataset.productId = product.id;
        document.getElementById('modalBuyNowBtn').dataset.productId = product.id;
        
        renderComments(product.name);
        document.getElementById('descriptionModal').style.display = 'flex';
    }

    function closeDescriptionModal(){
        document.getElementById('descriptionModal').style.display='none';
    }

    function renderComments(productName) {
        const comments = loadComments(productName);
        const commentList = document.getElementById('commentList');
        commentList.innerHTML = comments.length === 0 ? '<div>Belum ada komentar.</div>' : '';
        comments.forEach(c => {
            const div = document.createElement('div');
            div.className = 'comment-item';
            div.innerHTML = `<p class="user-info"><b>${c.username}</b> <span class="rating">${'★'.repeat(c.rating)}</span></p><p class="user-comment">${c.komentar}</p>`;
            commentList.appendChild(div);
        });
    }

    function submitComment() {
        const commentText = document.getElementById('commentText').value;
        const rating = document.querySelector('input[name="rating"]:checked');
        
        if (!commentText || !rating) {
            alert('Mohon isi komentar dan berikan rating.');
            return;
        }

        const newComment = {
            username: getCurrentUser(),
            komentar: commentText,
            rating: parseInt(rating.value)
        };
        
        saveComment(currentProduct.name, newComment);
        renderComments(currentProduct.name);
        
        document.getElementById('commentText').value = '';
        if (rating) {
            rating.checked = false;
        }
        alert('Komentar berhasil dikirim!');
    }

    function filterProducts() {
        const key = document.getElementById('searchInput').value.toLowerCase();
        renderProducts(products.filter(p => p.name.toLowerCase().includes(key)));
    }

    function selectPaymentMethod(event) {
        const buttons = document.querySelectorAll('.payment-btn');
        buttons.forEach(btn => btn.classList.remove('selected'));
        
        event.currentTarget.classList.add('selected');

        const selectedMethod = event.currentTarget.dataset.method;
        document.getElementById('metodePembayaran').value = selectedMethod;

        document.getElementById('buyForm').querySelector('.submit-btn').disabled = false;
    }

    function searchAddress() {
        const address = document.getElementById('alamat').value;
        if (address.trim() !== '') {
            const encodedAddress = encodeURIComponent(address);
            const mapsUrl = `https://www.google.com/maps/search/?api=1&query=${encodedAddress}`;
            window.open(mapsUrl, '_blank');
        } else {
            alert('Mohon masukkan alamat terlebih dahulu.');
        }
    }
    
    document.addEventListener('DOMContentLoaded', () => {
        loadProducts(); // Memuat data promosi
        renderProducts();
        updateCartCount();
        displayUsername();

        document.getElementById('searchInput').addEventListener('input', filterProducts);
        document.getElementById('modalAddCartBtn').addEventListener('click', function() {
            addToCart(this.dataset.productId);
        });
        document.getElementById('modalBuyNowBtn').addEventListener('click', function() {
            showBuyForm(this.dataset.productId);
        });

        document.getElementById('buyForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const productId = document.getElementById('buyProductId').value;
            const namaPembeli = document.getElementById('namaPembeli').value;
            const nomorTelepon = document.getElementById('nomorTelepon').value;
            const alamat = document.getElementById('alamat').value;
            const metodePembayaran = document.getElementById('metodePembayaran').value;
            
            const productToBuy = products.find(p => p.id === productId);

            if (!productToBuy) {
                alert('Produk tidak ditemukan.');
                return;
            }
            
            currentOrderData = {
                item: {
                    id: productToBuy.id,
                    title: productToBuy.name,
                    price: productToBuy.price,
                    quantity: 1,
                    image: productToBuy.image
                },
                customer: {
                    name: namaPembeli,
                    phone: nomorTelepon,
                    address: alamat,
                    payment_method: metodePembayaran
                }
            };
            
            document.getElementById('confirmNama').innerText = namaPembeli;
            document.getElementById('confirmNomorTelepon').innerText = nomorTelepon;
            document.getElementById('confirmAlamat').innerText = alamat;
            document.getElementById('confirmMetodeBayar').innerText = metodePembayaran.toUpperCase();
            
            const confirmProductSummary = document.getElementById('confirmProductSummary');
            confirmProductSummary.innerHTML = `
                <div class="confirm-item">
                    <p><strong>Produk:</strong> ${productToBuy.name}</p>
                    <p><strong>Jumlah:</strong> 1</p>
                    <p><strong>Harga:</strong> ${formatRupiah(productToBuy.price)}</p>
                </div>
            `;
            document.getElementById('confirmTotalHarga').innerText = formatRupiah(productToBuy.price);
            
            closeBuyModal();
            document.getElementById('confirmModal').style.display = 'flex';
        });

        const buyModal = document.getElementById('buyModal');
        const confirmModal = document.getElementById('confirmModal');
        const successModal = document.getElementById('successModal');
        const paymentButtons = document.querySelectorAll('.payment-btn');

        paymentButtons.forEach(button => {
            button.addEventListener('click', selectPaymentMethod);
        });

        window.onclick = function(event) {
            if (event.target == buyModal) {
                closeBuyModal();
            }
            if (event.target == confirmModal) {
                closeConfirmModal();
            }
            if (event.target == successModal) {
                closeSuccessModal();
            }
        }
    });
</script>
</body>
</html>