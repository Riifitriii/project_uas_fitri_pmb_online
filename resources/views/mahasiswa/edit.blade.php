<x-app-layout>
    <x-slot name="title">Edit Mahasiswa - CRUD Mahasiswa</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Mahasiswa</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @error('nim')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @error('nama')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                        <input type="text" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @error('angkatan')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="prodi_id" class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <select name="prodi_id" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                            <option value="">-- Pilih Prodi --</option>
                            @foreach($prodis as $p)
                                <option value="{{ $p->id }}" {{ (old('prodi_id') ?? $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="dosen_pembimbing_id" class="block text-sm font-medium text-gray-700">Dosen Pembimbing (Opsional)</label>
                        <select name="dosen_pembimbing_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                            <option value="">-- Tidak ada --</option>
                            @foreach($dosens as $d)
                                <option value="{{ $d->id }}" {{ (old('dosen_pembimbing_id') ?? $mahasiswa->dosen_pembimbing_id) == $d->id ? 'selected' : '' }}>
                                    {{ $d->nama }} ({{ $d->nidn }})
                                </option>
                            @endforeach
                        </select>
                        @error('dosen_pembimbing_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                        @if($mahasiswa->foto)
                            <div class="mt-2">
                                <img src="{{ asset('storage/mahasiswa/' . $mahasiswa->foto) }}"
                                     alt="Foto Mahasiswa"
                                     class="w-24 h-24 object-cover rounded border">
                            </div>
                        @else
                            <p class="text-gray-500 mt-2">Tidak ada foto.</p>
                        @endif

                        <label for="foto" class="block text-sm font-medium text-gray-700 mt-4">Ganti Foto (opsional, maks 2MB)</label>
                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('foto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Perbarui</button>
                        <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>