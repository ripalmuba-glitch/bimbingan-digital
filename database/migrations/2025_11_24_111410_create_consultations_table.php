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
    Schema::create('consultations', function (Blueprint $table) {
        $table->id();
        // Relasi ke Mahasiswa
        $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
        // Relasi ke Dosen Pembimbing
        $table->foreignId('lecturer_id')->constrained('users')->onDelete('cascade');

        // Detail Konsultasi
        $table->string('topic'); // Judul/Topik bimbingan
        $table->text('description')->nullable(); // Deskripsi masalah
        $table->enum('type', ['akademik', 'krs', 'skripsi', 'ta', 'pribadi'])->default('akademik');

        // Penjadwalan
        $table->dateTime('consultation_date')->nullable(); // Waktu yang disepakati
        $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'cancelled'])->default('pending');

        // Mode Pertemuan
        $table->enum('mode', ['online_chat', 'video_call', 'offline'])->default('online_chat');
        $table->string('location')->nullable(); // Link meeting atau Ruangan

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
