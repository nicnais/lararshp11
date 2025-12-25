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
                <a href="{{ route('admin.kategori-klinis.create') }}" class="btn btn-primary">
                    Tambah Kategori Klinis
                </a>
            </div>

            <div class="card">
                <div class="card-header">Data Kategori Klinis</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori Klinis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori_klinis as $index => $kategori)
                            <tr>
                                <td>{{ $index + 1 }}</td> {{-- Menggunakan index loop agar urut --}}
                                <td>{{ $kategori->nama_kategori_klinis }}</td>
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