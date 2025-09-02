<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        DB::statement('CREATE DATABASE IF NOT EXISTS perpus');
    }

    public function down(): void
    {
        DB::statement('DROP DATABASE IF EXISTS perpus');
    }
};
