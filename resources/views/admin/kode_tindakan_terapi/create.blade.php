@extends('layouts.app')

@section('title', 'Tambah Kode Tindakan & Terapi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kode Tindakan & Terapi</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.kode-tindakan-terapi.store') }}" method="POST">
                        @csrf

                        {{-- Input Kode (Tidak berubah) --}}
                        <div class="form-group mb-3">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control @error('kode') is-invalid @enderror" 
                                   id="kode" name="kode" value="{{ old('kode') }}" placeholder="Contoh: K001" required>
                            @error('kode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Input Deskripsi (Tidak berubah) --}}
                        <div class="form-group mb-3">
                            <label for="deskripsi_tindakan_terapi">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi_tindakan_terapi') is-invalid @enderror" 
                                   id="deskripsi_tindakan_terapi" name="deskripsi_tindakan_terapi" 
                                   value="{{ old('deskripsi_tindakan_terapi') }}" placeholder="Contoh: Pemeriksaan Ringan" required>
                            @error('deskripsi_tindakan_terapi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Dropdown Kategori (PERBAIKAN NAME) --}}
                        <div class="form-group mb-3">
                            <label for="idkategori">Kategori</label>
                            <select class="form-control @error('idkategori') is-invalid @enderror" id="idkategori" name="idkategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $kat)
                                    <option value="{{ $kat->idkategori }}" {{ old('idkategori') == $kat->idkategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Dropdown Kategori Klinis (PERBAIKAN NAME) --}}
                        <div class="form-group mb-3">
                            <label for="idkategori_klinis">Kategori Klinis</label>
                            <select class="form-control @error('idkategori_klinis') is-invalid @enderror" id="idkategori_klinis" name="idkategori_klinis" required>
                                <option value="">-- Pilih Kategori Klinis --</option>
                                @foreach($kategori_klinis as $klinis)
                                    <option value="{{ $klinis->idkategori_klinis }}" {{ old('idkategori_klinis') == $klinis->idkategori_klinis ? 'selected' : '' }}>
                                        {{ $klinis->nama_kategori_klinis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idkategori_klinis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection