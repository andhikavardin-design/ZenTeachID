<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProdukController extends Controller
{
    public function index()
    {
        // Data produk Anda
        $products_data = [
            [
                'id' => 1,
                'name' => 'ASUS ROG Zephyrus G14',
                'description' => 'Laptop gaming ultra-portabel dengan performa tinggi. Ditenagai oleh AMD Ryzen dan NVIDIA GeForce RTX.',
                'price' => 25000000,
                'image' => '../Video/zephyrus.jpg'
            ],
            [
                'id' => 2,
                'name' => 'ASUS ZenBook Pro Duo',
                'description' => 'Laptop inovatif dengan layar ganda untuk kreativitas tanpa batas. Cocok untuk para profesional kreatif.',
                'price' => 32000000,
                'image' => '../Video/zenbook.jpg'
            ],
            [
                'id' => 3,
                'name' => 'ASUS VivoBook S15',
                'description' => 'Laptop yang stylish dan ringan, sempurna untuk penggunaan sehari-hari dan produktivitas. Tersedia dalam berbagai warna.',
                'price' => 12500000,
                'image' => '../Video/vivobook.jpg'
            ],
            [
                'id' => 4,
                'name' => 'ASUS TUF Gaming F15',
                'description' => 'Laptop gaming tangguh dengan daya tahan militer. Menawarkan keseimbangan antara harga dan performa.',
                'price' => 18000000,
                'image' => '../Video/tuf.jpg'
            ],
            [
                'id' => 5,
                'name' => 'ASUS ROG Strix Scar 17',
                'description' => 'Dirancang untuk para gamer profesional. Menawarkan performa e-sports kelas atas dengan spesifikasi terbaik.',
                'price' => 45000000,
                'image' => '../Video/strix.jpg'
            ],
            [
                'id' => 6,
                'name' => 'ASUS ROG Ally',
                'description' => 'Konsol game genggam berbasis Windows. Bermain game PC AAA di mana saja, kapan saja.',
                'price' => 11000000,
                'image' => '../Video/rog_ally.jpg'
            ],
            [
                'id' => 7,
                'name' => 'ASUS ROG G22',
                'description' => 'PC gaming ringkas dengan desain futuristik. Performa tinggi untuk gaming intensif dalam bentuk yang ramping.',
                'price' => 28500000,
                'image' => '../Video/rog_g22.jpg'
            ],
            [
                'id' => 8,
                'name' => 'ASUS ROG Swift OLED PG27AQDM',
                'description' => 'Monitor gaming OLED 27 inci dengan refresh rate 240 Hz. Memberikan visual yang sangat tajam dan responsif.',
                'price' => 15000000,
                'image' => '../Video/monitor.jpg'
            ],
            [
                'id' => 9,
                'name' => 'ASUS ProArt PA279CV',
                'description' => 'Monitor profesional untuk desainer dan kreator konten. Akurasi warna luar biasa untuk pekerjaan presisi.',
                'price' => 9500000,
                'image' => '../Video/proart_monitor.jpg'
            ],
            [
                'id' => 10,
                'name' => 'ASUS ExpertBook B9 OLED',
                'description' => 'Laptop bisnis ultra-ringan dengan layar OLED. Keamanan kelas enterprise dan daya tahan baterai luar biasa.',
                'price' => 20000000,
                'image' => '../Video/expertbook.jpg'
            ],
            [
                'id' => 11,
                'name' => 'ASUS ROG Claymore II',
                'description' => 'Keyboard gaming modular mekanikal. Dilengkapi switch optikal-mekanikal dan tombol makro yang dapat diprogram.',
                'price' => 3500000,
                'image' => '../Video/keyboard.jpg'
            ],
            [
                'id' => 12,
                'name' => 'ASUS ROG Chakram X',
                'description' => 'Mouse gaming nirkabel. Fitur sensor optik canggih dan tombol yang dapat disesuaikan.',
                'price' => 1800000,
                'image' => '../Video/mouse.jpg'
            ]
        ];

        // Dapatkan username dari user yang sedang login
        if (Auth::check()) {
            $username = Auth::user()->username;
        } else {
            $username = "Tamu";
        }

        // Perbaiki jalur view agar sesuai dengan folder auth
        return view('auth.produk', [
            'products_data' => $products_data,
            'username' => $username,
        ]);
    }
}
