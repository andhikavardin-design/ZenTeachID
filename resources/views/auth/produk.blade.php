<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk ASUS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS yang Anda berikan */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { height: 100%; font-family: 'Segoe UI', sans-serif; color: white; background: #0f0f0f; }
        header { padding: 10px 40px; background: rgba(0,0,0,0.9); display: flex; justify-content: space-between; align-items: center; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 40px; }
        .logo-text { font-family: 'Poppins', cursive; font-size: 1.40em; font-weight: 100; margin-left: 10px; color: #00c2ff; letter-spacing: 1px; }
        nav { display: flex; align-items: center; }
        nav a { margin-left: 20px; text-decoration: none; color: white; font-weight: bold; font-size: 15px; transition: color 0.3s; }
        nav a:hover { color: #00e0ff; }
        .nav-icon { margin-left: 20px; text-decoration: none; color: #00cfff; font-size: 1.5em; transition: color 0.3s; }
        .nav-icon:hover { color: #00e0ff; }
        .product-page { padding: 80px 40px; max-width: 1400px; margin: auto; }
        h2 { text-align: center; margin-bottom: 20px; font-size: 2.5em; color: #00e0ff; }
        .products { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        
        /* Animasi untuk card produk */
        .card { 
            background: rgba(255,255,255,0.05); 
            border-radius: 15px; 
            backdrop-filter: blur(8px); 
            padding: 20px; 
            text-align: center; 
            box-shadow: 0 0 15px rgba(0,0,0,0.3); 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
            cursor: pointer; 
            position: relative; 
            animation: fadeIn 0.5s ease-out;
        }
        .card:hover { 
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
        }
        .card img { max-width: 100%; border-radius: 10px; margin-bottom: 15px; height: 180px; object-fit: cover; }
        .card h3 { margin-bottom: 10px; color: #00e0ff; }
        .card p { margin-bottom: 10px; }
        .buy-btn-card { display: none; }
        .search-form { text-align: center; margin-bottom: 30px; }
        .search-form input { padding: 10px; width: 300px; border-radius: 10px; border: none; outline: none; }
        .search-form button { padding: 10px 20px; margin-left: 10px; background-color: #00e0ff; border: none; border-radius: 10px; color: black; font-weight: bold; cursor: pointer; }
        .no-result { text-align: center; color: #aaa; font-style: italic; margin-top: 20px; }
        
        /* Animasi untuk modal */
        #descriptionModal, #checkoutModal, #successModal { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.7); 
            justify-content: center; 
            align-items: center; 
            z-index: 1000; 
        }
        .modal-content {
            position: relative;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 10px;
            max-width: 800px;
            width: 90%;
            color: white;
            text-align: center;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9);
            opacity: 0;
            animation: scaleIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        #descriptionModal.show, #checkoutModal.show, #successModal.show {
            display: flex;
        }

        #descriptionModal.show .modal-content, #checkoutModal.show .modal-content, #successModal.show .modal-content {
            animation: scaleIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        #descriptionModal .modal-content img { max-width: 80%; border-radius: 10px; margin-bottom: 15px; }
        #descriptionModal .modal-content h3 { color: #00e0ff; margin-bottom: 10px; }
        #descriptionModal .modal-content p { color: #ccc; margin-bottom: 20px; text-align: left; }
        #descriptionModal .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; font-weight: bold; cursor: pointer; color: white; }
        .card-text-container { height: 60px; overflow-y: auto; padding: 0 5px; margin-bottom: 10px; }
        .card-text-container p { margin: 0; font-size: 14px; color: #ccc; text-align: left; }
        .comments-section { text-align: left; margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); }
        .comment-form input, .comment-form textarea, .comment-form button, .comment-form select { width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 8px; border: none; background: #2a2a2a; color: white; outline: none; box-sizing: border-box; }
        .comment-form button { background: #00e0ff; color: black; font-weight: bold; cursor: pointer; transition: background 0.3s; }
        .comment-form button:hover { background: #00c2ff; }
        .comment-list { max-height: 200px; overflow-y: auto; margin-top: 20px; padding-right: 10px; }
        .comment-item { background: rgba(255,255,255,0.05); padding: 15px; border-radius: 10px; margin-bottom: 10px; display: flex; flex-direction: column; gap: 5px; }
        .comment-item .user-info { font-size: 14px; font-weight: bold; color: #00e0ff; display: flex; align-items: center; }
        .comment-item .rating { color: #ffd700; font-size: 16px; margin-left: 10px; }
        .comment-item .user-comment { margin-top: 5px; font-size: 14px; color: #ddd; }
        .no-result { font-style: italic; color: #aaa; }
        .modal-buttons { display: flex; justify-content: center; gap: 15px; margin-top: 20px; }
        .modal-buttons .buy-now-btn, .modal-buttons .add-to-cart-btn { padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; border: none; transition: background-color 0.3s; }
        .modal-buttons .buy-now-btn { background-color: #28a745; color: white; }
        .modal-buttons .buy-now-btn:hover { background-color: #218838; }
        .modal-buttons .add-to-cart-btn { background-color: #007bff; color: white; }
        .modal-buttons .add-to-cart-btn:hover { background-color: #0069d9; }
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; border-radius: 5px; top: 100%; left: 0; margin-top: 0; padding-top: 10px; }
        .dropdown-content a { color: white; padding: 12px 16px; text-decoration: none; display: block; text-align: left; margin: 0; font-weight: normal; }
        .dropdown-content a:hover { background-color: #00c2ff; color: black; }
        .dropdown:hover .dropdown-content { display: block; }
        
        #checkoutModal .checkout-content {
            position: relative;
            background: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            color: white;
            text-align: center;
            max-height: 90vh;
            overflow-y: auto;
        }
        #checkoutModal .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; font-weight: bold; cursor: pointer; color: white; }
        #checkoutModal label { display: block; margin-top: 15px; margin-bottom: 5px; color: #ddd; text-align: left; }
        #checkoutModal input, #checkoutModal textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: #2a2a2a;
            color: white;
            outline: none;
            box-sizing: border-box;
        }
        #checkoutModal button {
            background: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            padding: 12px 24px;
            border-radius: 8px;
            margin-top: 20px;
            width: auto;
        }
        #checkoutModal button:hover { background: #218838; }
        #checkoutImage {
            max-width: 200px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .address-group { display: flex; gap: 10px; align-items: flex-end; }
        .address-group input { flex-grow: 1; }
        .address-group button { padding: 10px; background-color: #007bff; border: none; border-radius: 8px; color: white; cursor: pointer; }
        .payment-options { display: flex; flex-direction: column; gap: 10px; margin-top: 15px; text-align: left; }
        .payment-option-link {
            text-decoration: none;
        }
        .payment-option {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #2a2a2a;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            color: white;
            transition: border-color 0.3s, background-color 0.3s;
        }
        .payment-option.selected { border-color: #00e0ff; }
        .payment-option:hover { background-color: #383838; }
        .payment-option img { height: 25px; margin-right: 10px; }
        .payment-option span { flex-grow: 1; }
        .payment-logo { height: 25px; margin-right: 10px; }

        /* Perbaikan untuk animasi modal sukses */
        #successModal .modal-content {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            /* Animasi Fade In & Scale Up */
            transform: scale(0.8);
            opacity: 0;
            animation: showModal 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
        }

        @keyframes showModal {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        #successModal .modal-content .icon-success {
            font-size: 5em;
            color: #28a745;
            animation: bounceIn 0.8s ease-out; /* Animasi ikon */
        }
        @keyframes bounceIn {
            0% { transform: scale(0.1); opacity: 0; }
            60% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }

        #successModal .modal-content h3 {
            color: #28a745;
            font-size: 2em;
            margin: 0;
            animation: textFadeIn 1s ease-in-out;
        }
        #successModal .modal-content h4 {
            color: white;
            margin: 0;
            animation: textFadeIn 1.2s ease-in-out;
        }
        #successModal .modal-content p {
            text-align: left;
            width: 100%;
            line-height: 1.6;
            animation: textFadeIn 1.4s ease-in-out;
        }

        @keyframes textFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        #successModal .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            color: white;
        }
        .data-summary p {
            margin: 5px 0;
        }
        .data-summary strong {
            color: #00e0ff;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <img src="Video/A.jpg" alt="Logo ZenTechID" class="logo-img">
            <span class="logo-text">ZenTechID</span>
        </div>
        <nav>
            <a href="halaman_utama">Beranda</a>
            <div class="dropdown">
                <a href="#">Produk</a>
                <div class="dropdown-content">
                    <a href="{{ route('produk') }}">Produk</a>
                    <a href="{{ route('promosi.index') }}">Promosi</a>
                </div>
            </div>
            <a href="{{ url('profil') }}">Profil</a>
            <a href="{{ route('keranjang') }}" class="nav-icon"><i class="fas fa-shopping-cart"></i></a>
            <a href="{{ route('foto_profil') }}" class="nav-icon"><i class="fas fa-user-circle"></i></a>
        </nav>
    </header>

    <div class="product-page">
        <h2>Produk ASUS</h2>
        <form class="search-form" onsubmit="event.preventDefault(); filterProducts();">
            <input type="text" name="search" id="searchInput" placeholder="Cari produk ASUS...">
            <button type="submit">Cari</button>
        </form>
        <div class="products" id="productGrid"></div>
    </div>

    <div id="descriptionModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeDescriptionModal()">×</span>
            <div id="productDetails">
                <img id="descImage" src="" alt="Product Image">
                <h3 id="descName"></h3>
                <p>Harga: <strong id="descPrice"></strong></p>
                <p id="descDescription"></p>
                <div class="modal-buttons">
                    <button class="buy-now-btn" onclick="showCheckoutModal()">Beli Sekarang</button>
                    <button class="add-to-cart-btn" onclick="addToCart()">Tambah ke Keranjang</button>
                </div>
            </div>
            <div class="comments-section">
                <h4>Tinggalkan Komentar & Rating</h4>
                <form id="commentForm" class="comment-form" onsubmit="submitComment(event)">
                    <input type="hidden" id="commentProductName" value="">
                    <p>Komentar sebagai: <strong><span id="displayUsername"></span></strong></p>
                    <textarea id="commentInput" placeholder="Tulis komentar Anda..." rows="3" required></textarea>
                    <select id="ratingInput" required>
                        <option value="" disabled selected>Pilih Rating Bintang</option>
                        <option value="5">★★★★★ (5/5)</option>
                        <option value="4">★★★★☆ (4/5)</option>
                        <option value="3">★★★☆☆ (3/5)</option>
                        <option value="2">★★☆☆☆ (2/5)</option>
                        <option value="1">★☆☆☆☆ (1/5)</option>
                    </select>
                    <button type="submit">Kirim Komentar</button>
                </form>
                <h4>Komentar Pengguna</h4>
                <div id="commentList" class="comment-list"></div>
            </div>
        </div>
    </div>
    
    <div id="checkoutModal">
        <div class="checkout-content">
            <span class="close-btn" onclick="closeCheckoutModal()">×</span>
            <img id="checkoutImage" src="" alt="Product Image for Checkout">
            <h3>Formulir Pembelian <span id="checkoutProductName"></span></h3>
            <form id="purchaseForm" onsubmit="submitPurchase(event)">
                <input type="hidden" id="checkoutProductId">
                
                <label for="fullName">Nama Lengkap</label>
                <input type="text" id="fullName" name="fullName" required>
                
                <label for="phoneNumber">Nomor Telepon</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required>
                
                <label for="address">Alamat Pengiriman</label>
                <div class="address-group">
                    <input type="text" id="address" name="address" placeholder="Contoh: Jl. Sudirman No. 12" required>
                    <button type="button" onclick="searchOnMaps()">Cari di Peta</button>
                </div>

                <label>Metode Pembayaran</label>
                <div class="payment-options">
                    <a href="https://www.dana.id/" target="_blank" class="payment-option payment-option-link" data-method="dana" onclick="selectPaymentMethod('dana', this)">
                        <img src="{{ asset('Video/Dana.jpg') }}" alt="DANA Logo" class="payment-logo">
                        <span>DANA</span>
                    </a>
                    <div class="payment-option" data-method="cod" onclick="selectPaymentMethod('cod', this)">
                        <i class="fas fa-truck payment-logo" style="font-size: 25px;"></i>
                        <span>Bayar di Tempat</span>
                    </div>
                </div>
                
                <input type="hidden" id="paymentMethod" name="paymentMethod" required>
                
                <button type="submit">Selesaikan Pembelian</button>
            </form>
        </div>
    </div>

    <div id="successModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeSuccessModal()">×</span>
            <i class="fas fa-check-circle icon-success"></i>
            <h3>Pembayaran Berhasil!</h3>
            <h4>Pesanan Anda sedang diproses.</h4>
            <div class="data-summary">
                <p><strong>Produk:</strong> <span id="summaryProductName"></span></p>
                <p><strong>Harga:</strong> <span id="summaryProductPrice"></span></p>
                <p><strong>Nama Lengkap:</strong> <span id="summaryFullName"></span></p>
                <p><strong>Nomor Telepon:</strong> <span id="summaryPhoneNumber"></span></p>
                <p><strong>Alamat Pengiriman:</strong> <span id="summaryAddress"></span></p>
                <p><strong>Metode Pembayaran:</strong> <span id="summaryPaymentMethod"></span></p>
            </div>
        </div>
    </div>
<script>
    // Data produk awal, disarankan menggunakan nama file yang singkat dan tidak ada spasi
    const defaultProducts = [
        { "id": "1", "name": "ASUS ROG Strix", "image": "{{ asset('Video/z.jpg') }}", "price": 15000000, "description": "Laptop gaming ASUS ROG Strix menawarkan performa maksimal untuk pengalaman bermain game yang tak tertandingi.", "stock": 10 },
        { "id": "2", "name": "ASUS ZenBook", "image": "{{ asset('Video/b.jpg') }}", "price": 12500000, "description": "ASUS ZenBook adalah laptop ultra-portabel yang stylish dan bertenaga, ideal untuk produktivitas saat bepergian.", "stock": 15 },
        { "id": "3", "name": "ASUS TUF Gaming", "image": "{{ asset('Video/c.jpg') }}", "price": 13000000, "description": "ASUS TUF Gaming dirancang untuk daya tahan ekstrem dan performa gaming yang andal, cocok untuk para gamer yang membutuhkan ketangguhan.", "stock": 5 },
        { "id": "4", "name": "ASUS VivoBook", "image": "{{ asset('Video/d.jpg') }}", "price": 10500000, "description": "ASUS VivoBook adalah seri laptop yang menawarkan keseimbangan sempurna antara performa dan gaya, dengan berbagai pilihan warna.", "stock": 20 },
        { "id": "5", "name": "ASUS ROG Zephyrus", "image": "{{ asset('Video/e.jpg') }}", "price": 18000000, "description": "Laptop gaming super tipis dan ringan, ASUS ROG Zephyrus, tidak mengorbankan performa. Sangat cocok untuk para gamer profesional.", "stock": 8 },
        { "id": "6", "name": "ASUS ExpertBook", "image": "{{ asset('Video/f.jpg') }}", "price": 11500000, "description": "Dirancang untuk profesional, ASUS ExpertBook menawarkan keamanan tingkat tinggi dan performa bisnis yang solid.", "stock": 12 },
        { "id": "7", "name": "ASUS Chromebook", "image": "{{ asset('Video/g.jpg') }}", "price": 5000000, "description": "Laptop yang cepat, sederhana, dan aman untuk penggunaan sehari-hari, didukung oleh sistem operasi Chrome OS.", "stock": 30 },
        { "id": "8", "name": "ASUS Zenbook Duo", "image": "{{ asset('Video/h.jpg') }}", "price": 16500000, "description": "ASUS Zenbook Duo adalah laptop revolusioner dengan dua layar, ideal untuk multitasking dan kreativitas.", "stock": 7 },
        { "id": "9", "name": "ASUS ProArt Studiobook", "image": "{{ asset('Video/i.jpg') }}", "price": 22000000, "description": "Laptop workstation mobile yang kuat, dirancang khusus untuk para kreator dan desainer profesional.", "stock": 4 },
        { "id": "10", "name": "ASUS ROG Flow", "image": "{{ asset('Video/j.jpg') }}", "price": 17500000, "description": "ASUS ROG Flow adalah laptop gaming yang fleksibel, dapat berfungsi sebagai laptop, tablet, atau dihubungkan ke XG Mobile untuk performa ekstra.", "stock": 6 },
        { "id": "11", "name": "ASUS ZenBook Flip", "image": "{{ asset('Video/k.jpg') }}", "price": 13500000, "description": "Laptop konvertibel 2-in-1 yang dapat berputar 360 derajat, menawarkan fleksibilitas untuk bekerja dan bermain.", "stock": 11 },
        { "id": "12", "name": "ASUS TUF Dash", "image": "{{ asset('Video/l.jpg') }}", "price": 14000000, "description": "Laptop gaming yang ringkas dan bertenaga dengan desain minimalis, ideal untuk para gamer yang sering bepergian.", "stock": 9 },
        { "id": "13", "name": "ASUS VivoBook Pro", "image": "{{ asset('Video/m.jpg') }}", "price": 12800000, "description": "Seri VivoBook Pro dirancang untuk performa tinggi, dengan layar OLED yang menakjubkan dan komponen kuat.", "stock": 18 },
        { "id": "14", "name": "ASUS Zenbook S", "image": "{{ asset('Video/n.jpg') }}", "price": 15500000, "description": "Zenbook S adalah laptop ultra-tipis yang elegan dan ringan, menawarkan mobilitas tanpa kompromi.", "stock": 14 },
        { "id": "15", "name": "ASUS ExpertCenter", "image": "{{ asset('Video/o.jpg') }}", "price": 9500000, "description": "PC desktop bisnis yang handal dan aman, ideal untuk kebutuhan kantor dan profesional.", "stock": 25 }
    ];

    let selectedProduct = null;
    const loggedInUsername = "{{ Auth::check() ? Auth::user()->username : 'Pengguna' }}";

    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe
            .replace(/&/g, "&")
            .replace(/</g, "<")
            .replace(/>/g, ">")
            .replace(/"/g, "")
            .replace(/'/g, "'")
            .replace(/`/g, "`");
    }

    // PERUBAHAN: Menggunakan kunci localStorage yang sama dengan admin
    function getProducts() {
        let addedProducts = JSON.parse(localStorage.getItem('adminProducts')) || [];
        const isDefaultDataLoaded = addedProducts.some(p => p.id === '1');
        
        // Jika data dari admin kosong, gunakan data default
        if (addedProducts.length === 0 || !isDefaultDataLoaded) {
            addedProducts = defaultProducts;
            localStorage.setItem('adminProducts', JSON.stringify(addedProducts));
        }

        return addedProducts;
    }

    function findProductById(id) {
        return getProducts().find(p => p.id == id);
    }
    
    function renderProducts(productArray) {
        const productGrid = document.getElementById('productGrid');
        productGrid.innerHTML = '';
        if (productArray.length === 0) {
            productGrid.innerHTML = '<div class="no-result">Produk tidak ditemukan.</div>';
        } else {
            productArray.forEach(item => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <img src="${escapeHtml(item.image)}" alt="${escapeHtml(item.name)}">
                    <h3>${escapeHtml(item.name)}</h3>
                    <div class="card-text-container"><p>${escapeHtml(item.description)}</p></div>
                    <p>Rp ${numberWithCommas(item.price)}</p>
                `;
                card.onclick = () => showDescriptionModal(item.id);
                productGrid.appendChild(card);
            });
        }
    }
    
    function filterProducts() {
        const keyword = document.getElementById('searchInput').value.toLowerCase();
        const allProducts = getProducts();
        const filtered = allProducts.filter(item => item.name.toLowerCase().includes(keyword));
        renderProducts(filtered);
    }
    
    document.addEventListener('DOMContentLoaded', () => {
        renderProducts(getProducts());
    });
    
    function showDescriptionModal(productId) {
        const product = findProductById(productId);
        if (!product) return;
        selectedProduct = product;
    
        document.getElementById('descImage').src = escapeHtml(product.image);
        document.getElementById('descName').innerText = escapeHtml(product.name);
        document.getElementById('descPrice').innerText = 'Rp ' + numberWithCommas(product.price);
        document.getElementById('descDescription').innerText = escapeHtml(product.description);
        
        document.getElementById('displayUsername').innerText = loggedInUsername;
        document.getElementById('commentProductName').value = escapeHtml(product.name);
        loadAndRenderComments(product.name);
    
        document.getElementById('descriptionModal').style.display = 'flex';
    }
    
    function closeDescriptionModal() {
        document.getElementById('descriptionModal').style.display = 'none';
    }
    
    function showCheckoutModal() {
        if (!selectedProduct) return;
        
        closeDescriptionModal();
    
        document.getElementById('checkoutImage').src = escapeHtml(selectedProduct.image);
        document.getElementById('checkoutProductName').innerText = `(${selectedProduct.name})`;
        document.getElementById('checkoutProductId').value = selectedProduct.id;
    
        document.getElementById('checkoutModal').style.display = 'flex';
        
        // Reset pilihan pembayaran dan form
        document.getElementById('purchaseForm').reset();
        document.getElementById('paymentMethod').value = '';
        const paymentOptions = document.querySelectorAll('.payment-option');
        paymentOptions.forEach(option => option.classList.remove('selected'));
    }
    
    function closeCheckoutModal() {
        document.getElementById('checkoutModal').style.display = 'none';
    }
    
    function selectPaymentMethod(method, element) {
        const paymentOptions = document.querySelectorAll('.payment-option');
        paymentOptions.forEach(option => option.classList.remove('selected'));
        element.classList.add('selected');
        document.getElementById('paymentMethod').value = method;
    }
    
    function searchOnMaps() {
        const address = document.getElementById('address').value;
        if (address) {
            const encodedAddress = encodeURIComponent(address);
            window.open(`https://maps.google.com/?q=${encodedAddress}`, '_blank');
        } else {
            alert('Silakan masukkan alamat terlebih dahulu.');
        }
    }
    
    function submitPurchase(event) {
        event.preventDefault();
        const fullName = document.getElementById('fullName').value;
        const phoneNumber = document.getElementById('phoneNumber').value;
        const address = document.getElementById('address').value;
        const paymentMethod = document.getElementById('paymentMethod').value;
    
        if (!paymentMethod) {
            alert('Silakan pilih metode pembayaran.');
            return;
        }
    
        const purchasedItem = {
            id: selectedProduct.id,
            title: selectedProduct.name,
            price: selectedProduct.price,
            image: selectedProduct.image,
            quantity: 1, // Asumsi 1 produk per pembelian langsung
        };
    
        const order = {
            id: Date.now(), // ID unik untuk pesanan
            nama: fullName,
            nomor_telepon: phoneNumber,
            alamat: address,
            metode_pembayaran: paymentMethod,
            total: purchasedItem.price,
            items: [purchasedItem],
            tanggal: new Date().toISOString()
        };
    
        // Simpan pesanan ke localStorage
        let existingOrders = JSON.parse(localStorage.getItem('adminOrders')) || [];
        existingOrders.push(order);
        localStorage.setItem('adminOrders', JSON.stringify(existingOrders));
    
        // Tampilkan modal sukses dengan data yang diisi
        document.getElementById('summaryProductName').innerText = selectedProduct.name;
        document.getElementById('summaryProductPrice').innerText = `Rp ${numberWithCommas(selectedProduct.price)}`;
        document.getElementById('summaryFullName').innerText = fullName;
        document.getElementById('summaryPhoneNumber').innerText = phoneNumber;
        document.getElementById('summaryAddress').innerText = address;
        document.getElementById('summaryPaymentMethod').innerText = getPaymentMethodName(paymentMethod);
    
        closeCheckoutModal();
        document.getElementById('successModal').style.display = 'flex';
    }
    
    function closeSuccessModal() {
        document.getElementById('successModal').style.display = 'none';
    }
    
    function getPaymentMethodName(methodCode) {
        switch (methodCode) {
            case 'dana': return 'DANA';
            case 'cod': return 'Bayar di Tempat (COD)';
            default: return 'Tidak Diketahui';
        }
    }
    
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    
    function loadAndRenderComments(productName) {
        let allComments = JSON.parse(localStorage.getItem('comments')) || {};
        let productComments = allComments[productName] || [];
        const commentList = document.getElementById('commentList');
        commentList.innerHTML = '';
        if (productComments.length === 0) {
            commentList.innerHTML = '<div class="no-result">Belum ada komentar untuk produk ini.</div>';
        } else {
            productComments.forEach(comment => {
                const commentItem = document.createElement('div');
                commentItem.className = 'comment-item';
                commentItem.innerHTML = `
                    <p class="user-info">${escapeHtml(comment.username)} <span class="rating">${'★'.repeat(comment.rating)}</span></p>
                    <p class="user-comment">${escapeHtml(comment.komentar)}</p>
                `;
                commentList.appendChild(commentItem);
            });
        }
    }
    
    function submitComment(event) {
        event.preventDefault();
        const productName = document.getElementById('commentProductName').value;
        const username = loggedInUsername;
        const commentText = document.getElementById('commentInput').value;
        const rating = document.getElementById('ratingInput').value;
    
        if (!username || !commentText || !rating || !productName) {
            console.error('Data komentar tidak lengkap.');
            return;
        }
    
        let newComment = { 
            username: username,
            komentar: commentText,
            rating: parseInt(rating)
        };
    
        let allComments = JSON.parse(localStorage.getItem('comments')) || {};
    
        if (!allComments[productName]) {
            allComments[productName] = [];
        }
    
        allComments[productName].push(newComment);
        localStorage.setItem('comments', JSON.stringify(allComments));
        
        document.getElementById('commentForm').reset();
        loadAndRenderComments(productName);
    }
    
    function addToCart() {
        if (!selectedProduct) return;
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const existingItemIndex = cartItems.findIndex(item => item.id === selectedProduct.id);
    
        if (existingItemIndex > -1) {
            cartItems[existingItemIndex].quantity += 1;
        } else {
            cartItems.push({
                id: selectedProduct.id,
                name: selectedProduct.name,
                price: selectedProduct.price,
                image: selectedProduct.image,
                quantity: 1
            });
        }
    
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        alert(`${selectedProduct.name} telah ditambahkan ke keranjang!`);
    }
</script>