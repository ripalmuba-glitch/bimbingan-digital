<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    // 1. Menampilkan Daftar Riwayat Bimbingan
    public function index()
    {
        $consultations = Consultation::with('lecturer')
            ->where('student_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('mahasiswa.consultations.index', compact('consultations'));
    }

    // 2. Menampilkan Form Pengajuan Baru
    public function create()
    {
        // Ambil semua user yang role-nya dosen
        $lecturers = User::where('role', 'dosen')->where('is_active', true)->get();

        return view('mahasiswa.consultations.create', compact('lecturers'));
    }

    // 3. Menyimpan Data Pengajuan (Logic Utama)
    public function store(Request $request)
    {
        $request->validate([
            'lecturer_id' => 'required|exists:users,id',
            'topic' => 'required|string|max:255',
            'type' => 'required|in:akademik,krs,skripsi,ta,pribadi',
            'consultation_date' => 'required|date|after:now',
            'description' => 'nullable|string',
            'mode' => 'required|in:online_chat,video_call,offline',
        ]);

        Consultation::create([
            'student_id' => Auth::id(),
            'lecturer_id' => $request->lecturer_id,
            'topic' => $request->topic,
            'type' => $request->type,
            'consultation_date' => $request->consultation_date,
            'description' => $request->description,
            'mode' => $request->mode,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Permintaan konsultasi berhasil diajukan! Menunggu persetujuan dosen.');
    }

    // 4. Menampilkan Detail Konsultasi
    public function show($id)
    {
        $consultation = Consultation::with(['lecturer', 'student'])
            ->where('student_id', Auth::id()) // Pastikan hanya punya mhs ybs
            ->findOrFail($id);

        return view('mahasiswa.consultations.show', compact('consultation'));
    }

    // 5. CETAK KARTU BIMBINGAN (LOGBOOK)
    public function printLogbook()
    {
        $user = Auth::user();

        // Ambil konsultasi yang SUDAH SELESAI saja
        $consultations = Consultation::with('lecturer')
            ->where('student_id', $user->id)
            ->where('status', 'completed')
            ->orderBy('consultation_date', 'asc')
            ->get();

        return view('mahasiswa.consultations.print', compact('consultations', 'user'));
    }
}
