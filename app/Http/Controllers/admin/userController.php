<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash
use Exception;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // 1. Function Create
    public function create()
    {
        return view('admin.user.create');
    }

    // 2. Function Store
    public function store(Request $request)
    {
        $validatedData = $this->validateUser($request);

        try {
            $this->createUser($validatedData);
            return redirect()->route('admin.user.index')
                             ->with('success', 'User berhasil ditambahkan.');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // 3. Helper: Validasi
    protected function validateUser(Request $request)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // butuh input password_confirmation di view
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);
    }

    // 4. Helper: Create
    protected function createUser(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Enkripsi password
        ]);
    }
}