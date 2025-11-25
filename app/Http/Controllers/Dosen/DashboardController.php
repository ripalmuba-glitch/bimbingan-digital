<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Statistik
        $totalMahasiswa = Consultation::where('lecturer_id', $userId)->distinct('student_id')->count();
        $perluReview = Consultation::where('lecturer_id', $userId)->where('status', 'pending')->count();
        $agendaHariIni = Consultation::where('lecturer_id', $userId)
                        ->where('status', 'approved')
                        ->whereDate('consultation_date', Carbon::today())
                        ->count();

        // 5 Permintaan Terbaru (Pending di atas)
        $incomingRequests = Consultation::with('student')
            ->where('lecturer_id', $userId)
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Jadwal Hari Ini
        $todaysSchedule = Consultation::with('student')
            ->where('lecturer_id', $userId)
            ->where('status', 'approved')
            ->whereDate('consultation_date', Carbon::today())
            ->orderBy('consultation_date', 'asc')
            ->get();

        return view('dosen.dashboard', compact(
            'totalMahasiswa',
            'perluReview',
            'agendaHariIni',
            'incomingRequests',
            'todaysSchedule'
        ));
    }
}
