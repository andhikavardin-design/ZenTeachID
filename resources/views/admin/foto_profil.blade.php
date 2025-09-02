<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Foto Profil Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Gaya CSS */
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
        .edit-icon{ position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); background-color:rgba(0,0,0,0.7); color:white; width:50px;height:50px;border-radius:50%;display:none;justify-content:center; align-items:center; font-size:1.5em; cursor:pointer; z-index:10; }
        .edit-icon:hover{ background:#00e0ff; }
        .btn-container{ margin-top:20px; display:flex; justify-content:center; gap:10px; flex-wrap:wrap; }
        .btn{ padding:10px 20px; border:none; border-radius:10px; font-weight:bold; cursor:pointer; transition:background 0.3s; margin:5px; }
        .btn-edit{background:#00e0ff;color:#000;}
        .btn-edit:hover{background:#00c2e0;}
        .btn-save{background:#4CAF50;color:#fff;}
        .btn-save:hover{background:#45a049;}
        .btn-cancel{background:#888;color:#fff;}
        .btn-cancel:hover{background:#666;}
        .btn-logout{background:#ff4444;color:#fff;}
        .btn-logout:hover{background:#cc0000;}
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="../Video/A.jpg" alt="Logo ZenTechID" class="logo-img">
        <span class="logo-text">ZenTechID</span>
    </div>
    <nav>
        <a href="/admin/dashboard">Beranda</a>
        <div class="dropdown">
            <a href="#">Produk</a>
            <div class="dropdown-content">
              <a href="{{ route('admin.produk.index') }}">Produk</a>
                <a href="{{ route('admin.promosi.index') }}">Promosi</a>
            </div>
        </div>
        <a href="{{ route('admin.profil.index') }}">Profil</a>
        <a href="#" class="nav-icon cart-icon">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="#" class="nav-icon profile-icon">
            <i class="fas fa-user-circle"></i>
        </a>
    </nav>
</header>

@php
    // Ambil dari session atau default
    $profile_pic = session('admin_profile_pic', 'default.png');
    $username = 'ZenTeachID';
    $gmail = 'ZenTeachID@gmail.com';
    $no_telp = '082123456789';
@endphp

<div class="container">
    <div class="profile-pic-container">
        <img src="{{ asset('assets/profile_pics/'.$profile_pic) }}" alt="Foto Profil" class="profile-pic" id="profileImage">

        <div class="edit-icon" id="editIcon" onclick="document.getElementById('profile_pic_input').click()">
            <i class="fas fa-plus"></i>
        </div>

        <form id="uploadForm" action="{{ route('admin.foto_profil.post') }}" method="POST" enctype="multipart/form-data" style="display:none;">
            @csrf
            <input type="file" name="profile_pic" id="profile_pic_input" onchange="previewFile()">
        </form>
    </div>
    
    <h2>{{ $username }}</h2><h4>Admin</h4>
    <p class="profile-info">Email: {{ $gmail }}</p>
    <p class="profile-info">Nomor Telepon: {{ $no_telp }}</p>

    {{-- Tombol default (Edit + Logout) --}}
    <div class="btn-container" id="defaultButtons">
        <button id="editBtn" class="btn btn-edit" onclick="showEditMode()">Edit</button>

        <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
        </form>
    </div>

    {{-- Tombol saat mode edit (Save + Cancel) --}}
    <div class="btn-container" id="editButtons" style="display: none;">
        <button type="button" class="btn btn-save" onclick="saveProfile()">Save</button>
        <button type="button" class="btn btn-cancel" onclick="cancelEdit()">Batal</button>
    </div>
</div>

<script>
    let originalProfilePic = document.getElementById('profileImage').src;

    // === Ambil dari localStorage kalau ada ===
    window.onload = function () {
        const savedImage = localStorage.getItem('profileImage');
        if (savedImage) {
            document.getElementById('profileImage').src = savedImage;
            originalProfilePic = savedImage;
        }
    };

    function showEditMode() {
        document.getElementById('editIcon').style.display = 'flex';
        document.getElementById('defaultButtons').style.display = 'none';
        document.getElementById('editButtons').style.display = 'flex';
    }

    function previewFile() {
        const fileInput = document.getElementById('profile_pic_input');
        const previewImage = document.getElementById('profileImage');
        const file = fileInput.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    function saveProfile() {
        const previewImage = document.getElementById('profileImage');

        // Simpan gambar ke localStorage
        localStorage.setItem('profileImage', previewImage.src);

        // Submit form ke server (kalau mau benar-benar tersimpan di database)
        document.getElementById('uploadForm').submit();
    }

    function cancelEdit() {
        document.getElementById('profileImage').src = originalProfilePic;
        document.getElementById('profile_pic_input').value = null;
        document.getElementById('editIcon').style.display = 'none';
        document.getElementById('defaultButtons').style.display = 'flex';
        document.getElementById('editButtons').style.display = 'none';
    }
</script>

</body>
</html>
