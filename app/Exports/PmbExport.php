<?php

namespace App\Exports;

use App\Models\CalonMahasiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PmbExport implements FromView
{
    public function view(): View
    {
        return view('exports.pmb', [
            'pmb' => CalonMahasiswa::with('prodi')->get()
        ]);
    }
}