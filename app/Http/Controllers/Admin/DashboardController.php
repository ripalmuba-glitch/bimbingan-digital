<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Consultation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $totalUsers = User::count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();

        $activeSessions = Consultation::where('status', 'approved')->count();

        // Log Aktivitas Sederhana (Mengambil 5 user terakhir yang join)
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalDosen', 'totalMahasiswa', 'activeSessions', 'latestUsers'));
    }
}
