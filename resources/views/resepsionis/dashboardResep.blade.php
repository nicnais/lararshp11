@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-success text-white">
                    {{ __('Dashboard Resepsionis') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Halo, {{ Auth::user()->nama ?? Auth::user()->name }}!</h4>
                    <p>Selamat bekerja.</p>

                    <div class="list-group mt-4">
                        {{-- Contoh Menu Resepsionis (Sesuaikan route jika sudah dibuat) --}}
                        <a href="{{ route('resepsionis.profil.index') }}" class="list-group-item list-group-item-action">Pendaftaran Pasien Baru</a>
                        <a href="{{ route('resepsionis.pet.index') }}" class="list-group-item list-group-item-action">Cari Data Pasien</a>
                        <a href="{{ route('resepsionis.temu_dokter.index') }}" class="list-group-item list-group-item-action">Jadwal Praktek Dokter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection