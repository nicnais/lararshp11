@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- BAGIAN 1: DATA PEMILIK --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header bg-warning text-dark">Data Pemilik</div>
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ $user->nama }}&background=ffc107&color=000" class="rounded-circle mb-3" width="100">
                    <h5>{{ $user->nama }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>
                    <hr>
                    <div class="text-left">
                        @if($dataPemilik)
                            <p><strong>Alamat:</strong> <br> {{ $dataPemilik->alamat ?? '-' }}</p>
                            <p><strong>No. HP:</strong> <br> {{ $dataPemilik->no_hp ?? '-' }}</p>
                        @else
                            <div class="alert alert-danger small">
                                Data detail pemilik belum dilengkapi. Hubungi admin/resepsionis.
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('resepsionis.dashboard') }}" class="btn btn-secondary btn-block mt-3">Kembali</a>
                </div>
            </div>
        </div>

        {{-- BAGIAN 2: DAFTAR HEWAN PELIHARAAN --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Hewan Peliharaan Saya ({{ count($daftarHewan) }})
                </div>
                <div class="card-body">
                    @if(count($daftarHewan) > 0)
                        <div class="row">
                            @foreach($daftarHewan as $pet)
                            <div class="col-md-6 mb-3">
                                <div class="card border-warning">
                                    <div class="card-body">
                                        <h5 class="card-title text-warning">
                                            <i class="fas fa-paw"></i> {{ $pet->nama_pet }}
                                        </h5>
                                        <table class="table table-sm table-borderless small">
                                            <tr>
                                                <td width="30%">Jenis</td>
                                                <td>: {{ $pet->ras_hewan->jenis_hewan->jenis ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ras</td>
                                                <td>: {{ $pet->ras_hewan->ras ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>: {{ $pet->gender ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Umur</td>
                                                <td>: {{ $pet->umur ?? '-' }}</td>
                                            </tr>
                                        </table>
                                        <button class="btn btn-sm btn-outline-dark btn-block">Lihat Detail Medis</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <h3 class="text-muted"><i class="fas fa-cat"></i></h3>
                            <p>Anda belum mendaftarkan hewan peliharaan.</p>
                            <p class="small text-muted">Silakan hubungi resepsionis untuk mendaftarkan hewan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection