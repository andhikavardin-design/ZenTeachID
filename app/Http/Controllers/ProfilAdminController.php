<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilAdminController extends Controller
{
    /**
     * Menampilkan halaman profil admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil data admin yang sedang login
        $admin = Auth::user();

        // Mengembalikan view dengan data admin
        return view('admin.profil', compact('admin'));
    }
}
