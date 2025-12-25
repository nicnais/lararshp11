<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashPemilikController extends Controller
{
    public function index()
    {
        return view('pemilik.dashboardPemilik');
    }

    public function profile()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $dataPemilik = $user->pemilik;
        $daftarHewan = $dataPemilik ? $dataPemilik->pets : [];
        return view('pemilik.profile', compact('user', 'dataPemilik', 'daftarHewan'));
    }
}