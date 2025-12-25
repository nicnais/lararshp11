<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dbconn', [SiteController::class, 'dbconn'])->name('site.dbconn');

Route::get('/', [SiteController::class, 'index'])->name('site.home');

Auth::routes();

// Admin Routes
use App\Http\Controllers\admin\dashAdminController;
use App\Http\Controllers\admin\jenishewanController;

Route::middleware(['isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [dashAdminController::class, 'index'])->name('dashboard');

    // Jenis Hewan
    Route::resource('jenis_hewan', jenishewanController::class);
    Route::get('/jenis_hewan/create', [jenishewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis_hewan/store', [jenishewanController::class, 'store'])->name('jenis-hewan.store');

    // Pemilik
    Route::get('/pemilik', [App\Http\Controllers\admin\pemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\admin\pemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [App\Http\Controllers\admin\pemilikController::class, 'store'])->name('pemilik.store');

    // Kategori
    Route::get('/kategori', [App\Http\Controllers\admin\kategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [App\Http\Controllers\admin\kategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [App\Http\Controllers\admin\kategoriController::class, 'store'])->name('kategori.store');

    // Kode Tindakan Terapi
    Route::get('/kode-tindakan-terapi', [App\Http\Controllers\admin\kodetindakanterapiController::class, 'index'])->name('kode-tindakan-terapi.index');
    Route::get('/kode-tindakan-terapi/create', [App\Http\Controllers\admin\kodetindakanterapiController::class, 'create'])->name('kode-tindakan-terapi.create');
    Route::post('/kode-tindakan-terapi/store', [App\Http\Controllers\admin\kodetindakanterapiController::class, 'store'])->name('kode-tindakan-terapi.store');

    // Ras Hewan
    Route::get('/ras-hewan', [App\Http\Controllers\admin\rashewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/ras-hewan/create', [App\Http\Controllers\admin\rashewanController::class, 'create'])->name('ras-hewan.create');
    Route::post('/ras-hewan/store', [App\Http\Controllers\admin\rashewanController::class, 'store'])->name('ras-hewan.store');


    // Kategori Klinis
    Route::get('/kategori-klinis', [App\Http\Controllers\admin\kategoriklinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/kategori-klinis/create', [App\Http\Controllers\admin\kategoriklinisController::class, 'create'])->name('kategori-klinis.create');
    Route::post('/kategori-klinis/store', [App\Http\Controllers\admin\kategoriklinisController::class, 'store'])->name('kategori-klinis.store');

    // Pet
    Route::get('/pet', [App\Http\Controllers\admin\petController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [App\Http\Controllers\admin\petController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [App\Http\Controllers\admin\petController::class, 'store'])->name('pet.store');

    // Role
    Route::get('/role', [App\Http\Controllers\admin\roleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [App\Http\Controllers\admin\roleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [App\Http\Controllers\admin\roleController::class, 'store'])->name('role.store');

    // User
    Route::get('/user', [App\Http\Controllers\admin\userController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\admin\userController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\admin\userController::class, 'store'])->name('user.store');});

// Dokter Routes
Route::middleware(['isDokter'])->group(function () {
    Route::get('dokter/dashboard', [App\Http\Controllers\dokter\dashDokterController::class, 'index'])->name('dokter.dashboard');
    Route::get('dokter/pet', [App\Http\Controllers\dokter\petController::class, 'index'])->name('dokter.pet.index');
    Route::get('dokter/rekam_medis', [App\Http\Controllers\dokter\rekammedisController::class, 'index'])->name('dokter.rekam_medis.index');
    Route::get('dokter/detail_rekam_medis', [App\Http\Controllers\dokter\detailrekammedisController::class, 'index'])->name('dokter.detail_rekam_medis.index');
    Route::get('dokter/profil', [App\Http\Controllers\dokter\profilController::class, 'index'])->name('dokter.profil.index');
});

// Perawat Routes
Route::middleware(['isPerawat'])->group(function () {
    Route::get('perawat/dashboard', [App\Http\Controllers\perawat\dashPerawatController::class, 'index'])->name('perawat.dashboard');
    Route::get('perawat/pet', [App\Http\Controllers\perawat\petController::class, 'index'])->name('perawat.pet.index');
    Route::get('perawat/rekam_medis', [App\Http\Controllers\perawat\rekammedisController::class, 'index'])->name('perawat.rekam_medis.index');
    Route::get('perawat/detail_rekam_medis', [App\Http\Controllers\perawat\detailrekammedisController::class, 'index'])->name('perawat.detail_rekam_medis.index');
    Route::get('perawat/profil', [App\Http\Controllers\perawat\profilController::class, 'index'])->name('perawat.profil.index');
});

// Resepsionis Routes
Route::middleware(['isResepsionis'])->group(function () {
    Route::get('resepsionis/dashboard', [App\Http\Controllers\resepsionis\dashResepController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('resepsionis/pet', [App\Http\Controllers\resepsionis\petController::class, 'index'])->name('resepsionis.pet.index');
    Route::get('resepsionis/temu_dokter', [App\Http\Controllers\resepsionis\temudokterController::class, 'index'])->name('resepsionis.temu_dokter.index');
    Route::get('resepsionis/profil', [App\Http\Controllers\resepsionis\profilController::class, 'index'])->name('resepsionis.profil.index');
});

// Pemilik Routes
Route::middleware(['isPemilik'])->group(function () {
    Route::get('pemilik/dashboard', [App\Http\Controllers\pemilik\dashPemilikController::class, 'index'])->name('pemilik.dashboard');
    Route::get('pemilik/rekam_medis', [App\Http\Controllers\pemilik\rekammedisController::class, 'index'])->name('pemilik.rekam_medis.index');
    Route::get('pemilik/temudokter', [App\Http\Controllers\pemilik\temudokterController::class, 'index'])->name('pemilik.temudokter.index');
    Route::get('pemilik/profil', [App\Http\Controllers\pemilik\profilController::class, 'index'])->name('pemilik.profil.index');
});

Route::get('/fix-user/{role_id}/{email}', function ($role_id, $email) {
    // 1. Cari user berdasarkan email
    $user = \App\Models\User::where('email', $email)->first();
    
    if (!$user) {
        return "Error: User dengan email '$email' tidak ditemukan di database!";
    }

    // 2. Reset Password jadi '123456' (Bypass timestamp agar tidak error)
    \Illuminate\Support\Facades\DB::table('user')
        ->where('iduser', $user->iduser)
        ->update(['password' => bcrypt('123456')]);

    // 3. Cek apakah relasi role sudah ada, jika ada kita UPDATE, jika belum kita INSERT
    // Ini memastikan user punya role yang benar dan statusnya AKTIF (1)
    
    $cekRelasi = \Illuminate\Support\Facades\DB::table('role_user')
                ->where('iduser', $user->iduser)
                ->first();

    if ($cekRelasi) {
        // Update yang sudah ada
        \Illuminate\Support\Facades\DB::table('role_user')
            ->where('iduser', $user->iduser)
            ->update([
                'idrole' => $role_id,
                'status' => 1
            ]);
        $status = "Relasi diperbarui.";
    } else {
        // Buat baru
        \Illuminate\Support\Facades\DB::table('role_user')->insert([
            'iduser' => $user->iduser,
            'idrole' => $role_id,
            'status' => 1
        ]);
        $status = "Relasi baru dibuat.";
    }

    return "<h1>Sukses!</h1> <br>
            User: <b>$email</b> <br>
            Password: <b>123456</b> <br>
            Role ID: <b>$role_id</b> <br>
            Status: <b>$status</b> <br><br>
            <a href='/login'>Klik disini untuk Login</a>";
});