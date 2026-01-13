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
                            <li>Total Program Studi: {{ $totalProdi }}</li>
                            <li>Total Dosen: {{ $totalDosen }}</li>
                            <li><a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Semua Mahasiswa</a></li>
                            <li><a href="{{ route('calon-mahasiswa.index') }}" class="text-blue-600 hover:underline">Lihat Calon Mahasiswa</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Statistik Box -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <div class="flex items-center">
                        <div class="bg-blue-500 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Mahasiswa</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalMahasiswa }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                    <div class="flex items-center">
                        <div class="bg-green-500 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Calon Mahasiswa</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalCalonMahasiswa }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                    <div class="flex items-center">
                        <div class="bg-purple-500 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Program Studi</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalProdi }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                    <div class="flex items-center">
                        <div class="bg-yellow-500 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Dosen</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $totalDosen }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aksi Cepat -->
            <div class="bg-white p-4 rounded shadow mb-6">
                <h3 class="text-lg font-medium mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('mahasiswa.create') }}" 
                        class="flex items-center justify-center px-4 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Mahasiswa
                    </a>
                    
                    <a href="{{ route('prodi.create') }}" 
                        class="flex items-center justify-center px-4 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Prodi
                    </a>

                    <a href="{{ route('dosen.create') }}" 
                        class="flex items-center justify-center px-4 py-3 bg-yellow-600 text-white font-medium rounded-lg hover:bg-yellow-700 transition duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Dosen
                    </a>    
                    
                    <a href="{{ route('mahasiswa.index') }}" 
                        class="flex items-center justify-center px-4 py-3 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-3 7h3m-3 4h3m-6-4h6m-6-4h6" />
                        </svg>
                        Lihat Semua Data
                    </a>
                </div>
            </div>

            <!-- Grid Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Chart Mahasiswa per Prodi -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-800">Jumlah Mahasiswa per Program Studi</h3>
                        <span class="text-sm text-gray-500">Total: {{ $totalMahasiswa }}</span>
                    </div>
                    <div class="h-64">
                        <canvas id="mahasiswaPerProdiChart"></canvas>
                    </div>
                </div>

                <!-- Chart Mahasiswa per Angkatan -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-800">Jumlah Mahasiswa per Angkatan</h3>
                        <span class="text-sm text-gray-500">Tahun</span>
                    </div>
                    <div class="h-64">
                        <canvas id="mahasiswaPerAngkatanChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Tabel Statistik -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                <!-- Statistik Prodi -->
                <div class="bg-white p-4 rounded-lg shadow lg:col-span-2">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Statistik Program Studi</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program Studi</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Mahasiswa</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="prodiStatsBody" class="bg-white divide-y divide-gray-200">
                                @foreach($perProdi as $prodi)
                                @php
                                    $percentage = $totalMahasiswa > 0 ? ($prodi->mahasiswa_count / $totalMahasiswa * 100) : 0;
                                @endphp
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full flex items-center justify-center bg-blue-100 text-blue-800 font-bold">
                                                {{ substr($prodi->nama_prodi ?? 'N/A', 0, 1) }}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $prodi->nama_prodi ?? 'Tidak Diketahui' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-semibold">{{ $prodi->mahasiswa_count }}</div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                                            </div>
                                            <span class="text-sm text-gray-700">{{ number_format($percentage, 1) }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('prodi.edit', $prodi->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ringkasan Statistik -->
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-800 mb-4">Ringkasan Statistik</h3>
                    <div class="space-y-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Rata-rata Mahasiswa per Prodi</span>
                                <span class="text-lg font-bold text-blue-600">
                                    {{ $totalProdi > 0 ? number_format($totalMahasiswa / $totalProdi, 1) : 0 }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Prodi dengan Mahasiswa Terbanyak</span>
                                <span class="text-lg font-bold text-green-600">
                                    @php
                                        $maxProdi = $perProdi->sortByDesc('mahasiswa_count')->first();
                                    @endphp
                                    {{ $maxProdi->nama_prodi ?? '-' }} ({{ $maxProdi->mahasiswa_count ?? 0 }})
                                </span>
                            </div>
                        </div>
                        
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Angkatan Terbaru</span>
                                <span class="text-lg font-bold text-purple-600">
                                    {{ $latestAngkatan ?? '-' }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Mahasiswa Bulan Ini</span>
                                <span class="text-lg font-bold text-yellow-600">
                                    {{ $mahasiswaBulanIni ?? 0 }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Terbaru -->
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-800">Data Mahasiswa Terbaru</h3>
                    <div>
                        <a href="{{ route('mahasiswa.index') }}" class="text-blue-600 hover:underline text-sm mr-4">
                            Lihat Semua →
                        </a>
                        <button onclick="refreshData()" class="text-gray-600 hover:text-gray-800 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="mahasiswaTableBody" class="bg-white divide-y divide-gray-200">
                            @forelse($dataTerbaru as $m)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">{{ $m->nim }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($m->foto)
                                            <img src="{{ asset('storage/mahasiswa/' . $m->foto) }}" 
                                                 alt="{{ $m->nama }}" 
                                                 class="h-8 w-8 rounded-full object-cover mr-3">
                                        @else
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                                <span class="text-xs font-bold text-gray-600">{{ substr($m->nama, 0, 1) }}</span>
                                            </div>
                                        @endif
                                        <span class="text-sm font-medium text-gray-900">{{ $m->nama }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">{{ $m->angkatan }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                    {{ $m->prodi?->nama_prodi ?? '–' }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    {{ $m->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                                    <a href="{{ route('mahasiswa.cetak-kartu', $m->id) }}" class="text-green-600 hover:text-green-900" target="_blank">Kartu</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="text-gray-600">Belum ada data mahasiswa.</p>
                                    </div>
                                </td>
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
        // Debug: Tampilkan konfigurasi di console
        console.log('Dashboard loaded with data:', {
            totalMahasiswa: {{ $totalMahasiswa }},
            totalProdi: {{ $totalProdi }},
            chartData: @json($chartData)
        });

        // Initialize Pusher untuk Pusher Cloud
        const pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
            cluster: "{{ config('broadcasting.connections.pusher.options.cluster', 'ap1') }}",
            forceTLS: true,
            encrypted: true
        });

        console.log('Pusher initialized for cluster:', "{{ config('broadcasting.connections.pusher.options.cluster', 'ap1') }}");

        // Subscribe ke channel
        const channel = pusher.subscribe('mahasiswa');
        
        // Debug channel subscription
        channel.bind('pusher:subscription_succeeded', function() {
            console.log('Successfully subscribed to mahasiswa channel');
        });
        
        channel.bind('pusher:subscription_error', function(status) {
            console.error('Subscription error:', status);
        });

        // Listen untuk event MahasiswaCreated
        channel.bind('MahasiswaCreated', function(data) {
            console.log('Realtime event received:', data);
            
            // Tampilkan notifikasi
            const notificationArea = document.getElementById('notification-area');
            const notificationText = document.getElementById('notification-text');
            
            if (notificationArea && notificationText) {
                notificationText.textContent = 
                    `🎉 Mahasiswa baru ditambahkan: ${data.mahasiswa.nama} (${data.mahasiswa.nim}) - ${data.mahasiswa.prodi?.nama_prodi || 'Tidak ada prodi'}`;
                notificationArea.classList.remove('hidden');
                
                // Sembunyikan notifikasi setelah 5 detik
                setTimeout(() => {
                    notificationArea.classList.add('hidden');
                }, 5000);
            }
            
            // Update semua chart
            updateAllCharts();
            
            // Update table
            updateTable(data.mahasiswa);
            
            // Update statistik box
            updateStatistics();
        });

        // Fungsi untuk update table
        function updateTable(mahasiswa) {
            const tableBody = document.getElementById('mahasiswaTableBody');
            
            if (tableBody) {
                const now = new Date();
                const formattedDate = `${now.getDate().toString().padStart(2, '0')}/${(now.getMonth() + 1).toString().padStart(2, '0')}/${now.getFullYear()} ${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                
                const newRow = `
                    <tr class="bg-green-50 animate-pulse">
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="font-mono text-sm bg-green-100 px-2 py-1 rounded">${mahasiswa.nim}</span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-green-200 flex items-center justify-center mr-3">
                                    <span class="text-xs font-bold text-green-800">${mahasiswa.nama.charAt(0)}</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">${mahasiswa.nama}</span>
                                <span class="ml-2 px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Baru</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">${mahasiswa.angkatan}</span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                            ${mahasiswa.prodi?.nama_prodi || '–'}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                            ${formattedDate}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                            <a href="/mahasiswa/${mahasiswa.id}/edit" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <a href="/mahasiswa/${mahasiswa.id}/cetak-kartu" class="text-green-600 hover:text-green-900" target="_blank">Kartu</a>
                        </td>
                    </tr>
                `;
                
                // Tambah di atas
                tableBody.insertAdjacentHTML('afterbegin', newRow);
                
                // Hapus animasi setelah 2 detik
                setTimeout(() => {
                    const newRowElement = tableBody.firstElementChild;
                    if (newRowElement) {
                        newRowElement.classList.remove('animate-pulse', 'bg-green-50');
                    }
                }, 2000);
            }
        }

        // Variabel chart
        let prodiChart, angkatanChart;

        // Warna untuk chart
        const chartColors = [
            'rgba(54, 162, 235, 0.7)',  // Biru
            'rgba(255, 99, 132, 0.7)',  // Merah
            'rgba(75, 192, 192, 0.7)',  // Hijau
            'rgba(255, 205, 86, 0.7)',  // Kuning
            'rgba(153, 102, 255, 0.7)', // Ungu
            'rgba(255, 159, 64, 0.7)',  // Oranye
            'rgba(201, 203, 207, 0.7)', // Abu-abu
        ];

        // Inisialisasi semua chart
        function initCharts() {
            // Chart Mahasiswa per Prodi
            const prodiCtx = document.getElementById('mahasiswaPerProdiChart')?.getContext('2d');
            if (prodiCtx && @json(isset($chartData['prodi']))) {
                prodiChart = new Chart(prodiCtx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartData['prodi']['labels'] ?? []),
                        datasets: [{
                            label: 'Jumlah Mahasiswa',
                            data: @json($chartData['prodi']['data'] ?? []),
                            backgroundColor: chartColors,
                            borderColor: chartColors.map(color => color.replace('0.7', '1')),
                            borderWidth: 2,
                            borderRadius: 5,
                            borderSkipped: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Mahasiswa: ${context.parsed.y} orang`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0,
                                    callback: function(value) {
                                        return value + ' orang';
                                    }
                                },
                                grid: {
                                    drawBorder: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Chart Mahasiswa per Angkatan
            const angkatanCtx = document.getElementById('mahasiswaPerAngkatanChart')?.getContext('2d');
            if (angkatanCtx && @json(isset($chartData['angkatan']))) {
                angkatanChart = new Chart(angkatanCtx, {
                    type: 'line',
                    data: {
                        labels: @json($chartData['angkatan']['labels'] ?? []),
                        datasets: [{
                            label: 'Jumlah Mahasiswa',
                            data: @json($chartData['angkatan']['data'] ?? []),
                            backgroundColor: 'rgba(54, 162, 235, 0.1)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return `Angkatan ${context.label}: ${context.parsed.y} mahasiswa`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    callback: function(value) {
                                        return value + ' orang';
                                    }
                                },
                                grid: {
                                    drawBorder: false
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        }

        // Fungsi untuk update semua chart
        function updateAllCharts() {
            fetch('/admin/chart-data')
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log('Updated chart data:', data);
                    
                    // Update Chart Mahasiswa per Prodi
                    if (prodiChart && data.prodi) {
                        prodiChart.data.labels = data.prodi.labels;
                        prodiChart.data.datasets[0].data = data.prodi.data;
                        prodiChart.update('none'); // Update tanpa animasi
                    }

                    // Update Chart Mahasiswa per Angkatan
                    if (angkatanChart && data.angkatan) {
                        angkatanChart.data.labels = data.angkatan.labels;
                        angkatanChart.data.datasets[0].data = data.angkatan.data;
                        angkatanChart.update('none'); // Update tanpa animasi
                    }

                    // Update tabel statistik prodi
                    updateProdiStats(data.prodi, data.total);
                })
                .catch(error => {
                    console.error('Error updating charts:', error);
                });
        }

        // Fungsi untuk update statistik prodi
        function updateProdiStats(prodiData, total) {
            const tableBody = document.getElementById('prodiStatsBody');
            if (!tableBody || !prodiData) return;

            total = total || prodiData.data.reduce((sum, value) => sum + value, 0);
            
            let rows = '';
            prodiData.labels.forEach((label, index) => {
                const count = prodiData.data[index];
                const percentage = total > 0 ? ((count / total) * 100) : 0;
                
                rows += `
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full flex items-center justify-center bg-blue-100 text-blue-800 font-bold">
                                    ${label.charAt(0)}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">${label}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-semibold">${count}</div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: ${percentage}%"></div>
                                </div>
                                <span class="text-sm text-gray-700">${percentage.toFixed(1)}%</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                `;
            });
            
            tableBody.innerHTML = rows;
        }

        // Fungsi untuk update statistik box
        function updateStatistics() {
            // Update total mahasiswa dengan animasi
            const totalMahasiswaBox = document.querySelector('.bg-blue-50 .text-2xl');
            if (totalMahasiswaBox) {
                const currentTotal = parseInt(totalMahasiswaBox.textContent) || 0;
                totalMahasiswaBox.textContent = currentTotal + 1;
                totalMahasiswaBox.classList.add('animate-bounce');
                setTimeout(() => {
                    totalMahasiswaBox.classList.remove('animate-bounce');
                }, 1000);
            }
        }

        // Fungsi refresh manual
        function refreshData() {
            updateAllCharts();
            
            // Show loading state
            const refreshBtn = event?.target || document.querySelector('button[onclick="refreshData()"]');
            if (refreshBtn) {
                refreshBtn.innerHTML = '<svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Loading...';
                setTimeout(() => {
                    refreshBtn.innerHTML = 'Refresh';
                }, 1000);
            }
        }

        // Inisialisasi chart saat halaman load
        document.addEventListener('DOMContentLoaded', initCharts);
    </script>
    @endpush
</x-app-layout>