@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class="fas fa-user-nurse"></i> {{ __('Dashboard Perawat') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h4>Halo, Ners {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                            <p>Selamat bertugas.</p>
                        </div>
                    </div>

                    {{-- Menu Grid Perawat --}}
                    <div class="row">
                        {{-- View Data Pasien --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-success">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pasien</h5>
                                    <p class="card-text small">Cari data pasien.</p>
                                    <a href="{{ route('perawat.pet.index') }}" class="btn btn-success btn-block">Lihat Pasien</a>
                                </div>
                            </div>
                        </div>

                        {{-- CRUD Rekam Medis (Pendaftaran/TTV) --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-success">
                                <div class="card-body">
                                    <h5 class="card-title">Kelola Rekam Medis</h5>
                                    <p class="card-text small">Input pemeriksaan awal (TTV).</p>
                                    <a href="{{ route('perawat.rekam_medis.index') }}" class="btn btn-success btn-block">Input Data</a>
                                </div>
                            </div>
                        </div>

                        {{-- View Detail Rekam Medis --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-success">
                                <div class="card-body">
                                    <h5 class="card-title">Lihat Detail RM</h5>
                                    <p class="card-text small">Lihat hasil pemeriksaan dokter.</p>
                                    <a href="{{ route('perawat.detail_rekam_medis.index') }}" class="btn btn-success btn-block">Lihat Detail</a>
                                </div>
                            </div>
                        </div>

                        {{-- View Profil Perawat --}}
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100 border-success">
                                <div class="card-body">
                                    <h5 class="card-title">Profil Saya</h5>
                                    <p class="card-text small">Lihat data diri perawat.</p>
                                    <a href="{{ route('perawat.profil.index') }}" class="btn btn-outline-success btn-block">Profil</a>
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