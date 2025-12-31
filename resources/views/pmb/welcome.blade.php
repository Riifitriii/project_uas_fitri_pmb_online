<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMB Online - Universitas Masoem</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body { font-family: 'Segoe UI', system-ui, sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-700 text-white py-6">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <h1 class="text-3xl font-bold">PENERIMAAN MAHASISWA BARU</h1>
                <p class="mt-2 text-blue-100">Universitas Masoem Tahun Akademik 2026/2027</p>
            </div>
        </header>
        <main class="flex-grow flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full text-center">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Selamat Datang, Calon Mahasiswa!</h2>
                <p class="text-gray-600 mb-8">
                    Silakan pilih aksi yang sesuai:
                </p>
                <a href="{{ route('pmb.daftar') }}" 
                   class="block w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-lg mb-4 transition">
                    📝 Daftar sebagai Calon Mahasiswa
                </a>
                <a href="{{ route('login') }}" 
                   class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition">
                    🔐 Login Admin / Petugas
                </a>
                <div class="mt-6 text-sm text-gray-500">
                    <p>Butuh bantuan? Hubungi panitia PMB di pmb@masoem.ac.id</p>
                </div>
            </div>
        </main>
        <footer class="bg-gray-800 text-white text-center py-4 text-sm">
            &copy; {{ date('Y') }} Universitas Masoem. All rights reserved.
        </footer>
    </div>
</body>
</html>