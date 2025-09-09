<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - ZenTechID</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General body and font styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        /* Header and Navigation Styles */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            padding: 0 40px;
            background: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
            box-sizing: border-box;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo-img {
            height: 45px;
        }
        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.4em;
            font-weight: 100;
            margin-left: 12px;
            color: #00c2ff;
            letter-spacing: 1px;
        }
        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
        }
        nav a:hover {
            color: #00e0ff;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 60px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            top: 100%;
            left: 0;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #555;
            color: #00e0ff;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .nav-icon {
            font-size: 1.4em;
            color: #00c2ff;
        }
        
        /* Keranjang-specific styles */
        .cart-container {
            max-width: 900px;
            margin: 100px auto 40px;
            padding: 20px;
            background-color: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        .cart-container h2 {
            text-align: center;
            color: #00e0ff;
            margin-bottom: 30px;
        }
        .empty-cart-message {
            text-align: center;
            color: #888;
            padding: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #222;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .item-details {
            flex-grow: 1;
            margin-left: 20px;
        }
        .item-details h4 {
            margin: 0 0 5px 0;
            font-size: 1.2em;
        }
        .item-details p {
            margin: 0;
            color: #aaa;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity-controls button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .quantity-controls button:hover {
            background-color: #0056b3;
        }
        .remove-btn, .buy-btn {
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .remove-btn {
            background-color: #dc3545;
        }
        .remove-btn:hover {
            background-color: #c82333;
        }
        .buy-btn {
            background-color: #28a745;
            margin-right: 10px; /* Space between buy and remove buttons */
        }
        .buy-btn:hover {
            background-color: #218838;
        }
        .checkout-container {
            text-align: right;
            margin-top: 20px;
            border-top: 2px solid #333;
            padding-top: 20px;
        }
        .checkout-btn {
            background-color: #28a745;
            color: white;
            padding: 15px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .checkout-btn:hover {
            background-color: #218838;
        }
        .checkout-btn:disabled {
            background-color: #555;
            cursor: not-allowed;
        }
        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 20;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #1a1a1a;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            width: 80%;
            max-width: 500px;
            position: relative;
            color: white;
        }
        .modal-content h3 {
            text-align: center;
            color: #00e0ff;
            margin-bottom: 20px;
        }
        .modal-content label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .modal-content input, .modal-content textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            background-color: #222;
            color: white;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .modal-content textarea {
            resize: vertical;
        }
        .modal-content .submit-btn {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 20px;
        }
        .modal-content .submit-btn:hover:enabled {
            background-color: #218838;
        }
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 20px;
        }
        .close-btn:hover,
        .close-btn:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        /* Styling for product info inside modal */
        .product-info-modal {
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: #222;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .product-info-modal img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .product-info-modal h4, .product-info-modal p {
            margin: 0;
        }
        
        /* Styling for address input with search button */
        .alamat-group {
            display: flex;
            gap: 10px;
        }
        .alamat-group input {
            flex-grow: 1;
        }
        .search-map-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-map-btn:hover {
            background-color: #0056b3;
        }
        .search-map-btn i {
            margin-right: 5px;
        }

        /* Styling for payment method buttons */
        .payment-methods {
            display: flex;
            justify-content: space-around;
            gap: 10px;
            margin-top: 15px;
        }
        .payment-btn {
            background-color: #222;
            color: white;
            border: 2px solid #444;
            border-radius: 8px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 150px;
        }
        .payment-btn:hover, .payment-btn.selected {
            background-color: #333;
            border-color: #00e0ff;
            transform: translateY(-2px);
        }
        .payment-btn img {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }
        .payment-btn i {
            font-size: 2.5em;
            color: #00e0ff;
            margin-bottom: 5px;
        }

        /* Disable the submit button by default */
        .submit-btn:disabled {
            background-color: #555;
            cursor: not-allowed;
        }

        /* New confirmation modal styles */
        .confirm-details {
            background-color: #222;
            padding: 20px;
            border-radius: 8-px;
            margin-bottom: 20px;
        }
        .confirm-details p {
            margin: 5px 0;
        }
        .confirm-details h4 {
            margin-top: 20px;
            color: #00e0ff;
        }
        .confirm-item {
            border-top: 1px solid #444;
            padding-top: 10px;
            margin-top: 10px;
        }
        .confirm-item:first-child {
            border-top: none;
            padding-top: 0;
            margin-top: 0;
        }
        .final-confirm-btn {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 20px;
        }
        .final-confirm-btn:hover {
            background-color: #218838;
        }

        /* Style for the new DANA link */
        .payment-option {
            text-decoration: none;
            color: inherit;
        }

        /* Success Modal Styles */
        .success-modal-content {
            text-align: center;
            padding: 40px 20px;
            animation: modalFadeIn 0.5s ease-out;
        }
        .success-checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #4CAF50;
            stroke-miterlimit: 10;
            margin: 0 auto;
            box-shadow: inset 0px 0px 0px #4CAF50;
            animation: fill 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both;
        }
        .success-checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4CAF50;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        .success-checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        .success-modal-content h3 {
            color: #4CAF50;
            margin-top: 20px;
        }
        .success-summary {
            text-align: left;
            margin-top: 30px;
            border-top: 1px solid #444;
            padding-top: 20px;
        }
        .success-summary p {
            margin: 8px 0;
        }
        .success-summary span {
            color: #ccc;
        }
        .success-summary h4 {
            color: #00e0ff;
            margin-top: 15px;
        }
        .success-summary-item {
            background-color: #222;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .success-close-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        .success-close-btn:hover {
            background-color: #0056b3;
        }
        .print-btn {
            background-color: #f7a32b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1em;
            transition: background-color 0.3s;
            margin-left: 10px;
        }
        .print-btn:hover {
            background-color: #e09426;
        }
        /* Keyframes for animations */
        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
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
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4CAF50;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('Video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img">
        <span class="logo-text">ZenTechID</span>
    </div>
    
    <nav>
        <a href="{{ url('halaman_utama') }}">Beranda</a>
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

<div class="cart-container">
    <h2>Keranjang Belanja Anda</h2>
    <div id="cart-list"></div>
</div>

<div id="buyModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeBuyModal()">×</span>
        <h3>Formulir Pembelian</h3>
        
        <div id="product-info-modal-content" class="product-info-modal">
            </div>

        <form id="buyForm">
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
                <a href="https://www.dana.id/" target="_blank" class="payment-btn" data-method="dana" onclick="selectPaymentMethod(event)">
                    <img src="{{ asset('Video/Dana.jpg') }}" alt="Logo DANA">
                    <span>DANA</span>
                </a>
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
    <div class="modal-content">
        <span class="close-btn" onclick="closeConfirmModal()">×</span>
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
        <button class="print-btn" onclick="printReceipt()">Cetak Struk</button>
    </div>
</div>

<script>
    let currentOrderData = {};

    function formatRupiah(number) {
        return `Rp ${number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
    }

    function renderCart() {
        const cartList = document.getElementById('cart-list');
        const cart = JSON.parse(localStorage.getItem('cartItems')) || [];

        if (cart.length === 0) {
            cartList.innerHTML = '<p class="empty-cart-message">Keranjang Anda kosong.</p>';
        } else {
            let itemsHtml = '';
            cart.forEach(item => {
                const title = item.title || item.name || 'Nama Produk Tidak Ditemukan';
                const price = item.price || 0;
                const imagePath = item.image || 'https://via.placeholder.com/80/1c1c1c/999999?text=Tidak+Ada+Gambar';
                const itemTotal = price * item.quantity;
                
                itemsHtml += `
                    <div class="cart-item" data-id="${item.id}">
                        <img src="${imagePath}" alt="${title}" onerror="this.src='https://via.placeholder.com/80/1c1c1c/999999?text=Tidak+Ada+Gambar';">
                        <div class="item-details">
                            <h4>${title}</h4>
                            <p>${formatRupiah(price)}</p>
                        </div>
                        <div class="quantity-controls">
                            <button onclick="changeQuantity('${item.id}', -1)">-</button>
                            <span>${item.quantity}</span>
                            <button onclick="changeQuantity('${item.id}', 1)">+</button>
                        </div>
                        <p><strong>Total:</strong> ${formatRupiah(itemTotal)}</p>
                        <div>
                            <button class="buy-btn" onclick="buySingleItem('${item.id}')">Beli</button>
                            <button class="remove-btn" onclick="removeFromCart('${item.id}')">Hapus</button>
                        </div>
                    </div>
                `;
            });
            cartList.innerHTML = itemsHtml;
        }
    }

    function changeQuantity(id, change) {
        let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
        const itemIndex = cart.findIndex(i => i.id == id);
        
        if (itemIndex > -1) {
            cart[itemIndex].quantity += change;
            if (cart[itemIndex].quantity <= 0) {
                cart.splice(itemIndex, 1);
            }
            localStorage.setItem('cartItems', JSON.stringify(cart));
            renderCart();
        }
    }

    function removeFromCart(id) {
        if (confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')) {
            let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
            cart = cart.filter(item => item.id != id);
            localStorage.setItem('cartItems', JSON.stringify(cart));
            renderCart();
        }
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
        const addressInput = document.getElementById('alamat').value;
        if (addressInput) {
            window.open(`https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(addressInput)}`, '_blank');
        } else {
            alert('Masukkan alamat untuk dicari di Google Maps.');
        }
    }

    function buySingleItem(itemId) {
        const cart = JSON.parse(localStorage.getItem('cartItems')) || [];
        const item = cart.find(i => i.id == itemId);
        
        if (item) {
            const productInfoModal = document.getElementById('product-info-modal-content');
            const title = item.title || item.name || 'Nama Produk Tidak Ditemukan';
            const price = item.price || 0;
            const imagePath = item.image || 'https://via.placeholder.com/80/1c1c1c/999999?text=Tidak+Ada+Gambar';
            const itemTotal = price * item.quantity;
            
            productInfoModal.innerHTML = `
                <img src="${imagePath}" alt="${title}" onerror="this.src='https://via.placeholder.com/80/1c1c1c/999999?text=Tidak+Ada+Gambar';">
                <div class="item-details">
                    <h4>${title}</h4>
                    <p>Jumlah: ${item.quantity}</p>
                    <p>Harga Total: ${formatRupiah(itemTotal)}</p>
                </div>
            `;
            
            currentOrderData.itemsToProcess = [item];
            document.getElementById('buyForm').reset();
            document.querySelectorAll('.payment-btn').forEach(btn => btn.classList.remove('selected'));
            document.getElementById('metodePembayaran').value = '';
            document.getElementById('buyForm').querySelector('.submit-btn').disabled = true;
            
            document.getElementById('buyModal').style.display = 'block';
        }
    }

    function closeBuyModal() {
        document.getElementById('buyModal').style.display = 'none';
    }

    function closeConfirmModal() {
        document.getElementById('confirmModal').style.display = 'none';
    }

    function closeSuccessModal() {
        document.getElementById('successModal').style.display = 'none';
        renderCart();
    }

    function showSuccessModal(orderData) {
        const modal = document.getElementById('successModal');
        const customer = orderData.customer;
        const totalHarga = orderData.total;

        document.getElementById('successNama').innerText = customer.name;
        document.getElementById('successNomorTelepon').innerText = customer.phone;
        document.getElementById('successAlamat').innerText = customer.address;
        document.getElementById('successMetodeBayar').innerText = customer.payment_method.toUpperCase();
        
        const successProductSummary = document.getElementById('successProductSummary');
        let summaryHtml = '';
        orderData.items.forEach(item => {
            const title = item.title || item.name || 'Nama Produk Tidak Ditemukan';
            summaryHtml += `
                <div class="success-summary-item">
                    <p><strong>Produk:</strong> <span>${title}</span></p>
                    <p><strong>Jumlah:</strong> <span>${item.quantity}</span></p>
                </div>
            `;
        });
        successProductSummary.innerHTML = summaryHtml;
        document.getElementById('successTotalHarga').innerText = formatRupiah(totalHarga);
        
        modal.style.display = 'flex';
    }

    function processPayment() {
        const orderData = currentOrderData;
        
        let orders = JSON.parse(localStorage.getItem('adminOrders')) || [];
        
        const newOrder = {
            id: new Date().getTime(),
            nama: orderData.customer.name,
            nomor_telepon: orderData.customer.phone,
            alamat: orderData.customer.address,
            metode_pembayaran: orderData.customer.payment_method,
            total: orderData.total,
            tanggal: new Date(),
            items: orderData.items
        };
        
        orders.push(newOrder);
        localStorage.setItem('adminOrders', JSON.stringify(orders));

        let cart = JSON.parse(localStorage.getItem('cartItems')) || [];
        const itemsToKeep = cart.filter(cartItem => {
            return !orderData.items.some(processedItem => processedItem.id === cartItem.id);
        });
        localStorage.setItem('cartItems', JSON.stringify(itemsToKeep));

        closeConfirmModal();
        showSuccessModal(orderData);
    }
    
    // START: NEW CODE FOR PRINTING RECEIPT
    function printReceipt() {
        const printContent = document.getElementById('successModal').querySelector('.modal-content').innerHTML;
        const originalBody = document.body.innerHTML;
        
        document.body.innerHTML = `
            <style>
                body { font-family: 'Poppins', sans-serif; color: #000; background-color: #fff; padding: 20px; }
                .success-modal-content { text-align: left; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
                .success-summary { text-align: left; }
                .success-summary p, .success-summary-item { line-height: 1.5; margin: 5px 0; }
                .success-summary h3, .success-summary h4 { color: #000; text-align: center; }
                .success-summary h3 { margin-bottom: 20px; }
                .success-checkmark, .success-close-btn, .print-btn { display: none; }
                @media print {
                    body { font-size: 12px; }
                    .modal-content { box-shadow: none; border: none; padding: 0; margin: 0; }
                }
            </style>
            <div class="success-modal-content">
                <h3>Struk Pembelian ZenTechID</h3>
                <div class="success-summary">
                    <p><strong>Tanggal:</strong> ${new Date().toLocaleDateString('id-ID')}</p>
                    <p><strong>Nama:</strong> ${document.getElementById('successNama').innerText}</p>
                    <p><strong>Nomor Telepon:</strong> ${document.getElementById('successNomorTelepon').innerText}</p>
                    <p><strong>Alamat:</strong> ${document.getElementById('successAlamat').innerText}</p>
                    <p><strong>Metode Pembayaran:</strong> ${document.getElementById('successMetodeBayar').innerText}</p>
                    <br>
                    <h4>Ringkasan Pesanan:</h4>
                    ${document.getElementById('successProductSummary').innerHTML}
                    <hr style="border-top: 1px dashed #000; margin: 10px 0;">
                    <p><strong>Total Pembayaran:</strong> ${document.getElementById('successTotalHarga').innerText}</p>
                </div>
            </div>
        `;
        window.print();
        document.body.innerHTML = originalBody;
        closeSuccessModal();
    }
    // END: NEW CODE FOR PRINTING RECEIPT

    document.addEventListener('DOMContentLoaded', function() {
        renderCart();

        const buyModal = document.getElementById('buyModal');
        const confirmModal = document.getElementById('confirmModal');
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
        }

        document.getElementById('buyForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const items = currentOrderData.itemsToProcess;
            if (!items || items.length === 0) {
                alert('Tidak ada produk untuk diproses.');
                return;
            }

            const namaPembeli = document.getElementById('namaPembeli').value;
            const nomorTelepon = document.getElementById('nomorTelepon').value;
            const alamat = document.getElementById('alamat').value;
            const metodePembayaran = document.getElementById('metodePembayaran').value;
            
            const totalHarga = items.reduce((total, item) => total + ((item.price || 0) * item.quantity), 0);
            
            currentOrderData = {
                customer: {
                    name: namaPembeli,
                    phone: nomorTelepon,
                    address: alamat,
                    payment_method: metodePembayaran
                },
                items: items,
                total: totalHarga
            };
            
            document.getElementById('confirmNama').innerText = namaPembeli;
            document.getElementById('confirmNomorTelepon').innerText = nomorTelepon;
            document.getElementById('confirmAlamat').innerText = alamat;
            document.getElementById('confirmMetodeBayar').innerText = metodePembayaran.toUpperCase();
            
            const confirmProductSummary = document.getElementById('confirmProductSummary');
            let summaryHtml = '';
            items.forEach(item => {
                const title = item.title || item.name || 'Nama Produk Tidak Ditemukan';
                const price = item.price || 0;
                summaryHtml += `
                    <div class="confirm-item">
                        <p><strong>Produk:</strong> ${title}</p>
                        <p><strong>Jumlah:</strong> ${item.quantity}</p>
                        <p><strong>Harga Satuan:</strong> ${formatRupiah(price)}</p>
                    </div>
                `;
            });
            confirmProductSummary.innerHTML = summaryHtml;
            document.getElementById('confirmTotalHarga').innerText = formatRupiah(totalHarga);
            
            closeBuyModal();
            confirmModal.style.display = 'block';
        });
    });
</script>

</body>
</html>
