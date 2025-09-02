<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promosi extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database yang terhubung dengan model ini.
     * Jika nama kelas (Promosi) tidak sesuai dengan konvensi Laravel (promosis),
     * kita harus mendefinisikan nama tabelnya secara eksplisit.
     *
     * @var string
     */
    protected $table = 'promosi';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     * Ini adalah fitur keamanan untuk mencegah inputan berbahaya.
     * Hanya kolom yang terdaftar di sini yang bisa diisi oleh input pengguna.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'discount',
        'description',
    ];

    /**
     * Menentukan apakah model harus menggunakan timestamps (created_at dan updated_at).
     * Set ke 'false' jika tabel 'promosi' tidak memiliki kolom-kolom ini.
     *
     * @var bool
     */
    public $timestamps = false;
}
