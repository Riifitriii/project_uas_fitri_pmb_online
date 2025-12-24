@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h2>Tambah Mahasiswa</h2>

    <form method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nim">NIM</label><br>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required style="width: 100%; padding: 8px;">
            @error('nim')<div style="color: red;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="angkatan">Angkatan</label><br>
            <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan') }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="prodi_id">Program Studi</label><br>
            <select name="prodi_id" id="prodi_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $p)
                    <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_prodi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="dosen_pembimbing_id">Dosen Pembimbing (Opsional)</label><br>
            <select name="dosen_pembimbing_id" id="dosen_pembimbing_id" style="width: 100%; padding: 8px;">
                <option value="">-- Tidak ada --</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->id }}" {{ old('dosen_pembimbing_id') == $d->id ? 'selected' : '' }}>
                        {{ $d->nama }} ({{ $d->nidn }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="foto">Foto (opsional, maks 2MB: JPG, PNG)</label><br>
            <input type="file" name="foto" id="foto" accept="image/*">
            @error('foto')<div style="color: red;">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
@endsection