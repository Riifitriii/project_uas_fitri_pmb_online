<x-app-layout>
    <x-slot name="title">Dashboard Admin</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Admin</h2>
    </x-slot>

    <div class="flex h-screen bg-gray-100">

        <aside class="w-64 bg-gray-800 text-white p-4">
            <div class="mb-6">
                <h1 class="text-xl font-bold">PMB Online</h1>
            </div>
            <nav>
                <ul>
                    <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : '' }}">Dashboard</a></li>
                    <li class="mb-2"><a href="{{ route('mahasiswa.index') }}" class="block px-4 py-2 rounded">Kelola Mahasiswa</a></li>
                    <li class="mb-2"><a href="{{ route('prodi.index') }}" class="block px-4 py-2 rounded">Kelola Prodi</a></li>
                    <li class="mb-2"><a href="{{ route('dosen.index') }}" class="block px-4 py-2 rounded">Kelola Dosen</a></li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-6">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Selamat Datang, Admin!</h1>
                <div class="text-sm text-gray-600">Welcome {{ auth()->user()->name }}</div>
            </div>

            <div class="bg-white p-4 rounded shadow mb-6">
                <div class="flex items-start">
                    <div class="bg-blue-500 w-4 h-4 rounded-full mr-3 mt-1"></div>
                    <div>
                        <h3 class="font-medium">Informasi Penting</h3>
                        <ul class="list-disc list-inside mt-1">
                            <li>Jumlah Calon Mahasiswa: {{ \App\Models\Mahasiswa::count() }}</li>
                            <li><a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Semua Pendaftar</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Total Calon Mahasiswa</h3>
                    <p class="text-2xl font-bold">{{ \App\Models\Mahasiswa::count() }}</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Jumlah per Prodi</h3>
                    @foreach(\App\Models\Prodi::withCount('mahasiswa')->get() as $prodi)
                    <div class="mt-2">
                        <span>{{ $prodi->nama_prodi }}:</span>
                        <span class="font-bold">{{ $prodi->mahasiswa_count }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Aksi Cepat</h3>
                    <div class="flex flex-col space-y-2 mt-3">
                        <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded text-center">Tambah Mahasiswa</a>
                        <a href="{{ route('prodi.create') }}" class="px-4 py-2 bg-green-600 text-white rounded text-center">Tambah Prodi</a>
                        <a href="{{ route('dosen.create') }}" class="px-4 py-2 bg-yellow-600 text-white rounded text-center">Tambah Dosen</a>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-lg font-medium mb-4">Data Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">NIM</th>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Angkatan</th>
                                <th class="px-4 py-2 text-left">Prodi</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Mahasiswa::latest()->take(5)->get() as $m)
                            <tr>
                                <td class="px-4 py-2">{{ $m->nim }}</td>
                                <td class="px-4 py-2">{{ $m->nama }}</td>
                                <td class="px-4 py-2">{{ $m->angkatan }}</td>
                                <td class="px-4 py-2">{{ $m->prodi?->nama_prodi ?? '–' }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="text-blue-600">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center">Belum ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>