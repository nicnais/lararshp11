<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\temu_dokter;

class temuDokterController extends Controller
{
    public function index()
    {
        $temu_dokter = temu_dokter::all(); 
        return view('pemilik.temu_dokter.index', compact('temu_dokter'));
    }
}