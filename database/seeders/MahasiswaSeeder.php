<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(database_path('seeders/tb_mhs.csv'), 'r');
        while (($row = fgetcsv($file, 0, ',')) !== FALSE) {
            if (count($row) < 4) continue;

            $prodiNama = strtolower(trim($row[3]));
            $prodiKodeMap = [
                'informatika' => 'IF',
                'sistem informasi' => 'SI',
                'bisnis digital' => 'BD',
                'komputerisasi akuntansi' => 'KA',
            ];
            $kodeProdi = $prodiKodeMap[$prodiNama] ?? null;
            $prodi = $kodeProdi ? Prodi::where('kode_prodi', $kodeProdi)->first() : null;

            Mahasiswa::updateOrCreate(
                ['nim' => $row[1]],
                [
                    'nama' => trim($row[2]),
                    'angkatan' => '2024',
                    'prodi_id' => $prodi?->id,
                    'dosen_pembimbing_id' => null,
                    'foto' => null, 
                ]
            );
        }
        fclose($file);
    }
}