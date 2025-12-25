<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pet;

class petController extends Controller
{
    public function index()
    {
        $pets = pet::all();
        return view('resepsionis.pet.index', compact('pets'));
    }
}
