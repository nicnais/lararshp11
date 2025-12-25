@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <a href="{{ route('admin.ras-hewan.create') }}" class="btn btn-primary">
                    Tambah Ras Hewan
                </a>
            </div>

            <div class="card">
                <div class="card-header">Data Ras Hewan</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Hewan</th>
                                <th>Nama Ras</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ras_hewan as $index => $ras)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                {{-- Menampilkan Nama Jenis Hewan (hasil join di controller) --}}
                                <td>{{ $ras->nama_jenis_hewan ?? $ras->idjenis_hewan }}</td>
                                <td>{{ $ras->nama_ras }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection