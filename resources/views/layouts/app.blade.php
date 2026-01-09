<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-4 font-bold text-xl border-b border-gray-700">
                PMB Online
            </div>

            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('mahasiswa.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    Kelola Mahasiswa
                </a>

                <a href="{{ route('prodi.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    Kelola Prodi
                </a>

                <a href="{{ route('dosen.index') }}"
                   class="block px-4 py-2 rounded hover:bg-gray-700">
                    Kelola Dosen
                </a>
                <a href="{{ route('calon-mahasiswa.index') }}"
                    class="block px-4 py-2 rounded hover:bg-gray-700">
                    Calon Mahasiswa
                </a>
            </nav>
        </aside>

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col">

            {{-- Navbar Breeze --}}
            @include('layouts.navigation')

            {{-- Header --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-6">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Content --}}
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>
