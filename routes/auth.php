<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    // --- REGISTRASI (Opsional) ---
    // Jika sistem akademik biasanya user dibuatkan oleh Admin, route ini bisa dikomentari.
    // Tapi kita biarkan aktif dulu untuk testing.
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);


    // --- CUSTOM LOGIN ROUTES (MODIFIKASI KITA) ---

    // Halaman Login Mahasiswa
    Route::get('login/mahasiswa', [AuthenticatedSessionController::class, 'createRole'])
        ->defaults('role', 'mahasiswa')
        ->name('login.mahasiswa');

    // Halaman Login Dosen
    Route::get('login/dosen', [AuthenticatedSessionController::class, 'createRole'])
        ->defaults('role', 'dosen')
        ->name('login.dosen');

    // Halaman Login Admin
    Route::get('login/admin', [AuthenticatedSessionController::class, 'createRole'])
        ->defaults('role', 'admin')
        ->name('login.admin');

    // Route default 'login' dimatikan/redirect agar user memilih via landing page
    // Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    // Proses Submit Login (POST) - Digunakan oleh semua form di atas
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login');

    // --- END CUSTOM LOGIN ROUTES ---


    // --- PASSWORD RESET ---
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {

    // --- VERIFIKASI EMAIL ---
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // --- KONFIRMASI & UPDATE PASSWORD ---
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])
        ->name('password.update');

    // --- LOGOUT ---
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
