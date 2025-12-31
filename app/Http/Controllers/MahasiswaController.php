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
     * Show the form for creating a new resource (admin only).
     */
    public function create()
    {
        $prodis = Prodi::all();
        $dosens = Dosen::all();
        return view('mahasiswa.create', compact('prodis', 'dosens'));
    }

    /**
     * Store a newly created resource in storage (admin only).
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
     * - Admin: bisa edit semua
     * - Mahasiswa: hanya bisa edit data dirinya sendiri
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // Jika admin, izinkan edit semua
        if (auth()->user()->role === 'admin') {
            $prodis = Prodi::all();
            $dosens = Dosen::all();
            return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'dosens'));
        }

        // Jika mahasiswa, hanya boleh edit data dirinya sendiri
        if (auth()->user()->role === 'mahasiswa' && $mahasiswa->nama === auth()->user()->name) {
            $prodis = Prodi::all();
            $dosens = Dosen::all();
            return view('mahasiswa.edit', compact('mahasiswa', 'prodis', 'dosens'));
        }

        abort(403, 'Anda tidak diizinkan mengakses halaman ini.');
    }

    /**
     * Update the specified resource in storage.
     * - Admin: bisa update semua
     * - Mahasiswa: hanya bisa update data dirinya sendiri
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Cek akses
        if (auth()->user()->role === 'admin') {
            // Admin: validasi normal
        } elseif (auth()->user()->role === 'mahasiswa' && $mahasiswa->nama === auth()->user()->name) {
            // Mahasiswa: validasi normal
        } else {
            abort(403, 'Akses ditolak.');
        }

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
            if ($mahasiswa->foto) {
                Storage::delete('public/mahasiswa/' . $mahasiswa->foto);
            }
            $file = $request->file('foto');
            $filename = 'mahasiswa_' . time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        $mahasiswa->update($data);

        // Redirect sesuai role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
        }

        return redirect('/dashboard')->with('success', 'Data pribadi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (admin only).
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // Hanya admin yang bisa hapus
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Hanya admin yang bisa menghapus data.');
        }

        if ($mahasiswa->foto) {
            Storage::delete('public/mahasiswa/' . $mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    // ─── METHOD BARU: FORM PENDAFTARAN PMB (PUBLIK) ───────────────────────

    /**
     * Menampilkan form pendaftaran PMB (publik, tanpa login).
     */
    public function createPMB()
    {
        $prodis = Prodi::all();
        return view('pmb.daftar', compact('prodis'));
    }

    /**
     * Menyimpan data pendaftaran PMB dari calon mahasiswa (publik).
     */
    public function storePMB(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'angkatan' => 'required|string|max:4',
            'prodi_id' => 'required|exists:prodi,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nim.required' => 'Nomor pendaftaran wajib diisi.',
            'nim.unique' => 'Nomor pendaftaran sudah digunakan.',
            'nama.required' => 'Nama lengkap wajib diisi.',
            'angkatan.required' => 'Angkatan wajib diisi.',
            'prodi_id.required' => 'Program studi wajib dipilih.',
            'prodi_id.exists' => 'Program studi tidak valid.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF.',
            'foto.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'pmb_' . time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/mahasiswa', $filename);
            $data['foto'] = $filename;
        }

        Mahasiswa::create($data);

        return redirect()->route('pmb.daftar')
                         ->with('success', '✅ Pendaftaran berhasil! Data Anda telah disimpan. Silakan tunggu verifikasi lebih lanjut.');
    }
}