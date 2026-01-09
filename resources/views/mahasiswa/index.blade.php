<x-app-layout>
    <x-slot name="title">Dashboard Mahasiswa</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Mahasiswa</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <!-- 🔍 Input Pencarian dan Area Hasil -->
                <div class="mb-6 max-w-3xl">
                    <label for="searchInput" class="block text-sm font-medium text-gray-700">
                        Cari Mahasiswa (min. 3 huruf)
                    </label>
                    <input type="text" id="searchInput" class="mt-1 block w-full border border-gray-300 rounded p-2"
                           placeholder="Cari berdasarkan NIM, Nama, atau Prodi...">
                </div>

                <!-- 📋 Area Hasil Pencarian -->
                <div id="searchResults" class="hidden mb-6">
                    <h3 class="text-lg font-medium mb-3">Hasil Pencarian:</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Prodi</th>
                                </tr>
                            </thead>
                            <tbody id="searchResultBody" class="bg-white divide-y divide-gray-200"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel Utama -->
                <div id="fullTable">
                    <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
                        Tambah Mahasiswa
                    </a>
                    <a href="{{ route('mahasiswa.export') }}" class="px-4 py-2 bg-green-600 text-white rounded mb-4 inline-block ml-2">
                        Export Excel
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen Pembimbing</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($mahasiswa as $m)
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @if($m->foto)
                                            <img src="{{ asset('storage/mahasiswa/' . $m->foto) }}"
                                                 alt="Foto {{ $m->nama }}"
                                                 class="w-10 h-10 rounded object-cover">
                                        @else
                                            <span>–</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $m->nim }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $m->nama }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $m->angkatan }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $m->prodi?->nama_prodi ?? '–' }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">{{ $m->dosenPembimbing?->nama ?? '–' }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <a href="{{ route('mahasiswa.edit', $m->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    $(document).ready(function () {
        let searchTimeout;

        $('#searchInput').on('input', function () {
            const keyword = $(this).val().trim();
            clearTimeout(searchTimeout);

            // Sembunyikan hasil pencarian, tampilkan tabel penuh jika kurang dari 3 huruf
            if (keyword.length < 3) {
                $('#searchResults').addClass('hidden'); // Tailwind
                $('#fullTable').removeClass('hidden'); // Tailwind
                return;
            }

            searchTimeout = setTimeout(() => {
                axios.get('{{ route("mahasiswa.cari") }}', { params: { q: keyword } })
                    .then(response => {
                        const results = response.data;
                        const tbody = $('#searchResultBody');
                        tbody.empty();

                        if (Array.isArray(results) && results.length > 0) {
                            results.forEach(mhs => {
                                tbody.append(`
                                    <tr class="bg-white border-b">
                                        <td class="px-4 py-2">${mhs.nim}</td>
                                        <td class="px-4 py-2">${mhs.nama}</td>
                                        <td class="px-4 py-2">${mhs.prodi || '–'}</td>
                                    </tr>
                                `);
                            });
                            $('#searchResults').removeClass('hidden'); // Tampilkan hasil
                            $('#fullTable').addClass('hidden');       // Sembunyikan tabel penuh
                        } else {
                            tbody.append(`
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-500">Tidak ditemukan</td>
                                </tr>
                            `);
                            $('#searchResults').removeClass('hidden');
                            $('#fullTable').addClass('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('AJAX Error:', error);
                        alert('Terjadi kesalahan saat mencari data. Cek DevTools → Console.');
                    });
            }, 300);
        });
    });
    </script>
    @endpush
</x-app-layout>