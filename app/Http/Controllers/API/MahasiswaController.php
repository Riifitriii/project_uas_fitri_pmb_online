<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenPembimbing'])->get();
        return response()->json($mahasiswa);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenPembimbing'])->find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        return response()->json($mahasiswa);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $request->validate([
            'nama' => 'string|max:255',
            'angkatan' => 'string|max:10',
            'prodi_id' => 'exists:prodi,id',
            'dosen_pembimbing_id' => 'exists:dosen,id',
        ]);

        $mahasiswa->update($request->only(['nama', 'angkatan', 'prodi_id', 'dosen_pembimbing_id']));

        return response()->json($mahasiswa);
    }
}
