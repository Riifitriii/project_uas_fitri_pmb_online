<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenSeeder extends Seeder
{
    public function run()
    {
        // Mapping nama prodi ke kode_prodi (sesuai data prodi yang sudah ada)
        $prodiMap = [
            'Informatika' => 'IF',
            'Sistem Informasi' => 'SI',
            'Bisnis Digital' => 'BD',
            'Manajemen Bisnis Syariah' => 'MBS',
            'Perbankan Syariah' => 'PS',
            'Bimbingan dan Konseling' => 'BK',
            'Pendidikan Bahasa Inggris' => 'PBI',
            'Komputerisasi Akuntansi' => 'KA',
            'Agribisnis' => 'AG',
            'Teknologi Pangan' => 'TP',
            'Teknik Industri' => 'TI',
        ];

        // Ambil ID prodi berdasarkan kode_prodi
        $prodiId = [];
        foreach ($prodiMap as $nama => $kode) {
            $prodi = Prodi::where('kode_prodi', $kode)->first();
            $prodiId[$nama] = $prodi ? $prodi->id : null;
        }

        $dosenList = [
            ['nama' => 'Dr. Jajang Suherman, M.A.B',           'prodi' => 'Manajemen Bisnis Syariah'],
            ['nama' => 'Badriyatul Huda, SE, MM',              'prodi' => 'Bisnis Digital'],
            ['nama' => 'M. Fahmi Nugraha, M.Kom',              'prodi' => 'Informatika'],
            ['nama' => 'Ayi Mi\'razul Mu\'minin, S.Kom., M.M', 'prodi' => 'Sistem Informasi'],
            ['nama' => 'Ida Rapida, Dra., M.M',                'prodi' => 'Bimbingan dan Konseling'],
            ['nama' => 'Bambang Irawan, S.S.',                 'prodi' => 'Pendidikan Bahasa Inggris'],
            ['nama' => 'Dr. Latifah Wulandari, S.E., M.M',     'prodi' => 'Manajemen Bisnis Syariah'],
            ['nama' => 'Encep Supriatna, S.E, S.Kom., M.M',    'prodi' => 'Bisnis Digital'],
            ['nama' => 'M. Prakarsa, S.T., M.Kom',             'prodi' => 'Teknik Industri'],
            ['nama' => 'Sofia Dewi, S.T., M.Kom',              'prodi' => 'Informatika'],
            ['nama' => 'Utami Aryanti, M.Kom',                 'prodi' => 'Sistem Informasi'],
            ['nama' => 'Ricky Rohmanto, M.Kom',                'prodi' => 'Informatika'],
            ['nama' => 'M. Rizky Wiryawan, S.Ip, M.T',         'prodi' => 'Teknik Industri'],
            ['nama' => 'M. Furqon, M.Kom',                     'prodi' => 'Informatika'],
            ['nama' => 'Mimin Mintarsih, M.Ag',                'prodi' => 'Perbankan Syariah'],
            ['nama' => 'Hasti Pramesti Kusnara, S.E, M.M',     'prodi' => 'Bisnis Digital'],
            ['nama' => 'Iin Solihin, M.Kom',                   'prodi' => 'Sistem Informasi'],
            ['nama' => 'Dr. H. Sugiyanto, SE., M.Sc',          'prodi' => 'Manajemen Bisnis Syariah'],
            ['nama' => 'Yelly A.M. Salam, Dra., M.M',          'prodi' => 'Bimbingan dan Konseling'],
            ['nama' => 'Tedi Budiman, S.Si, M.Kom',            'prodi' => 'Informatika'],
        ];

        foreach ($dosenList as $index => $dosen) {
            Dosen::updateOrCreate(
                ['nidn' => str_pad(1234567890 + $index, 10, '0', STR_PAD_LEFT)], // NIDN unik, 10 digit
                [
                    'nama' => $dosen['nama'],
                    'prodi_id' => $prodiId[$dosen['prodi']] ?? null,
                ]
            );
        }
    }
}