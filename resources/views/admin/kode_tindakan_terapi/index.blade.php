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
                <a href="{{ route('admin.kode-tindakan-terapi.create') }}" class="btn btn-primary">
                    Tambah Data
                </a>
            </div>

            <div class="card">
                <div class="card-header">Data Kode Tindakan & Terapi</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Kategori Klinis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kode_tindakan_terapi as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->deskripsi_tindakan_terapi }}</td>
                                {{-- PERBAIKAN: Gunakan idkategori (tanpa underscore) --}}
                                <td>{{ $item->nama_kategori ?? $item->idkategori }}</td> 
                                {{-- PERBAIKAN: Gunakan idkategori_klinis (tanpa underscore) --}}
                                <td>{{ $item->nama_kategori_klinis ?? $item->idkategori_klinis }}</td>
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