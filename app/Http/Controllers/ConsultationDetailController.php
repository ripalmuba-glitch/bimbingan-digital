<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\ConsultationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConsultationDetailController extends Controller
{
    /**
     * Menyimpan pesan baru atau file lampiran
     */
    public function store(Request $request, $consultationId)
    {
        $request->validate([
            'message' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120', // Max 5MB
        ]);

        // Pastikan User berhak akses konsultasi ini
        $consultation = Consultation::findOrFail($consultationId);

        if ($consultation->student_id != Auth::id() && $consultation->lecturer_id != Auth::id()) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        // Handle File Upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            // Simpan ke folder: public/attachments
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $attachmentPath = $file->storeAs('attachments', $filename, 'public');
        }

        // Simpan ke Database
        ConsultationDetail::create([
            'consultation_id' => $consultationId,
            'sender_id' => Auth::id(),
            'message' => $request->message,
            'attachment' => $attachmentPath,
        ]);

        return back()->with('success', 'Pesan terkirim.');
    }
}
