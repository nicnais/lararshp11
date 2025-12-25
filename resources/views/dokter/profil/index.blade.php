@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Profil Dokter</div>
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ $user->nama }}&background=17a2b8&color=fff" class="rounded-circle mb-3" width="100">
                    <h4>dr. {{ $user->nama }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    <hr>
                    <div class="text-left">
                        <p><strong>Role:</strong> Dokter Hewan</p>
                        <p><strong>Status Akun:</strong> Aktif</p>
                        {{-- Tambahkan info spesialisasi jika ada tabel dokter --}}
                    </div>
                    <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection