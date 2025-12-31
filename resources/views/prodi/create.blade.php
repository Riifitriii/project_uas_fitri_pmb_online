<x-app-layout>
    <x-slot name="title">Tambah Prodi - CRUD Prodi</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Program Studi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('prodi.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="kode_prodi" class="block text-sm font-medium text-gray-700">Kode Prodi</label>
                        <input type="text" name="kode_prodi" id="kode_prodi" value="{{ old('kode_prodi') }}" required
                            class="mt-1 block w-full border border-gray-300 rounded p-2">
                        @error('kode_prodi')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_prodi" class="block text-sm font-medium text-gray-700">Nama Prodi</label>
                        <input type="text" name="nama_prodi" id="nama_prodi" value="{{ old('nama_prodi') }}" required
                            class="mt-1 block w-full border border-gray-300 rounded p-2">
                        @error('nama_prodi')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex space-x-3">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('prodi.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>