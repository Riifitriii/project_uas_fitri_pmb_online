<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Dosen</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('dosen.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="nidn" class="block text-sm font-medium text-gray-700">NIDN</label>
                        <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" required
                            class="mt-1 block w-full border border-gray-300 rounded p-2">
                        @error('nidn')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                            class="mt-1 block w-full border border-gray-300 rounded p-2">
                        @error('nama')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="prodi_id" class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <select name="prodi_id" id="prodi_id" class="mt-1 block w-full border border-gray-300 rounded p-2">
                            <option value="">-- Tidak ada --</option>
                            @foreach($prodi as $p)
                                <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_prodi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('dosen.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>