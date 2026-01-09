<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_mahasiswa';

    protected $fillable = [
        'nama',
        'angkatan',
        'prodi_id',
        'foto',
        'status',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}