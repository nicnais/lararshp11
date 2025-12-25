<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\role;
use Exception;

class roleController extends Controller
{
    public function index()
    {
        $role = role::all();
        return view('admin.role.index', compact('role'));
    }

    // 1. Function Create
    public function create()
    {
        return view('admin.role.create');
    }

    // 2. Function Store
    public function store(Request $request)
    {
        $validatedData = $this->validateRole($request);

        try {
            $this->createRole($validatedData);
            return redirect()->route('admin.role.index')
                             ->with('success', 'Role berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validateRole(Request $request)
    {
        return $request->validate([
            'nama_role' => ['required', 'string', 'max:100', 'unique:role,nama_role']
        ], [
            'nama_role.required' => 'Nama role wajib diisi.',
            'nama_role.unique' => 'Nama role sudah ada.',
        ]);
    }

    // 4. Helper: Create
    protected function createRole(array $data)
    {
        return role::create([
            'nama_role' => trim(ucwords(strtolower($data['nama_role'])))
        ]);
    }
}