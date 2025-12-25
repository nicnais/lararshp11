<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pet;

class petController extends Controller
{
    public function index()
    {
        $pets = pet::all();
        return view('dokter.pet.index', compact('pets'));
    }
}
