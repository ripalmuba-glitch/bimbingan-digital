<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Menambahkan kolom peran pengguna
        $table->enum('role', ['mahasiswa', 'dosen', 'admin', 'pimpinan'])->default('mahasiswa')->after('email');

        // Menambahkan NIP atau NIM
        $table->string('identity_number')->unique()->nullable()->after('role');

        // Menambahkan Program Studi (Opsional, tapi penting untuk filter)
        $table->string('prodi')->nullable()->after('identity_number');

        // Status aktif/tidak
        $table->boolean('is_active')->default(true)->after('password');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
