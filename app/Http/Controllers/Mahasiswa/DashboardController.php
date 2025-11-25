<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Statistik
        $totalKonsultasi = Consultation::where('student_id', $userId)->count();
        $menunggu = Consultation::where('student_id', $userId)->where('status', 'pending')->count();
        $selesai = Consultation::where('student_id', $userId)->where('status', 'completed')->count();

        // 5 Riwayat Terakhir untuk tabel di dashboard
        $recentActivities = Consultation::with('lecturer')
            ->where('student_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('mahasiswa.dashboard', compact('totalKonsultasi', 'menunggu', 'selesai', 'recentActivities'));
    }
}
