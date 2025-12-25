<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashPerawatController extends Controller
{
    public function index()
    {
        return view('perawat.dashboardPerawat');
    }

    public function profile()
    {
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('perawat.profile', compact('user'));
    }
}