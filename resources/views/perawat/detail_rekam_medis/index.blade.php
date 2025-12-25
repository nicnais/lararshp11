<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Detail Rekam Medis</th>
            <th>ID Rekam Medis</th>
            <th>ID Kode Tindakan Terapi</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detail_rekam_medis as $rekam)
        <tr>
            <td>{{ $rekam->iddetail_rekam_medis }}</td>
            <td>{{ $rekam->idrekam_medis }}</td>
            <td>{{ $rekam->idkode_tindakan_terapi }}</td>
            <td>{{ $rekam->detail }}</td>
        </tr>
        @endforeach
    </tbody>