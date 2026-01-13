<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AnggotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// HALAMAN AWAL
// ==========================
Route::get('/', function () {
    return redirect('/login');
});

// ==========================
// AUTH (LOGIN MANUAL)
// ==========================
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// ADMIN
// ==========================
Route::middleware(['auth', 'role:admin'])->group(function () {

    // DASHBOARD ADMIN (PAKAI CONTROLLER)
    Route::get('/admin', [AdminController::class, 'index']);

    // ======================
    // CRUD ANGGOTA PKL
    // ======================
    Route::get('/admin/anggota', [AnggotaController::class, 'index']);
    Route::get('/admin/anggota/create', [AnggotaController::class, 'create']);
    Route::post('/admin/anggota', [AnggotaController::class, 'store']);
    Route::get('/admin/anggota/{anggota}/edit', [AnggotaController::class, 'edit']);
    Route::put('/admin/anggota/{anggota}', [AnggotaController::class, 'update']);
    Route::delete('/admin/anggota/{anggota}', [AnggotaController::class, 'destroy']);

    // ======================
    // LIHAT SEMUA ABSENSI
    // ======================
    Route::get('/admin/absensi', [AbsensiController::class, 'index']);
});

// ==========================
// ANGGOTA PKL
// ==========================
Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('/absensi', [AbsensiController::class, 'index']);
    Route::post('/absensi', [AbsensiController::class, 'store']);
});
