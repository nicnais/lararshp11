<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\temu_dokter;

class temuDokterController extends Controller
{
    public function index()
    {
        $temu_dokter = temu_dokter::all(); 
        return view('resepsionis.temu_dokter.index', compact('temu_dokter'));
    }
}