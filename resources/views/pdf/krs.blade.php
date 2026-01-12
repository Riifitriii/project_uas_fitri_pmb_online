<!DOCTYPE html>
<html>
<head>
    <title>Kartu Rencana Studi (KRS)</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', serif;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .header {
            display: flex;
            align-items: flex-start;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .logo {
            width: 150px;
            height: 150px;
            float: left;
        }
        .info-kampus {
            flex-grow: 1;
            text-align: center; 
        }
        .info-kampus h1 {
            font-size: 26px;
            margin: 0;
            text-transform: uppercase;
            font-weight: bold;
            font-family: Georgia, 'Times New Roman', serif;
        }
        .info-kampus p {
            font-size: 12px;
            margin: 2px 0;
            font-family: Georgia, 'Times New Roman', serif;
        }
        .info-kampus .terakreditasi {
            font-weight: bold;
            font-size: 12px;
            font-family: Georgia, 'Times New Roman', serif;
        }
        .info-kampus .contact {
            font-size: 9px;
            margin: 2px 0;
            font-family: Georgia, 'Times New Roman', serif;
        }
        .info-kampus a {
            color: blue;
            text-decoration: underline;
        }
        .info-mahasiswa {
            margin-bottom: 20px;
        }
        .info-mahasiswa table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-mahasiswa td {
            padding: 4px 0;
        }
        .info-mahasiswa td:first-child {
            width: 30%;
        }
        .table-krs {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table-krs th, .table-krs td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .table-krs th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- HEADER KAMPUS -->
    <div class="header">
        <!-- Logo -->
        <img src="{{ public_path('images/logo-masoem.png') }}" alt="Logo Universitas Ma'soem" class="logo">

        <!-- Info Kampus -->
        <div class="info-kampus">
            <h1>UNIVERSITAS MA'SOEM</h1>
            <p>SK. No.: 653/SK/BAN-PT/AK.Ppj/PT/IX/2023</p>
            <p class="terakreditasi">Terakreditasi BAN-PT</p>
            <p class="contact">
                Kampus: Jl. Raya Cipacing No. 22 Jatinangor – Sumedang – Indonesia 45363<br>
                Telp. (022) 7798340 Fax. (022) 7798243
            </p>
            <p class="contact">
                Email: <a href="mailto:info@masoemuniversity.ac.id">info@masoemuniversity.ac.id</a> Web Site: <a href="http://www.masoemuniversity.ac.id">www.masoemuniversity.ac.id</a>
            </p>
        </div>
    </div>

    <!-- INFO MAHASISWA -->
    <div class="info-mahasiswa">
        <table>
            <tr>
                <td>NIM</td>
                <td>: {{ $mahasiswa->nim }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $mahasiswa->nama }}</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>: {{ $mahasiswa->prodi?->nama_prodi ?? '–' }}</td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td>: {{ $mahasiswa->angkatan }}</td>
            </tr>
        </table>
    </div>

    <!-- TABEL KRS -->
    <table class="table-krs">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh data statis -->
            <tr>
                <td>1</td>
                <td>IF101</td>
                <td>Pemrograman Web</td>
                <td>3</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>IF102</td>
                <td>Algoritma dan Struktur Data</td>
                <td>3</td>
                <td>1</td>
            </tr>
            <tr>
                <td>3</td>
                <td>IF103</td>
                <td>Matematika Diskrit</td>
                <td>2</td>
                <td>1</td>
            </tr>
            <tr>
                <td>4</td>
                <td>IF104</td>
                <td>Pengantar Teknologi Informasi</td>
                <td>2</td>
                <td>1</td>
            </tr>
        </tbody>
    </table>

    <!-- QR CODE -->
    <div class="footer">
        <p>QR Code KRS</p>
        <img src="{{ $qrCodePng }}" alt="QR Code" style="width: 150px; height: 150px;">
        <p>Link KRS: {{ route('mahasiswa.cetak-krs', $mahasiswa->id) }}</p>
        Dicetak pada: {{ now()->format('d M Y H:i:s') }}
    </div>
</body>
</html>