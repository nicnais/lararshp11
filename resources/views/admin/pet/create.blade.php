@extends('layouts.app')

@section('title', 'Tambah Data Pet/Hewan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Pet / Hewan</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.pet.store') }}" method="POST">
                        @csrf

                        {{-- Nama Hewan --}}
                        <div class="form-group mb-3">
                            <label>Nama Hewan</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Warna / Tanda --}}
                        <div class="form-group mb-3">
                            <label>Warna / Tanda</label>
                            <input type="text" name="warna_tanda" class="form-control @error('warna_tanda') is-invalid @enderror" value="{{ old('warna_tanda') }}" placeholder="Contoh: Belang Tiga" required>
                            @error('warna_tanda')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div class="form-group mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="M" {{ old('jenis_kelamin') == 'M' ? 'selected' : '' }}>Jantan (Male)</option>
                                <option value="F" {{ old('jenis_kelamin') == 'F' ? 'selected' : '' }}>Betina (Female)</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Dropdown Pemilik --}}
                        <div class="form-group mb-3">
                            <label>Pemilik</label>
                            <select name="idpemilik" class="form-control @error('idpemilik') is-invalid @enderror" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach($pemilik as $p)
                                    <option value="{{ $p->idpemilik }}" {{ old('idpemilik') == $p->idpemilik ? 'selected' : '' }}>
                                        {{ $p->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idpemilik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Dropdown Ras Hewan --}}
                        <div class="form-group mb-3">
                            <label>Ras Hewan</label>
                            <select name="idras_hewan" class="form-control @error('idras_hewan') is-invalid @enderror" required>
                                <option value="">-- Pilih Ras --</option>
                                @foreach($ras_hewan as $ras)
                                    <option value="{{ $ras->idras_hewan }}" {{ old('idras_hewan') == $ras->idras_hewan ? 'selected' : '' }}>
                                        {{ $ras->nama_ras }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idras_hewan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection