<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use App\Models\CalonMahasiswa;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalCalonMahasiswa = CalonMahasiswa::count();
        $totalProdi = Prodi::count();
        $totalDosen = Dosen::count();
        
        // Data untuk chart dan statistik
        $perProdi = Prodi::withCount('mahasiswa')->orderBy('mahasiswa_count', 'desc')->get();
        $perAngkatan = $this->getMahasiswaPerAngkatan();
        
        // Data terbaru
        $dataTerbaru = Mahasiswa::with('prodi')
            ->latest()
            ->take(10)
            ->get();

        // Statistik tambahan
        $latestAngkatan = Mahasiswa::max('angkatan');
        $mahasiswaBulanIni = Mahasiswa::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Siapkan data chart
        $chartData = [
            'prodi' => [
                'labels' => $perProdi->pluck('nama_prodi')->toArray(),
                'data' => $perProdi->pluck('mahasiswa_count')->toArray()
            ],
            'angkatan' => [
                'labels' => array_keys($perAngkatan),
                'data' => array_values($perAngkatan)
            ]
        ];

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalCalonMahasiswa',
            'totalProdi',
            'totalDosen',
            'perProdi',
            'dataTerbaru',
            'chartData',
            'latestAngkatan',
            'mahasiswaBulanIni'
        )); 
    }

    // Data untuk chart API
    public function chartData()
    {
        // Data per prodi
        $perProdi = Prodi::withCount('mahasiswa')->get();
        
        // Data per angkatan
        $perAngkatan = $this->getMahasiswaPerAngkatan();

        return response()->json([
            'prodi' => [
                'labels' => $perProdi->pluck('nama_prodi')->toArray(),
                'data' => $perProdi->pluck('mahasiswa_count')->toArray()
            ],
            'angkatan' => [
                'labels' => array_keys($perAngkatan),
                'data' => array_values($perAngkatan)
            ],
            'total' => Mahasiswa::count()
        ]);
    }

    // Helper method: Mahasiswa per angkatan
    private function getMahasiswaPerAngkatan()
    {
        return Mahasiswa::select('angkatan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->pluck('total', 'angkatan')
            ->toArray();
    }
}