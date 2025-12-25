<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kode_tindakan_terapi;
use App\Models\kategori;
use App\Models\kategori_klinis;
use Exception;

class kodetindakanterapiController extends Controller
{
    public function index()
    {
        $kode_tindakan_terapi = kode_tindakan_terapi::join('kategori', 'kode_tindakan_terapi.idkategori', '=', 'kategori.idkategori')
            ->join('kategori_klinis', 'kode_tindakan_terapi.idkategori_klinis', '=', 'kategori_klinis.idkategori_klinis')
            ->select(
                'kode_tindakan_terapi.*', 
                'kategori.nama_kategori', 
                'kategori_klinis.nama_kategori_klinis'
            )
            ->get();

        return view('admin.kode_tindakan_terapi.index', compact('kode_tindakan_terapi'));
    }

    public function create()
    {
        $kategori = kategori::all();
        $kategori_klinis = kategori_klinis::all();

        return view('admin.kode_tindakan_terapi.create', compact('kategori', 'kategori_klinis'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateKodeTindakan($request);

        try {
            $this->createKodeTindakan($validatedData);
            return redirect()->route('admin.kode-tindakan-terapi.index')
                             ->with('success', 'Data berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    protected function validateKodeTindakan(Request $request)
    {
        return $request->validate([
            'kode' => ['required', 'string', 'max:50', 'unique:kode_tindakan_terapi,kode'],
            'deskripsi_tindakan_terapi' => ['required', 'string', 'max:255'],
            'idkategori' => ['required', 'exists:kategori,idkategori'],
            'idkategori_klinis' => ['required', 'exists:kategori_klinis,idkategori_klinis'],
        ], [
            'kode.required' => 'Kode wajib diisi.',
            'kode.unique' => 'Kode sudah ada.',
            'deskripsi_tindakan_terapi.required' => 'Deskripsi wajib diisi.',
            'idkategori.required' => 'Kategori wajib dipilih.',
            'idkategori_klinis.required' => 'Kategori klinis wajib dipilih.',
        ]);
    }

    protected function createKodeTindakan(array $data)
    {
        return kode_tindakan_terapi::create([
            'kode' => strtoupper($data['kode']),
            'deskripsi_tindakan_terapi' => $data['deskripsi_tindakan_terapi'],
            'idkategori' => $data['idkategori'],
            'idkategori_klinis' => $data['idkategori_klinis'],
        ]);
    }
}