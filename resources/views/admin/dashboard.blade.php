<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Admin</h2>
    </x-slot>

        <!-- Main Content -->
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
                            <li>Jumlah Calon Mahasiswa: {{ $totalMahasiswa }}</li>
                            <li><a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Semua Pendaftar</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Total Calon Mahasiswa</h3>
                    <p class="text-2xl font-bold">{{ $totalMahasiswa }}</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Jumlah per Prodi</h3>
                    @foreach($perProdi as $prodi)
                    <div class="mt-2">
                        <span>{{ $prodi->nama_prodi }}:</span>
                        <span class="font-bold">{{ $prodi->mahasiswa_count }}</span>
                    </div>
                    @endforeach
                </div>

                <!-- Aksi Cepat -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium mb-4">Aksi Cepat</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Tambah Mahasiswa -->
                        <a href="{{ route('mahasiswa.create') }}" 
                            class="flex items-center justify-center px-4 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Mahasiswa
                        </a>
                        
                        <!-- Tambah Prodi -->
                        <a href="{{ route('prodi.create') }}" 
                            class="flex items-center justify-center px-4 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Prodi
                        </a>

                        <!-- Tambah Dosen -->
                        <a href="{{ route('dosen.create') }}" 
                            class="flex items-center justify-center px-4 py-3 bg-yellow-600 text-white font-medium rounded-lg hover:bg-yellow-700 transition duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Dosen
                        </a>    
                        <!-- Lihat Semua Data -->
                        <a href="{{ route('mahasiswa.index') }}" 
                            class="flex items-center justify-center px-4 py-3 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition duration-200 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-3 7h3m-3 4h3m-6-4h6m-6-4h6" />
                            </svg>
                            Lihat Semua Data
                            </a>
                        </div>
                    </div>
                </div>

            <div class="bg-blue p-4 rounded shadow">
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
                            @forelse($dataTerbaru as $m)
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