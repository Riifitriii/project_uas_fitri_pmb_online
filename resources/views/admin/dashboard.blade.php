<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Notifikasi Realtime -->
            <div id="notification-area" class="mb-4 p-2 bg-green-100 text-green-800 rounded hidden">
                <span id="notification-text"></span>
            </div>

            <div class="bg-white p-4 rounded shadow mb-6">
                <div class="flex items-start">
                    <div class="bg-blue-500 w-4 h-4 rounded-full mr-3 mt-1"></div>
                    <div>
                        <h3 class="font-medium">Informasi Penting</h3>
                        <ul class="list-disc list-inside mt-1">
                            <li>Jumlah Calon Mahasiswa: {{ $totalCalonMahasiswa }}</li>
                            <li>Jumlah Mahasiswa Aktif: {{ $totalMahasiswa }}</li>
                            <li><a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Semua Mahasiswa</a></li>
                            <li><a href="{{ route('calon-mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Calon Mahasiswa</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Total Mahasiswa Aktif</h3>
                    <p class="text-2xl font-bold">{{ $totalMahasiswa }}</p>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-medium">Total Calon Mahasiswa</h3>
                    <p class="text-2xl font-bold">{{ $totalCalonMahasiswa }}</p>
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

            <!-- Chart -->
            <div class="bg-white p-4 rounded shadow mb-6">
                <canvas id="mahasiswaChart" width="400" height="200"></canvas>
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
        </div>
    </div>

    <!-- Scripts -->
    @push('scripts')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize Pusher
        const pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
            cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
            forceTLS: false,
            wsHost: window.location.hostname,
            wsPort: 6001,
            wssPort: 6001,
        });

        const channel = pusher.subscribe('mahasiswa');
        channel.bind('MahasiswaCreated', function(data) {
            // Tampilkan notifikasi
            document.getElementById('notification-text').textContent = 
                `Mahasiswa baru ditambahkan: ${data.mahasiswa.nama}`;
            document.getElementById('notification-area').classList.remove('hidden');
            
            // Sembunyikan notifikasi setelah 5 detik
            setTimeout(() => {
                document.getElementById('notification-area').classList.add('hidden');
            }, 5000);
        });

        // Inisialisasi Chart.js
        const ctx = document.getElementById('mahasiswaChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Informatika', 'Sistem Informasi', 'Bisnis Digital'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [12, 19, 3], // Tambahkan key 'data:' di sini
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>