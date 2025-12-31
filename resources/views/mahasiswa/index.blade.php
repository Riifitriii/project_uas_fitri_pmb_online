<x-app-layout>
    <x-slot name="title">Dashboard Mahasiswa</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Mahasiswa</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded mb-4 inline-block">
                    Tambah Mahasiswa
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
</x-app-layout>