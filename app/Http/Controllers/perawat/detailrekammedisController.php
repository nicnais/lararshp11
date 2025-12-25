<?php

namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detail_rekam_medis;

class detailrekammedisController extends Controller
{
    public function index()
    {
        $detail_rekam_medis = detail_rekam_medis::all();
        return view('perawat.detail_rekam_medis.index', compact('detail_rekam_medis'));
    }
}
