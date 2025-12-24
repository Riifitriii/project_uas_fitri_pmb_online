@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h2>Edit Mahasiswa</h2>

    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="nim">NIM</label><br>
            <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required style="width: 100%; padding: 8px;">
            @error('nim')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required style="width: 100%; padding: 8px;">
            @error('nama')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="angkatan">Angkatan</label><br>
            <input type="text" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required style="width: 100%; padding: 8px;">
            @error('angkatan')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="prodi_id">Program Studi</label><br>
            <select name="prodi_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $p)
                    <option value="{{ $p->id }}" {{ (old('prodi_id') ?? $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_prodi }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="dosen_pembimbing_id">Dosen Pembimbing (Opsional)</label><br>
            <select name="dosen_pembimbing_id" style="width: 100%; padding: 8px;">
                <option value="">-- Tidak ada --</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->id }}" {{ (old('dosen_pembimbing_id') ?? $mahasiswa->dosen_pembimbing_id) == $d->id ? 'selected' : '' }}>
                        {{ $d->nama }} ({{ $d->nidn }})
                    </option>
                @endforeach
            </select>
            @error('dosen_pembimbing_id')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="foto">Ganti Foto (opsional, maks 2MB: JPG, PNG)</label><br>
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/mahasiswa/' . $mahasiswa->foto) }}" 
                     alt="Foto Mahasiswa" 
                     style="width:100px; height:auto; object-fit: cover; margin-bottom: 10px; border: 1px solid #ddd;">
            @endif
            <input type="file" name="foto" id="foto" accept="image/*">
            @error('foto')<div style="color: red; margin-top: 5px;">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn">Perbarui</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
@endsection