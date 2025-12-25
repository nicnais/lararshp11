<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ras_hewan;
use App\Models\jenis_hewan; // Penting: Import Model Relasi
use Exception;

class rashewanController extends Controller
{
    public function index()
    {
        // Mengambil data ras beserta jenis hewannya (opsional: bisa pakai join/with jika relasi sudah didefinisikan)
        // Untuk saat ini kita pakai cara standar modul
        $ras_hewan = ras_hewan::join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
                    ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
                    ->get();
                    
        return view('admin.ras_hewan.index', compact('ras_hewan'));
    }

    // 1. Function Create (Formulir)
    public function create()
    {
        // Ambil data jenis hewan untuk pilihan dropdown
        $jenis_hewan = jenis_hewan::all();
        
        return view('admin.ras_hewan.create', compact('jenis_hewan'));
    }

    // 2. Function Store (Simpan Data)
    public function store(Request $request)
    {
        $validatedData = $this->validateRas($request);

        try {
            $this->createRas($validatedData);
            return redirect()->route('admin.ras-hewan.index')
                             ->with('success', 'Ras hewan berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validateRas(Request $request)
    {
        return $request->validate([
            'nama_ras' => ['required', 'string', 'max:255'],
            'idjenis_hewan' => ['required', 'exists:jenis_hewan,idjenis_hewan'] // Pastikan ID valid
        ], [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.exists' => 'Jenis hewan tidak valid.'
        ]);
    }

    // 4. Helper: Create
    protected function createRas(array $data)
    {
        return ras_hewan::create([
            'nama_ras' => trim(ucwords(strtolower($data['nama_ras']))),
            'idjenis_hewan' => $data['idjenis_hewan']
        ]);
    }
}