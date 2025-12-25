<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Rekam Medis</th>
            <th>Created At</th>
            <th>Anamnesa</th>
            <th>Temuan Klinis</th>
            <th>Diagnosa</th>
            <th>ID Pet</th>
            <th>Dokter Pemeriksa</th>
            <th>ID Reservasi Dokter</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekam_medis as $rekam)
        <tr>
            <td>{{ $rekam->idrekam_medis }}</td>
            <td>{{ $rekam->created_at }}</td>
            <td>{{ $rekam->anamnesa }}</td>
            <td>{{ $rekam->temuan_klinis }}</td>
            <td>{{ $rekam->diagnosa }}</td>
            <td>{{ $rekam->idpet }}</td>
            <td>{{ $rekam->dokter_pemeriksa }}</td>
            <td>{{ $rekam->idreservasi_dokter }}</td>
        </tr>
        @endforeach
    </tbody>