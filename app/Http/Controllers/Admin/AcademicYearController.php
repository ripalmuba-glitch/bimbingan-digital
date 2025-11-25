<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $years = AcademicYear::orderBy('created_at', 'desc')->get();
        return view('admin.academic_years.index', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        AcademicYear::create([
            'name' => $request->name,
            'is_active' => false
        ]);

        AuditLog::record('CREATE', 'Academic', 'Menambahkan Tahun Akademik: ' . $request->name);

        return back()->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }

    public function setActive($id)
    {
        // Set semua jadi tidak aktif
        AcademicYear::query()->update(['is_active' => false]);

        // Set yang dipilih jadi aktif
        $year = AcademicYear::findOrFail($id);
        $year->update(['is_active' => true]);

        AuditLog::record('UPDATE', 'Academic', 'Mengaktifkan Semester: ' . $year->name);

        return back()->with('success', 'Semester Aktif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $year = AcademicYear::findOrFail($id);
        if($year->is_active) {
            return back()->with('error', 'Tidak bisa menghapus semester yang sedang aktif.');
        }
        $year->delete();
        AuditLog::record('DELETE', 'Academic', 'Menghapus Semester: ' . $year->name);

        return back()->with('success', 'Data berhasil dihapus.');
    }
}
