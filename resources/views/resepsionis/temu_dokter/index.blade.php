<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Reservasi Dokter</th>
            <th>No. Urut</th>
            <th>Waktu Daftar</th>
            <th>Status</th>
            <th>ID Pet</th>
            <th>ID Role User</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($temu_dokter as $temu)
        <tr>
            <td>{{ $temu->idreservasi_dokter }}</td>
            <td>{{ $temu->no_urut }}</td>
            <td>{{ $temu->waktu_daftar }}</td>
            <td>{{ $temu->status }}</td>
            <td>{{ $temu->idpet }}</td>
            <td>{{ $temu->idrole_user }}</td>
        </tr>
        @endforeach
    </tbody>
</table>