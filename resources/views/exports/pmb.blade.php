<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>Prodi</th>
            <th>Status</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pmb as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->angkatan }}</td>
            <td>{{ $c->prodi?->nama_prodi ?? '' }}</td>
            <td>{{ $c->status }}</td>
            <td>{{ $c->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>