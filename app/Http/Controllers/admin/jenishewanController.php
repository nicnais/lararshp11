<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jenis_hewan;
use Exception; // Jangan lupa import ini untuk try-catch

class jenishewanController extends Controller
{
    public function index()
    {
        $jenis_hewan = jenis_hewan::all();
        return view('admin.jenis_hewan.index', compact('jenis_hewan'));
    }

    // 1. Function untuk paparkan form create [cite: 97]
    public function create()
    {
        return view('admin.jenis_hewan.create');
    }

    // 2. Function untuk simpan data [cite: 100]
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateJenisHewan($request);

        // Helper untuk menyimpan data
        try {
            $this->createJenisHewan($validatedData);
            return redirect()->route('admin.jenis-hewan.index')
                             ->with('success', 'Jenis hewan berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Validation Helper [cite: 122]
    protected function validateJenisHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ? 'unique:jenis_hewan,nama_jenis_hewan,'.$id.',idjenis_hewan' : 'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan' => [
                'required',
                'string',
                'max:255',
                'min:3',
                $uniqueRule
            ]
        ], [
            'nama_jenis_hewan.required' => 'Nama jenis hewan wajib diisi.',
            'nama_jenis_hewan.string' => 'Nama jenis hewan harus berupa teks.',
            'nama_jenis_hewan.max' => 'Nama jenis hewan maksimal 255 karakter.',
            'nama_jenis_hewan.min' => 'Nama jenis hewan minimal 3 karakter.',
            'nama_jenis_hewan.unique' => 'Nama jenis hewan sudah ada.'
        ]);
    }

    // 4. Create Helper [cite: 146]
    protected function createJenisHewan(array $data)
    {
        return jenis_hewan::create([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        ]);
    }

    // 5. Format Helper [cite: 157]
    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}