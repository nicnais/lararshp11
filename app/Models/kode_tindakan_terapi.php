<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kode_tindakan_terapi extends Model
{
    protected $table = 'kode_tindakan_terapi';
    protected $primaryKey = 'idkode_tindakan_terapi';
    protected $fillable = ['kode', 'deskripsi_tindakan_terapi', 'idkategori', 'idkategori_klinis'];
    public $timestamps = false;
}