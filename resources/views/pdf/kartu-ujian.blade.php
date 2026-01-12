<!DOCTYPE html>
<html>
<head>
    <title>Kartu Ujian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .card {
            width: 400px;
            border: 2px solid #000;
            padding: 20px;
            text-align: center;
            margin: 20px auto;
        }
        .header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .content {
            text-align: left;
            margin-top: 20px;
        }
        .photo {
            text-align: center;
            margin-top: 10px;
        }
        .photo img {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">KARTU UJIAN</div>
        <div class="content">
            <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
            <p><strong>Prodi:</strong> {{ $mahasiswa->prodi?->nama_prodi ?? '–' }}</p>
            <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
        </div>
        <div class="photo">
            @if($mahasiswa->foto)
                <img src="{{ public_path('storage/mahasiswa/' . $mahasiswa->foto) }}" alt="Foto">
            @else
                <p>Foto Tidak Ada</p>
            @endif
        </div>
        <div class="footer">
            Dicetak pada: {{ now()->format('d M Y H:i:s') }}
        </div>
    </div>
</body>
</html>