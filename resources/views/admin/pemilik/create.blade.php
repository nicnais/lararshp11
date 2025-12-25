@extends('layouts.app')

@section('title', 'Tambah Data Pemilik')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Pemilik</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.pemilik.store') }}" method="POST">
                        @csrf

                        {{-- Dropdown User --}}
                        <div class="form-group mb-3">
                            <label for="iduser">Pilih User Akun</label>
                            <select class="form-control @error('iduser') is-invalid @enderror" id="iduser" name="iduser" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                                        {{ $user->nama }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('iduser')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Input No WA --}}
                        <div class="form-group mb-3">
                            <label for="no_wa">No. WhatsApp</label>
                            <input type="text" class="form-control @error('no_wa') is-invalid @enderror" 
                                   id="no_wa" name="no_wa" value="{{ old('no_wa') }}" placeholder="Contoh: 08123456789" required>
                            @error('no_wa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Input Alamat --}}
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                      id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection