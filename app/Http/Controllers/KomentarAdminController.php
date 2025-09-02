<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarAdminController extends Controller
{
    /**
     * Menampilkan semua komentar pengguna untuk admin.
     * Admin hanya bisa melihat, tidak bisa menambah atau mengubah komentar.
     */
    public function index()
    {
        // Mengambil semua komentar dari tabel 'komentar'
        // Menggunakan with('user') untuk mengambil data pengguna terkait
        $komentarData = Komentar::with('user')->get();

        // Mengirim data komentar ke tampilan
        return view('admin.komentar_admin', compact('komentarData'));
    }
}
