<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MahasiswaExport implements FromView
{
    public function view(): View
    {
        return view('exports.mahasiswa', [
            'mahasiswa' => Mahasiswa::with(['prodi', 'dosenPembimbing'])->get()
        ]);
    }
}