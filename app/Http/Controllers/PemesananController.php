<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Tampilkan halaman daftar pemesanan produk di panel admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.pemesanan_produk');
    }
}