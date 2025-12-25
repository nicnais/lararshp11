<?php

namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        return view('perawat.profil.index', compact('user'));
    }
}