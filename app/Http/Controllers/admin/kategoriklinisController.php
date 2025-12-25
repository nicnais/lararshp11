<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori_klinis;
use Exception;

class kategoriklinisController extends Controller
{
    public function index()
    {
        $kategori_klinis = kategori_klinis::all();
        return view('admin.kategori_klinis.index', compact('kategori_klinis'));
    }

    // 1. Function untuk menampilkan form create
    public function create()
    {
        return view('admin.kategori_klinis.create');
    }

    // 2. Function untuk menyimpan data (Store)
    public function store(Request $request)
    {
        // Validasi input menggunakan helper
        $validatedData = $this->validateKategoriKlinis($request);

        try {
            // Simpan data menggunakan helper
            $this->createKategoriKlinis($validatedData);

            return redirect()->route('admin.kategori-klinis.index')
                             ->with('success', 'Kategori Klinis berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validateKategoriKlinis(Request $request)
    {
        return $request->validate([
            'nama_kategori_klinis' => [
                'required', 
                'string', 
                'max:255', 
                'unique:kategori_klinis,nama_kategori_klinis'
            ]
        ], [
            'nama_kategori_klinis.required' => 'Nama kategori klinis wajib diisi.',
            'nama_kategori_klinis.unique' => 'Nama kategori klinis sudah ada.',
        ]);
    }

    // 4. Helper: Create & Format Data
    protected function createKategoriKlinis(array $data)
    {
        return kategori_klinis::create([
            'nama_kategori_klinis' => trim(ucwords(strtolower($data['nama_kategori_klinis'])))
        ]);
    }
}