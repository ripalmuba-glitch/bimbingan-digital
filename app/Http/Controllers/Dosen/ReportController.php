<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Query Data
        $consultations = Consultation::with('student')
            ->where('lecturer_id', Auth::id())
            ->where('status', 'completed') // Hanya yang selesai
            ->whereBetween('consultation_date', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderBy('consultation_date', 'asc')
            ->get();

        return view('dosen.reports.index', compact('consultations', 'startDate', 'endDate'));
    }

    // Fungsi untuk Print View (Tanpa Header/Sidebar)
    public function print(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $consultations = Consultation::with('student')
            ->where('lecturer_id', Auth::id())
            ->where('status', 'completed')
            ->whereBetween('consultation_date', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->get();

        $lecturer = Auth::user();

        return view('dosen.reports.print', compact('consultations', 'startDate', 'endDate', 'lecturer'));
    }
}
