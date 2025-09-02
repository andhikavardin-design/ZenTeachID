<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->string('username'); // Kolom 'username' dengan tipe string
            $table->text('pesan'); // Kolom 'pesan' dengan tipe text
            $table->integer('rating'); // Kolom 'rating' dengan tipe integer
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};