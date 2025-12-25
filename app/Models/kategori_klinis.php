<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori_klinis extends Model
{
    protected $table = 'kategori_klinis';
    protected $primaryKey = 'idkategori_klinis';
    protected $fillable = ['nama_kategori_klinis'];
    public $timestamps = false;
}
