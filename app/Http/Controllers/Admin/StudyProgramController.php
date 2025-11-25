<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    public function index()
    {
        $prodi = StudyProgram::all();
        return view('admin.study_programs.index', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:study_programs,code',
            'name' => 'required|string',
        ]);

        StudyProgram::create($request->all());

        AuditLog::record('CREATE', 'Prodi', 'Menambahkan Prodi: ' . $request->name);

        return back()->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $prodi = StudyProgram::findOrFail($id);
        $name = $prodi->name;
        $prodi->delete();

        AuditLog::record('DELETE', 'Prodi', 'Menghapus Prodi: ' . $name);

        return back()->with('success', 'Program Studi berhasil dihapus.');
    }
}
