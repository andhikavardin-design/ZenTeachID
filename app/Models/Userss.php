<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Userss extends Authenticatable
{
    use HasFactory;

    protected $table = 'userss'; // tabel user
    protected $fillable = ['nama', 'email', 'password'];

    // Relasi: satu user bisa punya banyak komentar
    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'user_id', 'id');
    }
}
