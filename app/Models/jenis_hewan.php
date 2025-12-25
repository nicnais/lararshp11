<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenis_hewan extends Model
{
    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    protected $fillable = ['nama_jenis_hewan'];

    // Tambah baris ini [cite: 12]
    public $timestamps = false; 
}