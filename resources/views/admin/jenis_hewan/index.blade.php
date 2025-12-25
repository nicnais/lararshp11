{{-- Menggunakan layout utama aplikasi agar tampilan konsisten --}}
@extends('layouts.app')

{{-- Judul halaman --}}
@section('title', 'Daftar Jenis Hewan')

{{-- Konten utama --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            {{-- Menampilkan pesan sukses jika ada (dari redirect function store) --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- STEP 5: Tombol Tambah --}}
            <div class="mb-3">
                <a href="{{ route('admin.jenis-hewan.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Jenis Hewan
                </a>
            </div>

            {{-- Tabel Data --}}
            <div class="card">
                <div class="card-header">Data Jenis Hewan</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Jenis Hewan</th>
                                <th>Aksi</th> {{-- Kolom tambahan untuk Edit/Hapus nanti --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis_hewan as $index => $hewan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $hewan->nama_jenis_hewan }}</td>
                                    <td>
                                        {{-- Tempat tombol Edit dan Hapus nanti --}}
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