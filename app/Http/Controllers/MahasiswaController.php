<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'dosenPembimbing'])->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('prodis', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|string|max:4',
            'prodi_id' => 'nullable|exists:prodi,id',
            'dosen_pembimbing_id' => 'nullable|exists:dosen,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nim.unique' => 'NIM sudah terdaftar.',
            'nim.required' => 'NIM wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'angkatan.required' => 'Angkatan wajib diisi.',
            'prodi_id.exists' => 'Program studi tidak valid.',
            'dosen_pembimbing_id.exists' => 'Dosen pembimbing tidak valid.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus bertipe: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'mahasiswa_' . time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|string|max:4',
            'prodi_id' => 'nullable|exists:prodi,id',
            'dosen_pembimbing_id' => 'nullable|exists:dosen,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nim.unique' => 'NIM sudah terdaftar.',
            'nim.required' => 'NIM wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'angkatan.required' => 'Angkatan wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus bertipe: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete('public/mahasiswa/' . $mahasiswa->foto);
            }

            $file = $request->file('foto');
            $filename = 'mahasiswa_' . time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        $mahasiswa->update($data);

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // Hapus foto jika ada
        if ($mahasiswa->foto) {
            Storage::delete('public/mahasiswa/' . $mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}