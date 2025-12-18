<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        $prodiList = [
            ['kode_prodi' => 'SI',  'nama_prodi' => 'Sistem Informasi'],
            ['kode_prodi' => 'BD',  'nama_prodi' => 'Bisnis Digital'],
            ['kode_prodi' => 'KA',  'nama_prodi' => 'Komputerisasi Akuntansi'],
            ['kode_prodi' => 'BK',  'nama_prodi' => 'Bimbingan dan Konseling'],
            ['kode_prodi' => 'PBI', 'nama_prodi' => 'Pendidikan Bahasa Inggris'],
            ['kode_prodi' => 'AG',  'nama_prodi' => 'Agribisnis'],
            ['kode_prodi' => 'TP',  'nama_prodi' => 'Teknologi Pangan'],
            ['kode_prodi' => 'IF',  'nama_prodi' => 'Informatika'],
            ['kode_prodi' => 'TI',  'nama_prodi' => 'Teknik Industri'],
            ['kode_prodi' => 'PS',  'nama_prodi' => 'Perbankan Syariah'],
            ['kode_prodi' => 'MBS', 'nama_prodi' => 'Manajemen Bisnis Syariah'],
        ];

        foreach ($prodiList as $prodi) {
            Prodi::updateOrCreate(
                ['kode_prodi' => $prodi['kode_prodi']],
                ['nama_prodi' => $prodi['nama_prodi']]
            );
        }
    }
}