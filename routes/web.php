<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pmb.welcome');
})->name('pmb.welcome');

Route::get('/pmb/pendaftaran', [MahasiswaController::class, 'createPMB'])->name('pmb.daftar');
Route::post('/pmb/pendaftaran', [MahasiswaController::class, 'storePMB'])->name('pmb.store');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    $mahasiswa = \App\Models\Mahasiswa::where('nama', auth()->user()->name)->first();
    return view('dashboard-mahasiswa', compact('mahasiswa'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/mahasiswa/cari', [MahasiswaController::class, 'cari'])->name('mahasiswa.cari');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('prodi', ProdiController::class)->except(['show']);
    Route::resource('dosen', DosenController::class)->except(['show']);
});

require __DIR__.'/auth.php';