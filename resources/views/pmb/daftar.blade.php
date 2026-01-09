<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran - PMB Online</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Form Pendaftaran PMB</h2>

            <form method="POST" action="{{ route('pmb.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                        class="mt-1 block w-full border border-gray-300 rounded p-2">
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                    <input type="text" name="angkatan" id="angkatan" value="{{ old('angkatan', date('Y')) }}" required
                        class="mt-1 block w-full border border-gray-300 rounded p-2">
                    @error('angkatan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="prodi_id" class="block text-sm font-medium text-gray-700">Program Studi</label>
                    <select name="prodi_id" id="prodi_id" required
                        class="mt-1 block w-full border border-gray-300 rounded p-2">
                        <option value="">-- Pilih Prodi --</option>
                        @foreach($prodis as $p)
                            <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_prodi }}
                            </option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto (Opsional)</label>
                    <input type="file" name="foto" id="foto" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500">
                    @error('foto')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('pmb.welcome') }}" class="px-4 py-2 bg-gray-600 text-white rounded">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>