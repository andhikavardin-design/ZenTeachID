<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Foto Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body, html { font-family: 'Poppins', sans-serif; background-color: #0f0f0f; color: white; min-height: 100vh; }
        header { padding: 10px 40px; background: rgba(0, 0, 0, 0.9); display: flex; justify-content: space-between; align-items: center; }
        .logo { display: flex; align-items: center; }
        .logo-img { height: 40px; }
        .logo-text { font-family: 'Poppins', cursive; font-size: 1.3em; font-weight: 100; margin-left: 10px; color: #00c2ff; }
        nav { display: flex; align-items: center; }
        nav a { margin-left: 20px; text-decoration: none; color: white; font-weight: bold; font-size: 15px; }
        nav a:hover { color: #00e0ff; }
        .dropdown { position: relative; display: inline-block; }
        .dropdown-content { display: none; position: absolute; background-color: #1a1a1a; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; border-radius: 5px; top: 100%; left: 0; margin-top: 0; padding-top: 10px; }
        .dropdown-content a { color: white; padding: 12px 16px; text-decoration: none; display: block; text-align: left; margin: 0; font-weight: normal; }
        .dropdown-content a:hover { background-color: #00c2ff; color: black; }
        .dropdown:hover .dropdown-content { display:block; }
        .nav-icon { display:flex; align-items:center; text-decoration:none; color:white; font-weight:bold; margin-left:20px; font-size:1.4em; }
        .nav-icon:hover{ color:#00e0ff; }
        .nav-icon .fas{ font-size:1.2em; color:#00c2ff; }
        .nav-icon:hover .fas{ color:#00e0ff; }
        .container{ max-width:600px; margin:80px auto; padding:40px; background:rgba(255,255,255,0.05); border-radius:15px; box-shadow:0 0 15px rgba(0,0,0,0.4); text-align:center; }
        h2{ color:#00e0ff; margin-bottom:20px; }
        p.profile-info{ margin-top:10px; color:#e0e0e0; font-size:1em; }
        
        .profile-pic-container{ position:relative; width:150px; height:150px; margin:0 auto 30px; }
        .profile-pic{ width:100%; height:100%; border-radius:50%; object-fit:cover; border:3px solid #00c2ff; box-shadow:0 0 10px rgba(0,0,0,0.5); }
        .profile-pic-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
            cursor: pointer;
        }
        .profile-pic-overlay:hover {
            opacity: 1;
        }
        .profile-pic-overlay .fas {
            color: white;
            font-size: 2em;
        }
        
        .btn-container{ margin-top:20px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap; }
        .btn{ padding:10px 20px; border:none; border-radius:10px; font-weight:bold; cursor:pointer; transition:background 0.3s; margin:5px; }
        .btn-edit{background:#00e0ff;color:#000;}
        .btn-edit:hover{background:#00c2e0;}
        .btn-logout{background:#ff4444;color:#fff;}
        .btn-logout:hover{background:#cc0000;}
        
        /* Tambahan CSS untuk formulir edit */
        .edit-form {
            display: none; /* Awalnya tersembunyi */
            text-align: left;
            margin-top: 20px;
        }
        .edit-form label {
            display: block;
            margin-top: 10px;
            color: #00c2ff;
        }
        .edit-form input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #333;
            background-color: #1a1a1a;
            color: white;
        }
        .edit-form .form-btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .edit-form .btn-save { background-color: #00c2ff; color: #0f0f0f; }
        .edit-form .btn-cancel { background-color: #555; color: white; }
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
              <a href="{{ route('produk') }}">Produk</a>
              <a href="{{ route('promosi.index') }}">Promosi</a>
            </div>
        </div>
        <a href="{{ url('profil') }}">Profil</a>
        <a href="{{ route('keranjang') }}" class="nav-icon"><i class="fas fa-shopping-cart"></i></a>
        </a>
        <a href="#" class="nav-icon profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </nav>
</header>

<div class="container">
    <div class="profile-pic-container">
        <img id="profile-pic" src="{{ asset('assets/profile_pics/default.png') }}" alt="Foto Profil" class="profile-pic">
        <div class="profile-pic-overlay" id="upload-overlay">
            <i class="fas fa-plus"></i>
        </div>
        <input type="file" id="photo-upload" style="display: none;" accept="image/*">
    </div>
     
    {{-- Info Profil yang ditampilkan --}}
    <div id="profile-info-display">
        <h2 id="username-display">{{ Auth::user()->username }}</h2>
        <p class="profile-info" id="email-display">Email: {{ Auth::user()->email }}</p>
        <p class="profile-info" id="phone-display">Nomor Telepon: </p>
    </div>

    {{-- Formulir Edit yang tersembunyi --}}
    <form id="edit-profile-form" class="edit-form">
        <label for="username">Nama Pengguna:</label>
        <input type="text" id="username" name="username" value="{{ Auth::user()->username }}" readonly>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
        
        <label for="phone">Nomor Telepon:</label>
        <input type="tel" id="phone" name="phone">

        <div class="form-btn-container">
            <button type="button" id="saveBtn" class="btn btn-save">Simpan</button>
            <button type="button" id="cancelBtn" class="btn btn-cancel">Batal</button>
        </div>
    </form>
    
    {{-- Tombol (Edit & Logout) --}}
    <div class="btn-container" id="main-btn-container">
        <button id="editBtn" class="btn btn-edit">Edit</button>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>
</div>

<script>
    const editBtn = document.getElementById('editBtn');
    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const profileInfoDisplay = document.getElementById('profile-info-display');
    const editForm = document.getElementById('edit-profile-form');
    const mainBtnContainer = document.getElementById('main-btn-container');

    // Elemen untuk upload foto
    const uploadOverlay = document.getElementById('upload-overlay');
    const photoUploadInput = document.getElementById('photo-upload');
    const profilePic = document.getElementById('profile-pic');
    
    // Dapatkan username pengguna yang sedang login untuk digunakan sebagai kunci localStorage
    const currentUser = document.getElementById('username-display').innerText;

    // --- FUNGSI UNTUK MEMUAT DATA DARI LOCALSTORAGE ---
    function loadProfileData() {
        const userData = JSON.parse(localStorage.getItem(currentUser));
        if (userData) {
            // Perbarui tampilan informasi profil
            document.getElementById('email-display').innerText = 'Email: ' + (userData.email || '{{ Auth::user()->email }}');
            document.getElementById('phone-display').innerText = 'Nomor Telepon: ' + (userData.phone || '');
            
            // Perbarui nilai di formulir edit
            document.getElementById('email').value = userData.email || '';
            document.getElementById('phone').value = userData.phone || '';
            
            // Muat foto profil dari localStorage jika ada
            if (userData.profilePic) {
                profilePic.src = userData.profilePic;
            }
        } else {
            // Jika tidak ada data di localStorage, gunakan data default dari Laravel
            document.getElementById('email-display').innerText = 'Email: {{ Auth::user()->email }}';
            document.getElementById('phone-display').innerText = 'Nomor Telepon: ';
            document.getElementById('email').value = '{{ Auth::user()->email }}';
            document.getElementById('phone').value = '';
        }
    }
    
    // Panggil fungsi ini saat halaman dimuat
    window.addEventListener('load', loadProfileData);

    // --- FUNGSI UNTUK TOMBOL EDIT ---
    editBtn.addEventListener('click', function() {
        profileInfoDisplay.style.display = 'none';
        mainBtnContainer.style.display = 'none';
        editForm.style.display = 'block';
    });
    
    cancelBtn.addEventListener('click', function() {
        // Muat ulang data dari localStorage untuk mengabaikan perubahan
        loadProfileData();
        editForm.style.display = 'none';
        profileInfoDisplay.style.display = 'block';
        mainBtnContainer.style.display = 'flex';
    });

    saveBtn.addEventListener('click', function() {
        const newEmail = document.getElementById('email').value;
        const newPhone = document.getElementById('phone').value;
        
        // Buat objek untuk disimpan
        const userData = {
            email: newEmail,
            phone: newPhone,
            profilePic: profilePic.src
        };
        
        // Simpan data ke localStorage dengan nama pengguna sebagai kunci unik
        localStorage.setItem(currentUser, JSON.stringify(userData));
        
        // Perbarui tampilan informasi yang ditampilkan di halaman
        document.getElementById('email-display').innerText = 'Email: ' + newEmail;
        document.getElementById('phone-display').innerText = 'Nomor Telepon: ' + (newPhone ? newPhone : '');
        
        alert('Profil berhasil diperbarui!');
        
        // Sembunyikan formulir dan tampilkan info profil
        editForm.style.display = 'none';
        profileInfoDisplay.style.display = 'block';
        mainBtnContainer.style.display = 'flex';
    });

    // --- FUNGSI UNTUK UPLOAD FOTO PROFIL ---
    uploadOverlay.addEventListener('click', function() {
        photoUploadInput.click();
    });

    photoUploadInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePic.src = e.target.result;
                
                // Muat data yang sudah ada, lalu perbarui foto profil
                const userData = JSON.parse(localStorage.getItem(currentUser)) || {};
                userData.profilePic = e.target.result;
                localStorage.setItem(currentUser, JSON.stringify(userData));
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>