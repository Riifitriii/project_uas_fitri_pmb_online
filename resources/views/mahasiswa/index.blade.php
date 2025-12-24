@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h2>Daftar Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}" class="btn">Tambah Mahasiswa</a>

    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Prodi</th>
                <th>Dosen Pembimbing</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswa as $m)
            <tr>
                <td style="text-align: center; vertical-align: middle;">
                    @if($m->foto)
                        <img src="{{ asset('storage/mahasiswa/' . $m->foto) }}"
                             alt="Foto {{ $m->nama }}"
                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                    @else
                        –
                    @endif
                </td>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->angkatan }}</td>
                <td>{{ $m->prodi?->nama_prodi ?? '–' }}</td>
                <td>{{ $m->dosenPembimbing?->nama ?? '–' }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $m->id) }}">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Belum ada data mahasiswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection