<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pemilik;
use App\Models\User; // Penting: Import Model User
use Exception;

class pemilikController extends Controller
{
    public function index()
    {
        // Join dengan tabel user untuk mengambil nama user
        $pemilik = pemilik::join('user', 'pemilik.iduser', '=', 'user.iduser')
                    ->select('pemilik.*', 'user.nama as nama_user')
                    ->get();
                    
        return view('admin.pemilik.index', compact('pemilik'));
    }

    // 1. Function Create
    public function create()
    {
        // Ambil data User untuk dropdown
        // (Opsional: Bisa difilter hanya user yang role-nya pemilik jika mau)
        $users = User::all();
        
        return view('admin.pemilik.create', compact('users'));
    }

    // 2. Function Store
    public function store(Request $request)
    {
        $validatedData = $this->validatePemilik($request);

        try {
            $this->createPemilik($validatedData);
            return redirect()->route('admin.pemilik.index')
                             ->with('success', 'Data Pemilik berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validatePemilik(Request $request)
    {
        return $request->validate([
            // unique:pemilik,iduser artinya 1 User hanya boleh punya 1 data Pemilik
            'iduser' => ['required', 'exists:user,iduser', 'unique:pemilik,iduser'], 
            'no_wa' => ['required', 'string', 'max:45'],
            'alamat' => ['required', 'string', 'max:100'],
        ], [
            'iduser.required' => 'User wajib dipilih.',
            'iduser.unique' => 'User ini sudah terdaftar sebagai pemilik.',
            'no_wa.required' => 'Nomor WA wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);
    }

    // 4. Helper: Create
    protected function createPemilik(array $data)
    {
        return pemilik::create([
            'iduser' => $data['iduser'],
            'no_wa' => $data['no_wa'],
            'alamat' => $data['alamat'],
        ]);
    }
}