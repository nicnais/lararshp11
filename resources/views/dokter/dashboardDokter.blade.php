@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-user-md"></i> {{ __('Dashboard Dokter') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h4>Selamat Datang, dr. {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                            <p>Silakan akses menu di bawah ini untuk memulai praktek.</p>
                        </div>
                    </div>

                    {{-- Menu Grid Dokter --}}
                    <div class="row">
                        {{-- View Data Pasien --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pasien</h5>
                                    <p class="card-text small">Lihat daftar pasien hewan.</p>
                                    <a href="{{ route('dokter.pet.index') }}" class="btn btn-info text-white btn-block">Lihat Pasien</a>
                                </div>
                            </div>
                        </div>

                        {{-- View Rekam Medis --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title">Rekam Medis</h5>
                                    <p class="card-text small">Lihat riwayat medis pasien.</p>
                                    <a href="{{ route('dokter.rekam_medis.index') }}" class="btn btn-info text-white btn-block">Lihat History</a>
                                </div>
                            </div>
                        </div>

                        {{-- CRUD Detail Rekam Medis --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title">Input Diagnosa</h5>
                                    <p class="card-text small">Isi detail pemeriksaan & resep.</p>
                                    <a href="{{ route('dokter.detail_rekam_medis.index') }}" class="btn btn-info text-white btn-block">Input Detail</a>
                                </div>
                            </div>
                        </div>

                        {{-- View Profil Dokter --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-info">
                                <div class="card-body">
                                    <h5 class="card-title">Profil Saya</h5>
                                    <p class="card-text small">Lihat data diri dokter.</p>
                                    <a href="{{ route('dokter.profil.index') }}" class="btn btn-outline-info btn-block">Profil</a>
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