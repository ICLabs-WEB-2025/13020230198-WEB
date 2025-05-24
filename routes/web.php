<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Auth;

// Halaman landing (jika belum login)
Route::get('/', function () {
    return view('welcome'); // Buat file welcome.blade.php jika diperlukan
});

// Auth routes (login, register, etc.)
Auth::routes();

// Home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// CRUD Anggota
Route::middleware(['auth'])->group(function () {
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');


    
    // Jadwal Latihan & Pertandingan
    Route::resource('jadwal', JadwalController::class);

    // Kehadiran
    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran.index');
    Route::post('/kehadiran/rekap', [KehadiranController::class, 'rekap'])->name('kehadiran.rekap');
    Route::get('/kehadiran/create', [KehadiranController::class, 'create'])->name('kehadiran.create');
    Route::resource('kehadiran', KehadiranController::class);
    Route::post('/kehadiran', [KehadiranController::class, 'store'])->name('kehadiran.store');

    // Pengumuman (jika diperlukan)
    Route::resource('pengumuman', PengumumanController::class);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



