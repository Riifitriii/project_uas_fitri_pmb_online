<x-app-layout>
    <x-slot name="title">Profile Mahasiswa</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

                    @if($mahasiswa)
                        <h3 class="mt-4">Data Pribadi</h3>
                        <table class="min-w-full mt-2 border border-gray-200">
                            <tr class="border-b">
                                <td class="py-2 px-4 font-medium">NIM</td>
                                <td class="py-2 px-4">{{ $mahasiswa->nim }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4 font-medium">Nama</td>
                                <td class="py-2 px-4">{{ $mahasiswa->nama }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4 font-medium">Angkatan</td>
                                <td class="py-2 px-4">{{ $mahasiswa->angkatan }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4 font-medium">Prodi</td>
                                <td class="py-2 px-4">{{ $mahasiswa->prodi?->nama_prodi ?? '–' }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 px-4 font-medium">Foto</td>
                                <td class="py-2 px-4">
                                    @if($mahasiswa->foto)
                                        <img src="{{ asset('storage/mahasiswa/' . $mahasiswa->foto) }}"
                                             alt="Foto" class="w-16 h-16 rounded mt-1">
                                    @else
                                        –
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Edit Data Pribadi
                        </a>
                    @else
                        <div class="mt-4 p-4 bg-red-100 text-red-700 rounded">
                            Data pribadi Anda belum tersedia. Silakan hubungi admin.
                        </div>
                    @endif

                    <h3 class="mt-6">Pengaturan Akun</h3>
                    <a href="{{ route('profile.edit') }}" class="inline-block mt-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Ganti Password / Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>