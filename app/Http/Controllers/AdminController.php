<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;

class AdminController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalCalonMahasiswa = \App\Models\CalonMahasiswa::count();
        $perProdi = Prodi::withCount('mahasiswa')->get();
        $dataTerbaru = Mahasiswa::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalMahasiswa', 'totalCalonMahasiswa', 'perProdi', 'dataTerbaru')); 
    }
}