<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Promosi</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS yang sama persis dengan yang Anda berikan */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { height: 100%; font-family: 'Segoe UI', sans-serif; color: white; background: #0f0f0f; }
        header { padding: 10px 40px; background: rgba(0,0,0,0.9); display: flex; justify-content: space-between; align-items: center; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 40px; }
        .logo-text { font-family: 'Poppins', cursive; font-size: 1.40em; font-weight: 100; margin-left: 10px; color: #00c2ff; letter-spacing: 1px; }

        nav { display: flex; align-items: center; }
        nav a { margin-left: 20px; text-decoration: none; color: white; font-weight: bold; font-size: 15px; transition: color 0.3s; }
        nav a:hover { color: #00e0ff; }

        .nav-icon {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            margin-left: 20px;
            font-size: 1.4em;
        }

        .nav-icon:hover { color: #00e0ff; }

        .nav-icon .fas { font-size: 1.2em; color: #00e0ff; }
        .nav-icon:hover .fas { color: #00e0ff; }

        /* Dropdown CSS */
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1a1a1a;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            top: 100%;
            left: 0;
            margin-top: 0;
            padding-top: 10px;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            margin: 0;
            font-weight: normal;
        }
        .comment-item .rating { color: #ffd700; font-size: 16px; margin-left: 10px; }

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
        .buy-btn { padding: 10px 20px; background: gray; color: #eee; font-weight: bold; border: none; border-radius: 8px; cursor: not-allowed; }
        .buy-btn:hover { background: #888; }
        .search-form { text-align: center; margin-bottom: 30px; }
        .search-form input { padding: 10px; width: 300px; border-radius: 10px; border: none; outline: none; }
        .search-form button { padding: 10px 20px; margin-left: 10px; background-color: #00e0ff; border: none; border-radius: 10px; color: black; font-weight: bold; cursor: pointer; }
        .no-result { text-align: center; color: #aaa; font-style: italic; margin-top: 20px; }
        .action-bar { text-align: center; margin-bottom: 20px; }
        .action-bar button { padding: 10px 20px; background-color: #28a745; border: none; border-radius: 10px; color: white; font-weight: bold; cursor: pointer; }
        .edit-button, .delete-button { position: absolute; top: 10px; font-size: 12px; padding: 5px 8px; border-radius: 6px; cursor: pointer; border: none; }
        .edit-button { right: 58px; background-color: #ffc107; color: #000; }
        .delete-button { right: 10px; background-color: #dc3545; color: #fff; }

        /* Tambahan CSS untuk harga promo */
        .price-container { display: flex; flex-direction: column; align-items: center; }
        .old-price { text-decoration: line-through; color: #888; font-size: 14px; margin-bottom: -5px; }
        .new-price { font-size: 1.2em; color: #00e0ff; font-weight: bold; }
        
        /* Modal Styles untuk deskripsi produk dan komentar */
        #descriptionModal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); justify-content: center; align-items: center; z-index: 1000; }
        #descriptionModal .modal-content {
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
        }
        #descriptionModal .modal-content img { max-width: 80%; border-radius: 10px; margin-bottom: 15px; }
        #descriptionModal .modal-content h3 { color: #00e0ff; margin-bottom: 10px; }
        #descriptionModal .modal-content p { color: #ccc; margin-bottom: 20px; text-align: left; }
        #descriptionModal .close-btn { position: absolute; top: 10px; right: 15px; font-size: 24px; font-weight: bold; cursor: pointer; color: white; }

        /* Gaya untuk Komentar */
        .comments-section { text-align: left; margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255, 255, 0, 0.1); }
        .comment-list { max-height: 200px; overflow-y: auto; margin-top: 20px; }
        .comment-item { background: rgba(246, 255, 0, 0.05); padding: 15px; border-radius: 10px; margin-bottom: 10px; }
        .comment-item .user-info { font-size: 14px; font-weight: bold; color: #00e0ff; }
        .comment-item .rating { color: #ffd700; }
        .comment-item .user-comment { margin-top: 5px; font-size: 14px; }

        /* Gaya untuk modal Edit Produk */
        #editModal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); justify-content: center; align-items: center; z-index: 1000; }
        #editModal .modal-content { position: relative; background: #1e1e1e; padding: 15px; border-radius: 8px; max-width: 300px; width: 90%; color: white; }
        #editModal input, #editModal textarea { width: 100%; margin-bottom: 6px; padding: 5px; border-radius: 5px; border: none; outline: none; font-size: 12px; }
        #editModal textarea { rows: 2; }
        #editModal input[type="file"] { background: #2a2a2a; color: white; }
        #editModal button { padding: 5px 8px; font-size: 12px; background: #00e0ff; border: none; border-radius: 8px; cursor: pointer; color: black; font-weight: bold; }
        #editModal button + button { margin-left: 5px; }
        #imagePreview { max-width: 100%; border-radius: 10px; margin-bottom: 10px; display: none; }
        #editModal .close-btn { position: absolute; top: 5px; right: 10px; font-size: 20px; font-weight: bold; cursor: pointer; color: white; }
        
        /* Tambahan styling untuk input harga lama */
        #oldPrice { width: 100%; margin-bottom: 6px; padding: 5px; border-radius: 5px; border: none; outline: none; font-size: 12px; }

        /* CSS untuk deskripsi yang dapat di-scroll */
        .card-text-container {
            height: 60px;
            overflow-y: auto;
            padding: 0 5px;
            margin-bottom: 10px;
        }
        .card-text-container p {
            margin: 0;
            font-size: 14px;
            color: #ccc;
            text-align: left;
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

<div class="product-page">
    <h2>Daftar Promosi ASUS</h2>
    <div class="action-bar">
        <button onclick="openAddModal()">+ Tambah Produk</button>
    </div>
    <form class="search-form" onsubmit="event.preventDefault(); filterPromotions();">
        <input type="text" id="searchInput" placeholder="Cari produk ASUS...">
        <button type="submit">Cari</button>
    </form>
    <div class="products" id="productGrid"></div>
</div>

<div id="descriptionModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeDescriptionModal()">&times;</span>
        <img id="descImage" src="" alt="Product Image">
        <h3 id="descName"></h3>
        <p>Harga: <strong id="descPrice"></strong></p>
        <p id="descDescription"></p>
        <div class="comments-section">
            <h4>Komentar Pengguna</h4>
            <div id="commentList" class="comment-list"></div>
        </div>
    </div>
</div>

<div id="editModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h3 id="modalTitle">Edit Produk</h3>
        <input type="hidden" id="editProductIndex">
        <input type="text" id="productName" placeholder="Nama Produk">
        <input type="number" id="oldPrice" placeholder="Harga Normal">
        <input type="number" id="productPrice" placeholder="Harga Promo">
        <textarea id="productDescription" rows="4" placeholder="Deskripsi Produk"></textarea>
        <input type="file" id="productImage">
        <img id="imagePreview" src="" alt="Preview Gambar">
        <button id="saveButton" onclick="savePromotion()">Simpan Perubahan</button>
        <button onclick="closeEditModal()" style="background: #ccc; color: black;">Batal</button>
    </div>
</div>

<script>
    // Data promosi awal
    const initialPromotions = [
        {
            id: '1',
            name: 'ASUS ROG Zephyrus G14',
            price: 25000000,
            oldPrice: 28000000,
            description: 'Laptop gaming ultra-portabel dengan performa tinggi. Cocok untuk gamer dan kreator konten yang sering bepergian.',
            image: 'Video/A.jpg'
        },
        {
            id: '2',
            name: 'ASUS TUF Gaming A15',
            price: 15500000,
            oldPrice: 17000000,
            description: 'Laptop gaming tangguh dengan daya tahan baterai luar biasa dan harga yang terjangkau. Ideal untuk gaming kasual.',
            image: 'Video/B.jpg'
        },
        {
            id: '3',
            name: 'ASUS Zenbook 14X OLED',
            price: 19800000,
            oldPrice: 21500000,
            description: 'Laptop premium dengan layar OLED yang memukau. Desain tipis dan ringan, sempurna untuk profesional.',
            image: 'Video/C.jpg'
        },
        {
            id: '4',
            name: 'ASUS Vivobook Pro 15',
            price: 13900000,
            oldPrice: 15000000,
            description: 'Laptop andal untuk produktivitas sehari-hari dan hiburan, dilengkapi layar NanoEdge yang imersif.',
            image: 'Video/D.jpg'
        }
    ];
    
    // Ganti variabel products menjadi promotions
    let promotions = [];

    // Fungsi untuk memuat promosi dari localStorage menggunakan kunci 'promotions'
    function loadPromotions() {
        try {
            const storedPromotions = localStorage.getItem('promotions');
            if (storedPromotions) {
                promotions = JSON.parse(storedPromotions);
            } else {
                promotions = initialPromotions;
                savePromotions(); // Simpan data awal ke localStorage
            }
        } catch (e) {
            console.error("Gagal memuat promosi dari localStorage", e);
            promotions = initialPromotions;
        }
    }

    // Fungsi untuk menyimpan promosi ke localStorage menggunakan kunci 'promotions'
    function savePromotions() {
        try {
            localStorage.setItem('promotions', JSON.stringify(promotions));
        } catch (e) {
            console.error("Gagal menyimpan promosi ke localStorage", e);
        }
    }

    /* ==================== UTILITIES ==================== */
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    function loadComments(productName) {
        try {
            const stored = JSON.parse(localStorage.getItem('comments')) || {};
            return stored[productName] || [];
        } catch (e) { return []; }
    }

    /* ==================== RENDER PROMOSI ==================== */
    function renderPromotions(filteredPromotions = promotions) {
        const grid = document.getElementById('productGrid');
        grid.innerHTML = '';
        if (filteredPromotions.length === 0) {
            grid.innerHTML = '<div class="no-result">Promosi tidak ditemukan.</div>';
        } else {
            filteredPromotions.forEach((item, index) => {
                let imgSrc = item.image.startsWith("data:image") ? item.image : "{{ asset('') }}" + item.image;
                const card = document.createElement('div');
                card.className = 'card';
                
                let priceHTML = `<p>Rp ${numberWithCommas(item.price)}</p>`;
                if (item.oldPrice && item.oldPrice > item.price) {
                    priceHTML = `<div class="price-container"><p class="old-price">Rp ${numberWithCommas(item.oldPrice)}</p><p class="new-price">Rp ${numberWithCommas(item.price)}</p></div>`;
                }

                card.innerHTML = `
                    <button class="edit-button" onclick="event.stopPropagation(); openEditModal(${index})">Edit</button>
                    <button class="delete-button" onclick="event.stopPropagation(); deletePromotion(${index})">Hapus</button>
                    <img src="${imgSrc}" alt="${item.name}" onerror="this.src='{{ asset('images/placeholder.jpg') }}';">
                    <h3>${item.name}</h3>
                    <div class="card-text-container">
                        <p>${item.description}</p>
                    </div>
                    ${priceHTML}
                    <p style="color:#ccc;font-size:14px;">Pembelian hanya khusus user.</p>
                    <button class="buy-btn" disabled>Gunakan akun user</button>
                `;
                card.onclick = () => showDescriptionModal(item);
                grid.appendChild(card);
            });
        }
    }

    /* ==================== MODAL DETAIL ==================== */
    function showDescriptionModal(promotion) {
        let imgSrc = promotion.image.startsWith("data:image") ? promotion.image : "{{ asset('') }}" + promotion.image;
        document.getElementById('descImage').src = imgSrc;
        document.getElementById('descName').innerText = promotion.name;
        
        let priceText = `Rp ${numberWithCommas(promotion.price)}`;
        if (promotion.oldPrice && promotion.oldPrice > promotion.price) {
            priceText = `Rp ${numberWithCommas(promotion.price)} (Harga Normal: Rp ${numberWithCommas(promotion.oldPrice)})`;
        }
        document.getElementById('descPrice').innerText = priceText;
        
        document.getElementById('descDescription').innerText = promotion.description;
        const comments = loadComments(promotion.name);
        const commentList = document.getElementById('commentList');
        commentList.innerHTML = comments.length === 0 ? '<div>Belum ada komentar.</div>' : '';
        comments.forEach(c => {
            const div = document.createElement('div');
            div.className = 'comment-item';
            div.innerHTML = `<p class="user-info"><b>${c.username}</b> <span class="rating">${'★'.repeat(c.rating)}</span></p><p class="user-comment">${c.komentar}</p>`;
            commentList.appendChild(div);
        });
        document.getElementById('descriptionModal').style.display = 'flex';
    }
    function closeDescriptionModal(){ document.getElementById('descriptionModal').style.display='none'; }

    /* ==================== MODAL EDIT/TAMBAH ==================== */
    function openAddModal() {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('modalTitle').innerText = 'Tambah Produk';
        document.getElementById('productName').value = '';
        document.getElementById('productPrice').value = '';
        document.getElementById('oldPrice').value = '';
        document.getElementById('productDescription').value = '';
        document.getElementById('productImage').value = '';
        document.getElementById('imagePreview').style.display = 'none';
        document.getElementById('saveButton').innerText = 'Tambah Produk';
        document.getElementById('editProductIndex').value = '';
    }
    function openEditModal(i) {
        const p = promotions[i]; // Menggunakan variabel promotions
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('modalTitle').innerText = 'Edit Produk';
        document.getElementById('productName').value = p.name;
        document.getElementById('productPrice').value = p.price;
        document.getElementById('oldPrice').value = p.oldPrice || '';
        document.getElementById('productDescription').value = p.description;
        document.getElementById('productImage').value = '';
        let imgSrc = p.image.startsWith("data:image") ? p.image : "{{ asset('') }}" + p.image;
        document.getElementById('imagePreview').src = imgSrc;
        document.getElementById('imagePreview').style.display = 'block';
        document.getElementById('saveButton').innerText = 'Simpan Perubahan';
        document.getElementById('editProductIndex').value = i;
    }
    function closeEditModal(){ document.getElementById('editModal').style.display='none'; }

    /* ==================== SIMPAN / HAPUS ==================== */
    function savePromotion() {
        const name = document.getElementById('productName').value;
        const price = document.getElementById('productPrice').value;
        const oldPrice = document.getElementById('oldPrice').value;
        const desc = document.getElementById('productDescription').value;
        const file = document.getElementById('productImage').files[0];
        const index = document.getElementById('editProductIndex').value;
        const isEdit = index !== '';
        if (!name || !price) {
            alert('Nama & Harga wajib diisi');
            return;
        }

        if (file) {
            const r = new FileReader();
            r.onload = e => {
                const newP = {
                    id: isEdit ? promotions[index].id : (promotions.length + 1).toString(),
                    name,
                    price: parseInt(price),
                    oldPrice: oldPrice ? parseInt(oldPrice) : null,
                    description: desc,
                    image: e.target.result
                };
                if(isEdit){ promotions[index] = newP; } else { promotions.push(newP); }
                savePromotions(); // Memanggil fungsi savePromotions
                renderPromotions(); // Memanggil fungsi renderPromotions
                closeEditModal();
            };
            r.readAsDataURL(file);
        } else {
            const newP = {
                id: isEdit ? promotions[index].id : (promotions.length + 1).toString(),
                name,
                price: parseInt(price),
                oldPrice: oldPrice ? parseInt(oldPrice) : null,
                description: desc,
                image: isEdit ? promotions[index].image : 'images/placeholder.jpg'
            };
            if(isEdit){ promotions[index] = newP; } else { promotions.push(newP); }
            savePromotions(); // Memanggil fungsi savePromotions
            renderPromotions(); // Memanggil fungsi renderPromotions
            closeEditModal();
        }
    }
    function deletePromotion(i){
        if(confirm("Hapus produk " + promotions[i].name + " ?")){
            promotions.splice(i,1); // Menggunakan variabel promotions
            savePromotions(); // Memanggil fungsi savePromotions
            renderPromotions(); // Memanggil fungsi renderPromotions
        }
    }

    /* ==================== SEARCH ==================== */
    function filterPromotions() {
        const key = document.getElementById('searchInput').value.toLowerCase();
        renderPromotions(promotions.filter(p => p.name.toLowerCase().includes(key)));
    }

    /* ==================== PREVIEW FILE ==================== */
    document.getElementById('productImage').addEventListener('change', e => {
        const f = e.target.files[0];
        const prev = document.getElementById('imagePreview');
        if(f){
            const r = new FileReader();
            r.onload = ev => {
                prev.src = ev.target.result;
                prev.style.display = 'block';
            };
            r.readAsDataURL(f);
        } else {
            prev.src = '';
            prev.style.display = 'none';
        }
    });

    /* ==================== START ==================== */
    loadPromotions();
    renderPromotions();
</script>

</body>
</html>