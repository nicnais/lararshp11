<?php

namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rekam_medis;

class rekammedisController extends Controller
{
    public function index()
    {
        $rekam_medis = rekam_medis::all();
        return view('perawat.rekam_medis.index', compact('rekam_medis'));
    }
}
