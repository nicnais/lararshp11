@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Dashboard Administrator') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h4>Selamat Datang, {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                            <p>Anda login sebagai <strong>Administrator</strong>. Silakan kelola data melalui menu di bawah ini:</p>
                        </div>
                    </div>

                    {{-- Menu Grid --}}
                    <div class="row">
                        {{-- Baris 1: Manajemen User & Role --}}
                        <div class="col-md-4 mb-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen User</h5>
                                    <p class="card-text">Kelola data pengguna sistem.</p>
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary btn-block">Buka</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Role</h5>
                                    <p class="card-text">Atur hak akses role.</p>
                                    <a href="{{ route('admin.role.index') }}" class="btn btn-outline-primary btn-block">Buka</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Data Pemilik</h5>
                                    <p class="card-text">Data pemilik hewan.</p>
                                    <a href="{{ route('admin.pemilik.index') }}" class="btn btn-outline-primary btn-block">Buka</a>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 2: Data Master Hewan --}}
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.jenis_hewan.index') }}" class="btn btn-secondary btn-block py-3">
                                Jenis Hewan
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.ras-hewan.index') }}" class="btn btn-secondary btn-block py-3">
                                Ras Hewan
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.pet.index') }}" class="btn btn-secondary btn-block py-3">
                                Data Pet / Hewan
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary btn-block py-3">
                                Kategori
                            </a>
                        </div>

                        {{-- Baris 3: Medis --}}
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.kategori-klinis.index') }}" class="btn btn-info btn-block text-white">
                                Kategori Klinis
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="btn btn-info btn-block text-white">
                                Kode Tindakan & Terapi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection