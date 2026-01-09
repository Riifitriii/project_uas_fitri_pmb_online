<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalonMahasiswaController;
use Illuminate\Support\Facades\Route;

// === Halaman Utama ===
Route::get('/', function () {
    return view('pmb.welcome');
})->name('pmb.welcome');

// === Form PMB (Publik) ===
Route::get('/pmb/pendaftaran', [MahasiswaController::class, 'createPMB'])->name('pmb.daftar');
Route::post('/pmb/pendaftaran', [MahasiswaController::class, 'storePMB'])->name('pmb.store');

// === Dashboard Berdasarkan Role ===
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    $mahasiswa = \App\Models\Mahasiswa::where('nama', auth()->user()->name)->first();
    return view('dashboard-mahasiswa', compact('mahasiswa'));
})->middleware(['auth', 'verified'])->name('dashboard');

// === Profil (Login Diperlukan) ===
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// === Admin Routes (Login + Admin Role) ===
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // AJAX Live Search
    Route::get('/mahasiswa/cari', [MahasiswaController::class, 'cari'])->name('mahasiswa.cari');

    // Export Data
    Route::get('/mahasiswa/export', [MahasiswaController::class, 'export'])->name('mahasiswa.export');
    Route::get('/pmb/export', [MahasiswaController::class, 'exportPmb'])->name('pmb.export');

    // CRUD Mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);

    // CRUD Prodi
    Route::resource('prodi', ProdiController::class)->except(['show']);

    // CRUD Dosen
    Route::resource('dosen', DosenController::class)->except(['show']);

    // Calon Mahasiswa (tabel baru)
    Route::resource('calon-mahasiswa', CalonMahasiswaController::class)->only(['index']);
    Route::post('/calon-mahasiswa/{id}/terima', [CalonMahasiswaController::class, 'terima'])->name('calon-mahasiswa.terima');
    Route::patch('/calon-mahasiswa/{id}/tolak', [CalonMahasiswaController::class, 'tolak'])->name('calon-mahasiswa.tolak');
});

require __DIR__.'/auth.php';