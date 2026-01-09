<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Prodi</th>
            <th>Dosen Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $m)
        <tr>
            <td>{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->angkatan }}</td>
            <td>{{ $m->prodi?->nama_prodi ?? '' }}</td>
            <td>{{ $m->dosenPembimbing?->nama ?? '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>