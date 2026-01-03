<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white fixed inset-y-0">
        <div class="px-6 py-5 text-xl font-bold border-b border-slate-700">
            PMB Online
        </div>
        <nav class="mt-6 space-y-1 px-3 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800 transition">
                Dashboard
            </a>
            <a href="{{ route('mahasiswa.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800 transition">
                Kelola Mahasiswa
            </a>
            <a href="{{ route('prodi.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800 transition">
                Kelola Prodi
            </a>
            <a href="{{ route('dosen.index') }}"
               class="block px-4 py-2 rounded hover:bg-slate-800 transition">
                Kelola Dosen
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 ml-64 p-8">
        <!-- Topbar -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800">
                @yield('page-title')
            </h1>
            <div class="text-sm text-gray-600">
                {{ auth()->user()->name }}
            </div>
        </div>

        @yield('content')
    </main>
</div>

</body>
</html>
