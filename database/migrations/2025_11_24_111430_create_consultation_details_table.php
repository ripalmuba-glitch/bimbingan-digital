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
    Schema::create('consultation_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('consultation_id')->constrained('consultations')->onDelete('cascade');

        // Pengirim pesan (bisa mhs atau dosen)
        $table->foreignId('sender_id')->constrained('users');

        $table->text('message')->nullable(); // Isi pesan/catatan
        $table->string('attachment')->nullable(); // File revisi/dokumen

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_details');
    }
};
