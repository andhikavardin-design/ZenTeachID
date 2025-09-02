<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\PromosiAdminController;
use App\Http\Controllers\FotoProfilController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KomentarPenggunaController;
use App\Http\Controllers\ProfilPenggunaController;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\KomentarAdminController;
use App\Http\Controllers\QrCodeController; // 🔹 Tambahan

// --------------- Rute untuk Pengguna Umum ---------------
Route::get('/', fn() => view('auth.land_page'));

// Auth User
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman umum
Route::get('/halaman_utama', [HomeController::class, 'index'])->name('halaman_utama');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

// Halaman Promosi Publik
Route::get('/promosi', [PromosiController::class, 'index'])->name('promosi.index');

// Diubah: Menggunakan ProfilPenggunaController untuk rute profil
Route::get('/profil', [ProfilPenggunaController::class, 'index'])->name('profil');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');

// ======= FOTO PROFIL USER =======
Route::get('/foto_profil', [FotoProfilController::class, 'index'])->name('foto_profil');
Route::post('/foto_profil', [FotoProfilController::class, 'update'])->name('foto_profil.update');

// Rute untuk halaman komentar pengguna
Route::get('/komentar_pengguna', [KomentarPenggunaController::class, 'index'])->name('komentar_pengguna');
Route::post('/komentar_pengguna', [KomentarPenggunaController::class, 'store'])->name('komentar_pengguna.store');

// --------------- Rute Login Admin Manual (Session) ----------------
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.post');

// --------------- Rute khusus Admin (pakai middleware session manual) ----------------
Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Logout Admin
    Route::post('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

    // Rute untuk Halaman Profil Admin
    Route::get('/profil', [ProfilAdminController::class, 'index'])->name('admin.profil.index');
    
    // Rute untuk Halaman Komentar Admin
    Route::get('/komentar', [KomentarAdminController::class, 'index'])->name('admin.komentar.index');

    // ======= FOTO PROFIL ADMIN =======
    Route::view('/foto-profil', 'admin.foto_profil')->name('admin.foto_profil');
    Route::post('/foto-profil', [LoginAdminController::class, 'updatePhoto'])->name('admin.foto_profil.post');

    // ======= PRODUK ADMIN =======
    Route::prefix('produk')->name('admin.produk.')->group(function () {
        Route::get('/', [ProdukAdminController::class, 'index'])->name('index');
        Route::get('/create', [ProdukAdminController::class, 'create'])->name('create');
        Route::post('/', [ProdukAdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProdukAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProdukAdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProdukAdminController::class, 'destroy'])->name('destroy');
    });

    // ======= PROMOSI ADMIN =======
    Route::prefix('promosi')->name('admin.promosi.')->group(function () {
        Route::get('/', [PromosiAdminController::class, 'index'])->name('index');
        Route::get('/create', [PromosiAdminController::class, 'create'])->name('create');
        Route::post('/', [PromosiAdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PromosiAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PromosiAdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [PromosiAdminController::class, 'destroy'])->name('destroy');
    });

    // Rute untuk Pemesanan Produk Admin
    Route::get('/pemesanan_produk', [PemesananController::class, 'index'])->name('admin.pemesanan_produk');
});

// --------------- Rute Tambahan untuk QR Code ----------------
Route::get('/landpage', [QrCodeController::class, 'landPage'])->name('landpage');
Route::get('/qrcode', [QrCodeController::class, 'showQrCode'])->name('qrcode');
