<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class CalonMahasiswaController extends Controller
{
    public function index()
    {
        $calonMahasiswa = CalonMahasiswa::with('prodi')->get();
        return view('calon-mahasiswa.index', compact('calonMahasiswa'));
    }

    public function terima($id)
    {
        $calon = CalonMahasiswa::findOrFail($id);
        $calon->update(['status' => 'diterima']);

        // Buat NIM otomatis
        $nim = '2026' . str_pad($calon->id, 6, '0', STR_PAD_LEFT);

        // Pindahkan ke tabel mahasiswa
        \App\Models\Mahasiswa::create([
            'nim' => $nim,
            'nama' => $calon->nama,
            'angkatan' => $calon->angkatan,
            'prodi_id' => $calon->prodi_id,
            'foto' => $calon->foto,
        ]);

        return redirect()->route('calon-mahasiswa.index')->with('success', 'Calon mahasiswa diterima!');
    }
    public function tolak($id)
    {
        $calon = CalonMahasiswa::findOrFail($id);
        $calon->update(['status' => 'ditolak']);
        
        return redirect()->route('calon-mahasiswa.index')->with('success', 'Calon mahasiswa ditolak.');
    }
}