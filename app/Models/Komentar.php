<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar'; // tabel komentar
    protected $fillable = ['user_id', 'pesan', 'rating'];

    // Relasi ke model Userss
    public function user()
    {
        return $this->belongsTo(Userss::class, 'user_id', 'id');
    }
}
