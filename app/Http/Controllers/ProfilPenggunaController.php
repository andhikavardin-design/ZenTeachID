<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilPenggunaController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.profil');
    }
}