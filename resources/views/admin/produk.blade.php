<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Gaya CSS dari halaman user, ditambah dengan gaya untuk admin */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { height: 100%; font-family: 'Segoe UI', sans-serif; color: white; background: #0f0f0f; }
        header { padding: 10px 40px; background: rgba(0,0,0,0.9); display: flex; justify-content: space-between; align-items: center; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 40px; }
        .logo-text { font-family: 'Poppins', cursive; font-size: 1.40em; font-weight: 100; margin-left: 10px; color: #00c2ff; letter-spacing: 1px; }

        nav { display: flex; align-items: center; }
        nav a { margin-left: 20px; text-decoration: none; color: white; font-weight: bold; font-size: 15px; transition: color 0.3s; }
        nav a:hover { color: #00e0ff; }
        .nav-icon { display: flex; align-items: center; text-decoration: none; color: white; font-weight: bold; margin-left: 20px; font-size: 1.4em; }
        .nav-icon:hover { color: #00e0ff; }
        .nav-icon .fas { font-size: 1.2em; color: #00e0ff; }
        .nav-icon:hover .fas { color: #00e0ff; }
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; border-radius: 5px; top: 100%; left: 0; margin-top: 0; padding-top: 10px; }
        .dropdown-content a { color: white; padding: 12px 16px; text-decoration: none; display: block; text-align: left; margin: 0; font-weight: normal; }
        .dropdown-content a:hover { background-color: #00c2ff; color: black; }
        .dropdown:hover .dropdown-content { display: block; }
        .product-page { padding: 80px 40px; max-width: 1400px; margin: auto; }
        h2 { text-align: center; margin-bottom: 20px; font-size: 2.5em; color: #00e0ff; }
        .products { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
        .card { background: rgba(255,255,255,0.05); border-radius: 15px; backdrop-filter: blur(8px); padding: 20px; text-align: center; box-shadow: 0 0 15px rgba(0,0,0,0.3); transition: transform 0.3s ease; cursor: pointer; position: relative; }
        .card:hover { transform: translateY(-5px); }
        .card img { max-width: 100%; border-radius: 10px; margin-bottom: 15px; height: 180px; object-fit: cover; }
        .card h3 { margin-bottom: 10px; color: #00e0ff; }
        .card p { margin-bottom: 10px; }
        .card-text-container { height: 60px; overflow-y: auto; padding: 0 5px; margin-bottom: 10px; }
        .card-text-container p { margin: 0; font-size: 14px; color: #ccc; text-align: left; }
        .buy-btn { padding: 10px 20px; background: gray; color: #eee; font-weight: bold; border: none; border-radius: 8px; cursor: not-allowed; }
        .buy-btn:hover { background: #888; }
        .search-form { text-align: center; margin-bottom: 30px; }
        .search-form input { padding: 10px; width: 300px; border-radius: 10px; border: none; outline: none; background: #333; color: white; }
        .search-form button { padding: 10px 20px; margin-left: 10px; background-color: #00e0ff; border: none; border-radius: 10px; color: black; font-weight: bold; cursor: pointer; }
        .no-result { text-align: center; color: #aaa; font-style: italic; margin-top: 20px; }

        /* Gaya Khusus Admin */
        .action-bar { text-align: center; margin-bottom: 20px; display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap; }
        .action-bar button { padding: 10px 20px; background-color: #28a745; border: none; border-radius: 10px; color: white; font-weight: bold; cursor: pointer; transition: background-color 0.3s; }
        .action-bar button:hover { background-color: #218838; }
        .edit-button, .delete-button { position: absolute; top: 10px; font-size: 12px; padding: 5px 8px; border-radius: 6px; cursor: pointer; border: none; z-index: 10;}
        .edit-button { right: 58px; background-color: #ffc107; color: #000; }
        .delete-button { right: 10px; background-color: #dc3545; color: #fff; }
        .stock-info { font-size: 0.9em; color: #00c2ff; font-weight: bold; margin-top: 10px; }

        /* Gaya untuk modal Tambah/Edit Produk */
        #editModal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); justify-content: center; align-items: center; z-index: 1000; }
        #editModal .modal-content { 
            position: relative; 
            background: #1e1e1e; 
            padding: 20px; 
            border-radius: 15px; 
            max-width: 400px; 
            width: 90%; 
            color: white; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            gap: 15px;
            /* Tambahkan ini untuk scrolling */
            max-height: 80vh; /* Maksimal 80% dari tinggi viewport */
            overflow-y: auto; /* Aktifkan scrolling vertikal */
        }
        /* Tambahkan gaya untuk scrollbar agar lebih enak dilihat */
        #editModal .modal-content::-webkit-scrollbar {
            width: 8px;
        }
        #editModal .modal-content::-webkit-scrollbar-track {
            background: #2a2a2a;
            border-radius: 10px;
        }
        #editModal .modal-content::-webkit-scrollbar-thumb {
            background-color: #00e0ff;
            border-radius: 10px;
            border: 2px solid #1e1e1e;
        }
        #editModal h3 { text-align: center; color: #00e0ff; margin-bottom: 10px; }
        #editModal input[type="text"], 
        #editModal input[type="number"], 
        #editModal textarea { 
            width: 100%; 
            padding: 12px; 
            border-radius: 8px; 
            border: 1px solid #333; 
            outline: none; 
            font-size: 14px; 
            background: #2a2a2a; 
            color: white;
            transition: border-color 0.3s;
        }
        #editModal input:focus, #editModal textarea:focus { border-color: #00e0ff; }
        #editModal textarea { resize: vertical; min-height: 100px; }
        #editModal input[type="file"] { background: #2a2a2a; color: white; padding: 12px; border: 1px solid #333; border-radius: 8px; }
        .modal-buttons { display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px;}
        #editModal button { 
            padding: 10px 20px; 
            font-size: 14px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            color: black; 
            font-weight: bold; 
            transition: background-color 0.3s;
        }
        #editModal #saveButton { background: #00e0ff; color: black; }
        #editModal #saveButton:hover { background: #00c2ff; }
        #editModal #cancelButton { background: #ccc; color: black; }
        #editModal #cancelButton:hover { background: #bbb; }
        #imagePreview { max-width: 100%; border-radius: 10px; margin-bottom: 10px; display: none; }
        #editModal .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; font-weight: bold; cursor: pointer; color: white; }

        /* Gaya untuk modal Detail Produk */
        #detailModal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); justify-content: center; align-items: center; z-index: 1000; }
        #detailModal .modal-content { position: relative; background: #1a1a1a; padding: 30px; border-radius: 10px; max-width: 700px; width: 90%; color: white; display: flex; gap: 20px; }
        #detailModal .modal-close-btn { position: absolute; top: 10px; right: 20px; font-size: 30px; cursor: pointer; }
        .detail-image-container { flex: 1; text-align: center; }
        .detail-image-container img { max-width: 100%; height: auto; border-radius: 10px; }
        .detail-info { flex: 2; display: flex; flex-direction: column; }
        .detail-info h3 { font-size: 2em; color: #00e0ff; margin-bottom: 10px; }
        .detail-info p { font-size: 1em; line-height: 1.5; margin-bottom: 10px; color: #ccc; }
        .detail-info .price { font-size: 1.5em; font-weight: bold; color: #fff; margin-bottom: 20px; }
        .detail-info .stock-info { font-size: 1em; color: #fff; font-weight: bold; margin-bottom: 10px; }
        
        .comment-section { margin-top: 20px; }
        .comment-section h4 { border-bottom: 2px solid #00e0ff; padding-bottom: 5px; margin-bottom: 15px; }
        .comment-list { max-height: 200px; overflow-y: auto; padding-right: 10px; }
        .comment-item { background: #2a2a2a; padding: 10px; border-radius: 8px; margin-bottom: 10px; }
        .comment-item .user-info { font-weight: bold; margin-bottom: 5px; }
        .comment-item .rating { color: gold; margin-left: 10px; }
        .comment-item .user-comment { font-style: italic; font-size: 0.9em; }
        
        /* Responsive */
        @media (max-width: 768px) {
            #detailModal .modal-content {
                flex-direction: column;
                align-items: center;
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

<div class="product-page">
    <h2>Daftar Produk ASUS</h2>
    <div class="action-bar">
        <button onclick="openAddModal()">+ Tambah Produk</button>
    </div>
    <div class="search-form">
        <form onsubmit="event.preventDefault(); filterProducts();">
            <input type="text" id="searchInput" placeholder="Cari produk ASUS...">
            <button type="submit">Cari</button>
        </form>
    </div>
    <div class="products" id="productGrid"></div>
</div>

<div id="editModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h3 id="modalTitle">Edit Produk</h3>
        <input type="hidden" id="editProductIndex">
        <input type="text" id="productName" placeholder="Nama Produk">
        <input type="number" id="productPrice" placeholder="Harga">
        <input type="number" id="productStock" placeholder="Jumlah Stok">
        <textarea id="productDescription" rows="4" placeholder="Deskripsi Produk"></textarea>
        <input type="file" id="productImage">
        <img id="imagePreview" src="" alt="Preview Gambar">
        <div class="modal-buttons">
            <button id="saveButton" onclick="saveProduct()">Simpan Perubahan</button>
            <button id="cancelButton" onclick="closeEditModal()">Batal</button>
        </div>
    </div>
</div>

<div id="detailModal">
    <div class="modal-content">
        <span class="modal-close-btn" onclick="closeDetailModal()">&times;</span>
        <div class="detail-image-container">
            <img id="detailImage" src="" alt="Detail Gambar Produk">
        </div>
        <div class="detail-info">
            <h3 id="detailName"></h3>
            <p id="detailDescription"></p>
            <p class="price" id="detailPrice"></p>
            <p class="stock-info" id="detailStock"></p>
            
            <div class="comment-section">
                <h4>Komentar dan Rating Pengguna</h4>
                <div class="comment-list" id="commentList">
                    </div>
            </div>
        </div>
    </div>
</div>


<script>
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

    let products = [];
    const PLACEHOLDER_IMG = 'https://via.placeholder.com/250x180.png?text=No+Image';
    let filteredProducts = [];

    function loadProducts() {
        try {
            const storedProducts = localStorage.getItem('adminProducts');
            if (storedProducts && storedProducts !== 'null') {
                products = JSON.parse(storedProducts);
            } else {
                products = defaultProducts;
                saveProducts();
            }
        } catch (e) {
            console.error("Failed to load products from localStorage", e);
            products = defaultProducts;
        }
        filteredProducts = products;
    }

    function saveProducts() {
        try {
            localStorage.setItem('adminProducts', JSON.stringify(products));
        } catch (e) {
            console.error("Failed to save products to localStorage", e);
        }
    }
    
    // Fungsi untuk menampilkan modal detail dengan index dari array yang terfilter
    function showDetailModal(productIndex) {
        // Ambil produk dari array yang sedang ditampilkan (filteredProducts)
        const product = filteredProducts[productIndex]; 
        if (!product) return; // Tambahkan cek untuk menghindari error jika produk tidak ditemukan
        
        document.getElementById('detailImage').src = product.image.startsWith("data:image") ? product.image : product.image;
        document.getElementById('detailName').innerText = product.name;
        document.getElementById('detailDescription').innerText = product.description;
        document.getElementById('detailPrice').innerText = 'Rp ' + numberWithCommas(product.price);
        // Display stock in detail modal
        document.getElementById('detailStock').innerText = `Stok: ${product.stock}`;

        loadAndRenderComments(product.name);
        document.getElementById('detailModal').style.display = 'flex';
    }

    // Fungsi untuk menutup modal detail
    function closeDetailModal() {
        document.getElementById('detailModal').style.display = 'none';
    }

    function renderProducts() {
        const grid = document.getElementById('productGrid');
        grid.innerHTML = '';
        if (filteredProducts.length === 0) {
            grid.innerHTML = '<div class="no-result">Produk tidak ditemukan.</div>';
        } else {
            filteredProducts.forEach((item, index) => {
                let imgSrc = item.image.startsWith("data:image") ? item.image : item.image;
                
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <button class="edit-button" onclick="event.stopPropagation(); openEditModal(${index})">Edit</button>
                    <button class="delete-button" onclick="event.stopPropagation(); deleteProduct(${index})">Hapus</button>
                    <img src="${imgSrc}" alt="${item.name}" onerror="this.src='${PLACEHOLDER_IMG}';">
                    <h3>${item.name}</h3>
                    <div class="card-text-container">
                        <p>${item.description}</p>
                    </div>
                    <p>Rp ${numberWithCommas(item.price)}</p>
                    <p class="stock-info">Stok: ${item.stock}</p>
                `;
                // Gunakan index dari filteredProducts untuk menampilkan modal
                card.onclick = () => showDetailModal(index);
                grid.appendChild(card);
            });
        }
    }

    function openAddModal() {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('modalTitle').innerText = 'Tambah Produk';
        document.getElementById('productName').value = '';
        document.getElementById('productPrice').value = '';
        // Set default stock value for new product
        document.getElementById('productStock').value = 0;
        document.getElementById('productDescription').value = '';
        document.getElementById('productImage').value = '';
        document.getElementById('imagePreview').src = '';
        document.getElementById('imagePreview').style.display = 'none';
        document.getElementById('saveButton').innerText = 'Tambah Produk';
        document.getElementById('editProductIndex').value = '';
    }

    // Buka modal edit dengan index dari array yang terfilter
    function openEditModal(i) {
        const p = filteredProducts[i];
        const originalIndex = products.findIndex(item => item.id === p.id);
        
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('modalTitle').innerText = 'Edit Produk';
        document.getElementById('productName').value = p.name;
        document.getElementById('productPrice').value = p.price;
        // Set stock value for editing
        document.getElementById('productStock').value = p.stock;
        document.getElementById('productDescription').value = p.description;
        document.getElementById('productImage').value = '';
        let imgSrc = p.image.startsWith("data:image") ? p.image : p.image;
        document.getElementById('imagePreview').src = imgSrc;
        document.getElementById('imagePreview').style.display = 'block';
        document.getElementById('saveButton').innerText = 'Simpan Perubahan';
        document.getElementById('editProductIndex').value = originalIndex; // Simpan index asli
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function saveProduct() {
        const name = document.getElementById('productName').value;
        const price = document.getElementById('productPrice').value;
        // Get stock value from input
        const stock = document.getElementById('productStock').value;
        const desc = document.getElementById('productDescription').value;
        const file = document.getElementById('productImage').files[0];
        const index = document.getElementById('editProductIndex').value;
        const isEdit = index !== '';

        if (!name || !price || !stock) {
            alert('Nama, Harga, dan Stok wajib diisi');
            return;
        }

        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                const newP = { 
                    id: isEdit ? products[index].id : (products.length + 1).toString(), 
                    name, 
                    price: parseInt(price), 
                    description: desc, 
                    image: e.target.result,
                    stock: parseInt(stock) // Save the new stock value
                };
                if (isEdit) { 
                    products[index] = newP; 
                } else { 
                    products.push(newP); 
                }
                saveProducts();
                filterProducts(); // Perbarui tampilan setelah menyimpan
                closeEditModal();
            };
            reader.readAsDataURL(file);
        } else {
            const newP = { 
                id: isEdit ? products[index].id : (products.length + 1).toString(), 
                name, 
                price: parseInt(price), 
                description: desc, 
                image: isEdit ? products[index].image : PLACEHOLDER_IMG,
                stock: parseInt(stock) // Save the new stock value
            };
            if (isEdit) { 
                products[index] = newP; 
            } else { 
                products.push(newP); 
            }
            saveProducts();
            filterProducts(); // Perbarui tampilan setelah menyimpan
            closeEditModal();
        }
    }

    function deleteProduct(i) {
        // Hapus produk berdasarkan index dari array yang terfilter, lalu cari index aslinya di array products
        const productToDelete = filteredProducts[i];
        if (confirm("Hapus produk " + productToDelete.name + " ?")) {
            const originalIndex = products.findIndex(p => p.id === productToDelete.id);
            if (originalIndex > -1) {
                products.splice(originalIndex, 1);
                saveProducts();
                filterProducts(); // Perbarui tampilan setelah menghapus
            }
        }
    }

    function filterProducts() {
        const key = document.getElementById('searchInput').value.toLowerCase();
        filteredProducts = products.filter(p => p.name.toLowerCase().includes(key));
        renderProducts();
    }

    document.getElementById('productImage').addEventListener('change', e => {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        if (file) {
            const reader = new FileReader();
            reader.onload = ev => {
                preview.src = ev.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });
    
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

    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Panggil fungsi untuk memuat data saat halaman dimuat
    loadProducts();
    renderProducts();
</script>

</body>
</html>
