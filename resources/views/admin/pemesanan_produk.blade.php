<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemesanan - ZenTechID</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General body and font styles */
        body {
            font-family: 'Segoe UI', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            background-color: #121212;
        }

        /* Header and Navigation Styles - Same as Dashboard */
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
        @media print {
            header, .print-btn-container, .action-column {
                display: none !important;
            }
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
            min-width: 160px;
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
        }
        .nav-icon .fas {
            color: #00c2ff;
            transition: color 0.3s;
        }
        .nav-icon:hover .fas {
            color: #00e0ff;
        }
        .profile-icon, .cart-icon {
            font-size: 1.4em;
        }
        
        /* Container and Table Styles - Specific to Pemesanan Page */
        .container {
            max-width: 1200px;
            margin: 100px auto 40px;
            padding: 20px;
            background-color: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: #00e0ff;
            margin-bottom: 30px;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-table th, .order-table td {
            padding: 15px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        .order-table th {
            background-color: #222;
            color: #00c2ff;
        }
        
        .order-table tbody tr:hover {
            background-color: #2a2a2a;
        }

        .order-table td.order-items {
            font-size: 0.9em;
        }
        
        .order-item-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .order-item-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            gap: 10px;
        }
        .order-item-list img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .order-item-details {
            display: flex;
            flex-direction: column;
        }
        .order-item-details .item-title {
            font-weight: bold;
            color: #fff;
        }
        .order-item-details .item-qty {
            font-size: 0.8em;
            color: #aaa;
        }

        .no-orders {
            text-align: center;
            color: #888;
            padding: 20px;
        }

        .print-btn-container {
            text-align: right;
            margin-bottom: 20px;
        }

        /* Style for the new print icon */
        .print-icon {
            font-size: 24px;
            color: #007bff;
            cursor: pointer;
            transition: color 0.3s ease;
            text-decoration: none; /* Remove underline from the link */
        }
        
        .print-icon:hover {
            color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        
        tfoot {
            font-weight: bold;
        }
        
        tfoot tr {
            background-color: #2a2a2a;
        }
        
        tfoot td {
            border-top: 2px solid #00c2ff;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('Video/A.jpg') }}" alt="Logo ZenTechID" class="logo-img">
        <span class="logo-text">ZenTeachID</span>
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

<div class="container">
    <h2>Daftar Pemesanan Produk</h2>
    <div class="print-btn-container">
        <a href="#" class="print-icon" onclick="printTable()"><i class="fas fa-print"></i></a>
    </div>
    <div id="order-list">
    </div>
</div>

<script>
    function formatRupiah(number) {
        return `Rp ${number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`;
    }

    function renderOrders() {
        const orderListContainer = document.getElementById('order-list');
        const orders = JSON.parse(localStorage.getItem('adminOrders')) || [];
        let grandTotal = 0;

        if (orders.length === 0) {
            orderListContainer.innerHTML = '<p class="no-orders">Belum ada pemesanan.</p>';
            return;
        }

        let tableHtml = `
            <table class="order-table">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Metode Pembayaran</th>
                        <th>Produk Dipesan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
        `;

        orders.forEach((order, index) => {
            grandTotal += order.total;
            
            // Calculate total quantity for the current order
            const totalQuantity = order.items.reduce((sum, item) => sum + item.quantity, 0);
            
            let itemsList = order.items.map(item => `
                <li>
                    <div class="order-item-details">
                        <span class="item-title">${item.title || item.name}</span>
                        <span class="item-qty">(${item.quantity}x)</span>
                    </div>
                </li>
            `).join('');
            
            tableHtml += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${order.nama}</td>
                    <td>${order.alamat}</td>
                    <td>${order.metode_pembayaran}</td>
                    <td class="order-items">
                        <ul class="order-item-list">${itemsList}</ul>
                    </td>
                    <td>${totalQuantity}</td>
                    <td>${formatRupiah(order.total)}</td>
                    <td>${new Date(order.tanggal).toLocaleDateString()}</td>
                    <td class="action-column">
                        <button class="delete-btn" onclick="deleteOrder(${order.id})">Hapus</button>
                    </td>
                </tr>
            `;
        });

        tableHtml += `
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:right;">Total Keseluruhan:</td>
                        <td colspan="3">${formatRupiah(grandTotal)}</td>
                    </tr>
                </tfoot>
            </table>
        `;
        orderListContainer.innerHTML = tableHtml;
    }

    function deleteOrder(orderId) {
        if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
            let orders = JSON.parse(localStorage.getItem('adminOrders')) || [];
            orders = orders.filter(order => order.id !== orderId);
            localStorage.setItem('adminOrders', JSON.stringify(orders));
            renderOrders(); // Muat ulang tabel setelah menghapus
        }
    }

    function printTable() {
        window.print();
    }

    document.addEventListener('DOMContentLoaded', renderOrders);
</script>
</body>
</html>