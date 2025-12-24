<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    
    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'prodi_id', 
        'dosen_pembimbing_id',
        'foto'
    ];
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dosenPembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_id');
    }
}