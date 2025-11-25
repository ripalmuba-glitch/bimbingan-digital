<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller Dashboard
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboard;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Mahasiswa\ConsultationController;
use App\Http\Controllers\Dosen\ConsultationController as DosenConsultation;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StudyProgramController;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Dosen\ScheduleController;
use App\Http\Controllers\Dosen\ReportController;

Route::get('/', function () {
    return view('welcome');
});

// --- ROUTE UTAMA (PENGECEKAN LOGIN) ---
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'mahasiswa') {
        return redirect()->route('mahasiswa.dashboard');
    } elseif ($user->role === 'dosen') {
        return redirect()->route('dosen.dashboard');
    } elseif ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return abort(403, 'Role tidak dikenali');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// --- GROUP ROUTE BERDASARKAN ROLE ---

// 1. Route Khusus Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboard::class, 'index'])->name('dashboard');

    Route::get('/konsultasi', [ConsultationController::class, 'index'])->name('consultations.index'); // Riwayat
    Route::get('/konsultasi/create', [ConsultationController::class, 'create'])->name('consultations.create'); // Form Ajukan
    Route::post('/konsultasi', [ConsultationController::class, 'store'])->name('consultations.store'); // Simpan
    Route::get('/konsultasi/{id}', [ConsultationController::class, 'show'])->name('consultations.show'); // Detail
    Route::get('/logbook/print', [ConsultationController::class, 'printLogbook'])->name('logbook.print');
});

// 2. Route Khusus Dosen
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', [DosenDashboard::class, 'index'])->name('dashboard');

    Route::get('/konsultasi', [DosenConsultation::class, 'index'])->name('consultations.index');
    Route::get('/konsultasi/{id}', [DosenConsultation::class, 'show'])->name('consultations.show');
    Route::patch('/konsultasi/{id}', [DosenConsultation::class, 'update'])->name('consultations.update');
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::post('/jadwal', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/laporan/print', [ReportController::class, 'print'])->name('reports.print');
});

// 3. Route Khusus Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);

    // 1. Program Studi
    Route::get('/prodi', [StudyProgramController::class, 'index'])->name('prodi.index');
    Route::post('/prodi', [StudyProgramController::class, 'store'])->name('prodi.store');
    Route::delete('/prodi/{id}', [StudyProgramController::class, 'destroy'])->name('prodi.destroy');

    // 2. Tahun Akademik
    Route::get('/academic', [AcademicYearController::class, 'index'])->name('academic.index');
    Route::post('/academic', [AcademicYearController::class, 'store'])->name('academic.store');
    Route::post('/academic/{id}/active', [AcademicYearController::class, 'setActive'])->name('academic.active');
    Route::delete('/academic/{id}', [AcademicYearController::class, 'destroy'])->name('academic.destroy');

    // 3. Audit Log
    Route::get('/logs', [AuditLogController::class, 'index'])->name('logs.index');
});


// --- ROUTE BAWAAN BREEZE (PROFILE) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('password.update');
});

// --- ROUTE CHAT & DISKUSI (Bisa diakses Mahasiswa & Dosen) ---
Route::middleware(['auth'])->group(function () {
    Route::post('/consultation/{id}/reply', [App\Http\Controllers\ConsultationDetailController::class, 'store'])
        ->name('consultation.reply');
});

require __DIR__.'/auth.php';
