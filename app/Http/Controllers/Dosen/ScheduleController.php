<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\LecturerSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        // Ambil jadwal yang sudah ada
        $schedules = LecturerSchedule::where('user_id', Auth::id())->get()->keyBy('day');

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        return view('dosen.schedules.index', compact('schedules', 'days'));
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        foreach ($days as $day) {
            // Cek apakah hari tersebut diaktifkan (checkbox)
            if ($request->has('active_' . $day)) {
                LecturerSchedule::updateOrCreate(
                    ['user_id' => $userId, 'day' => $day],
                    [
                        'start_time' => $request->input('start_' . $day),
                        'end_time' => $request->input('end_' . $day),
                        'is_available' => true
                    ]
                );
            } else {
                // Jika tidak dicentang, hapus jadwal atau set unavailable
                LecturerSchedule::where('user_id', $userId)->where('day', $day)->delete();
            }
        }

        return back()->with('success', 'Jadwal ketersediaan berhasil diperbarui.');
    }
}
