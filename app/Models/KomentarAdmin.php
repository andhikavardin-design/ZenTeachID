<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarAdmin extends Model
{
    use HasFactory;

    protected $table = 'komentar_admin';

    protected $fillable = [
        'admin_id',
        'pesan',
    ];

    // Definisikan relasi ke model Admin jika diperlukan
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}