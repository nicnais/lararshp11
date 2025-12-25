@extends('layouts.app')

@section('title', 'Tambah Kategori Klinis')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kategori Klinis</div>

                <div class="card-body">
                    {{-- Tampilkan Error jika ada --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.kategori-klinis.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama_kategori_klinis">Nama Kategori Klinis</label>
                            <input type="text" 
                                   class="form-control @error('nama_kategori_klinis') is-invalid @enderror" 
                                   id="nama_kategori_klinis" 
                                   name="nama_kategori_klinis" 
                                   value="{{ old('nama_kategori_klinis') }}" 
                                   placeholder="Contoh: Pemeriksaan Umum" 
                                   required>
                            
                            @error('nama_kategori_klinis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection