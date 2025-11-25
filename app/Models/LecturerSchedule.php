<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'day', 'start_time', 'end_time', 'is_available'
    ];
}
