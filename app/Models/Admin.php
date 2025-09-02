<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'admint'; // UBAH INI JADI 'admint'

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}