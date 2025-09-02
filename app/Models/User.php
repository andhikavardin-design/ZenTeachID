<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'userss';

    protected $fillable = [
        'nama',
        'gmail',    
        'no_telp',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Hapus bagian casts jika versi Laravel di bawah 10.
     * protected $casts = [
     * 'password' => 'hashed',
     * ];
     */
}