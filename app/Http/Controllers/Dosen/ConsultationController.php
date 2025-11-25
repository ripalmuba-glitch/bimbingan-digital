<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    // 1. Menampilkan Daftar Permintaan Masuk
    public function index()
    {
        $consultations = Consultation::with('student')
            ->where('lecturer_id', Auth::id())
            ->orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END") // Prioritaskan yang pending
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dosen.consultations.index', compact('consultations'));
    }

    // 2. Menampilkan Detail Permintaan (Untuk Review)
    public function show($id)
    {
        $consultation = Consultation::with('student')
            ->where('lecturer_id', Auth::id())
            ->findOrFail($id);

        return view('dosen.consultations.show', compact('consultation'));
    }

    // 3. Proses Terima / Tolak / Selesai
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,completed',
            'admin_note' => 'nullable|string' // Opsional: pesan dari dosen
        ]);

        $consultation = Consultation::where('lecturer_id', Auth::id())->findOrFail($id);

        $consultation->update([
            'status' => $request->status,
            // Jika ada kolom note di tabel consultation, bisa diupdate disini (opsional)
        ]);

        $message = match($request->status) {
            'approved' => 'Permintaan berhasil disetujui. Jadwal telah masuk kalender.',
            'rejected' => 'Permintaan telah ditolak.',
            'completed' => 'Sesi konsultasi ditandai selesai.',
        };

        return redirect()->route('dosen.dashboard')->with('success', $message);
    }
}
