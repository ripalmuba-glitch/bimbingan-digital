<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'lecturer_id',
        'topic',
        'description',
        'type',
        'consultation_date',
        'status',
        'mode',
        'location',
    ];

    protected $casts = [
        'consultation_date' => 'datetime',
    ];

    // Relasi ke Mahasiswa
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relasi ke Dosen
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
