<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Komentar; // Asumsi Anda punya model Komentar

class KomentarPenggunaController extends Controller
{
    /**
     * Menampilkan halaman komentar.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mendapatkan semua komentar dari database, diurutkan dari yang terbaru
        $komentarData = Komentar::latest()->get();

        return view('auth.komentar_pengguna', compact('komentarData'));
    }

    /**
     * Menyimpan komentar baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pesan' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Cek apakah user sudah login
        if (Auth::check()) {
            $username = Auth::user()->username; // Mengambil username dari user yang sedang login

            // Buat instance model Komentar baru
            $komentar = new Komentar();
            $komentar->username = $username;
            $komentar->pesan = $request->input('pesan');
            $komentar->rating = $request->input('rating');
            $komentar->save(); // Simpan komentar ke database

            return redirect()->route('komentar_pengguna')->with('success', 'Komentar berhasil dikirim!');
        }

        return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim komentar.');
    }
}