<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashResepController extends Controller
{
    public function index()
    {
        return view('resepsionis.dashboardResep');
    }
}
