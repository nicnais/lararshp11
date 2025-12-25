@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <i class="fas fa-paw"></i> {{ __('Dashboard Pemilik Hewan') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h4>Halo, Kak {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                            <p>Selamat datang di RSHP Unair.</p>
                        </div>
                    </div>

                    {{-- Menu Grid Pemilik --}}
                    <div class="row">
                        {{-- View Profil & Pet --}}
                        <div class="col-md-4 mb-3">
                            <div class="card text-center h-100 border-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Profil & Hewan</h5>
                                    <p class="card-text small">Data diri dan daftar hewan peliharaan.</p>
                                    <a href="{{ route('pemilik.profil.index') }}" class="btn btn-warning btn-block">Lihat Pet Saya</a>
                                </div>
                            </div>
                        </div>

                        {{-- View Jadwal Temu Dokter --}}
                        <div class="col-md-4 mb-3">
                            <div class="card text-center h-100 border-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Jadwal Dokter</h5>
                                    <p class="card-text small">Cek jadwal praktek dokter.</p>
                                    <a href="{{ route('pemilik.temudokter.index') }}" class="btn btn-warning btn-block">Cek Jadwal</a>
                                </div>
                            </div>
                        </div>

                         {{-- View Rekam Medis --}}
                         <div class="col-md-4 mb-3">
                            <div class="card text-center h-100 border-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Riwayat Medis</h5>
                                    <p class="card-text small">Lihat riwayat pengobatan hewan.</p>
                                    <a href="{{ route('pemilik.rekam_medis.index') }}" class="btn btn-warning btn-block">Lihat History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection