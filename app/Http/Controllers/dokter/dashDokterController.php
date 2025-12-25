<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashDokterController extends Controller
{
    public function index()
    {
        return view('dokter.dashboardDokter');
    }

    public function profile()
    {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('dokter.profile', compact('user'));
    }
}