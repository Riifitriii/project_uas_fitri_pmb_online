<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Calon Mahasiswa</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-medium mb-4">Calon Mahasiswa Baru</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Angkatan</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prodi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($calonMahasiswa as $c)
                            <tr>
                                <td class="px-4 py-3">{{ $c->id }}</td>
                                <td class="px-4 py-3">{{ $c->nama }}</td>
                                <td class="px-4 py-3">{{ $c->angkatan }}</td>
                                <td class="px-4 py-3">{{ $c->prodi?->nama_prodi ?? '–' }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs rounded {{ $c->status === 'diterima' ? 'bg-green-100 text-green-800' : ($c->status === 'ditolak' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($c->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $c->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    @if($c->status === 'menunggu')
                                        <form action="{{ route('calon-mahasiswa.terima', $c->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-green-600 hover:underline" onclick="return confirm('Terima calon mahasiswa ini?')">Terima</button>
                                        </form>
                                        |
                                        <form action="{{ route('calon-mahasiswa.tolak', $c->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tolak calon mahasiswa ini?')">Tolak</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada calon mahasiswa.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>