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
                <a href="{{ route('admin.pemilik.create') }}" class="btn btn-primary">
                    Tambah Data Pemilik
                </a>
            </div>

            <div class="card">
                <div class="card-header">Data Pemilik</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>No WA</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemilik as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                {{-- Menampilkan Nama User dari hasil Join di Controller --}}
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->no_wa }}</td>
                                <td>{{ $item->alamat }}</td>
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