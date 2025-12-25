@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mb-3">
                <a href="{{ route('admin.pet.create') }}" class="btn btn-primary">Tambah Data Pet</a>
            </div>

            <div class="card">
                <div class="card-header">Data Pet / Hewan</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Hewan</th>
                                <th>Jenis Kelamin</th>
                                <th>Ras</th>
                                <th>Pemilik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pet as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->nama }}</strong><br>
                                    <small class="text-muted">{{ $item->warna_tanda }}</small>
                                </td>
                                <td>{{ $item->jenis_kelamin == 'M' ? 'Jantan' : 'Betina' }}</td>
                                <td>{{ $item->nama_ras }}</td>
                                <td>{{ $item->nama_pemilik }}</td>
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