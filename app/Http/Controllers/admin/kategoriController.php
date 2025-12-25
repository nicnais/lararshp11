<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;
use Exception;

class kategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    // 1. Function Create (Formulir)
    public function create()
    {
        return view('admin.kategori.create');
    }

    // 2. Function Store (Simpan Data)
    public function store(Request $request)
    {
        $validatedData = $this->validateKategori($request);

        try {
            $this->createKategori($validatedData);
            return redirect()->route('admin.kategori.index')
                             ->with('success', 'Kategori berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validateKategori(Request $request)
    {
        return $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'max:255',
                'unique:kategori,nama_kategori'
            ]
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Nama kategori sudah ada.'
        ]);
    }

    // 4. Helper: Format & Create
    protected function createKategori(array $data)
    {
        return kategori::create([
            'nama_kategori' => trim(ucwords(strtolower($data['nama_kategori'])))
        ]);
    }
}