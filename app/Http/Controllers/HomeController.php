<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama.
     */
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = auth()->user();

        // Mengambil nama pengguna dari model User
        $nama_pengguna = $user ? $user->username : 'Pengguna';

        // Ambil data promosi terbaru
        $promotions_data = DB::table('promosi')
                           ->orderBy('id', 'desc')
                           ->limit(3)
                           ->get();

        // Mengubah path view dari 'halaman_utama' menjadi 'auth.halaman_utama'
        // Ini karena file view sekarang berada di dalam folder 'auth'
        return view('auth.halaman_utama', compact('nama_pengguna', 'promotions_data'));
    }
}
