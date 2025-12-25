@extends('layouts.app')

@section('title', 'Tambah Role')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Role</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('admin.role.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Role</label>
                            <input type="text" name="nama_role" class="form-control @error('nama_role') is-invalid @enderror" 
                                   value="{{ old('nama_role') }}" placeholder="Contoh: Admin, Dokter" required>
                            @error('nama_role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection