<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pet</th>
            <th>Tanggal Lahir</th>
            <th>Warna Tanda</th>
            <th>Jenis Kelamin</th>
            <th>ID Pemilik</th>
            <th>ID Ras Hewan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pets as $pet)
        <tr>
            <td>{{ $pet->idpet }}</td>
            <td>{{ $pet->nama }}</td>
            <td>{{ $pet->tanggal_lahir }}</td>
            <td>{{ $pet->warna_tanda }}</td>
            <td>{{ $pet->jenis_kelamin }}</td>
            <td>{{ $pet->idpemilik }}</td>
            <td>{{ $pet->idras_hewan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>