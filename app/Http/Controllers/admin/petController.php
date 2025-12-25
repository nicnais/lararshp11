<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pet;
use App\Models\pemilik;
use App\Models\ras_hewan;
use Exception;

class petController extends Controller
{
    public function index()
    {
        // Join tabel untuk mendapatkan Nama Pemilik dan Nama Ras
        $pet = pet::join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
                  ->join('user', 'pemilik.iduser', '=', 'user.iduser') // Join ke user untuk nama pemilik
                  ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
                  ->select(
                      'pet.*', 
                      'user.nama as nama_pemilik', 
                      'ras_hewan.nama_ras'
                  )
                  ->get();

        return view('admin.pet.index', compact('pet'));
    }

    // 1. Function Create
    public function create()
    {
        // Ambil data Pemilik (beserta nama User)
        $pemilik = pemilik::join('user', 'pemilik.iduser', '=', 'user.iduser')
                          ->select('pemilik.idpemilik', 'user.nama')
                          ->get();

        // Ambil data Ras Hewan
        $ras_hewan = ras_hewan::all();

        return view('admin.pet.create', compact('pemilik', 'ras_hewan'));
    }

    // 2. Function Store
    public function store(Request $request)
    {
        $validatedData = $this->validatePet($request);

        try {
            $this->createPet($validatedData);
            return redirect()->route('admin.pet.index')
                             ->with('success', 'Data Hewan berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'warna_tanda' => ['required', 'string', 'max:45'],
            'jenis_kelamin' => ['required', 'in:M,F'], // M=Male, F=Female
            'idpemilik' => ['required', 'exists:pemilik,idpemilik'],
            'idras_hewan' => ['required', 'exists:ras_hewan,idras_hewan'],
        ], [
            'nama.required' => 'Nama hewan wajib diisi.',
            'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid.',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
            'idras_hewan.required' => 'Ras hewan wajib dipilih.',
        ]);
    }

    // 4. Helper: Create
    protected function createPet(array $data)
    {
        return pet::create([
            'nama' => $data['nama'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda' => $data['warna_tanda'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik' => $data['idpemilik'],
            'idras_hewan' => $data['idras_hewan'],
        ]);
    }
}