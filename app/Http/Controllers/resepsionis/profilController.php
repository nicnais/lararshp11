<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik; 
use App\Models\Pet;

class profilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataPemilik = Pemilik::where('iduser', $user->id)->first();
        $daftarHewan = Pet::where('idpemilik', $user->id)->get(); 
        return view('resepsionis.profil.index', compact('user', 'dataPemilik', 'daftarHewan'));
    }
}