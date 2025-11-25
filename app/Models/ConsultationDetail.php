<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationDetail extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'consultation_id',
        'sender_id',
        'message',
        'attachment',
    ];

    /**
     * Relasi ke Konsultasi Utama
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    /**
     * Relasi ke Pengirim Pesan (User)
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
