<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    // Halaman landpage
    public function landPage()
    {
        return view('auth.land_page');
    }

    // Halaman QR Code
    public function showQrCode()
    {
        $url = url('/landpage'); // URL otomatis ke landpage
        return view('auth.qrcode', compact('url'));
    }
}
