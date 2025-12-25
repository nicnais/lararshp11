<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    protected $table = 'pet';
    protected $primaryKey = 'idpet';
    protected $fillable = [
        'nama', 
        'tanggal_lahir', 
        'warna_tanda', 
        'jenis_kelamin', 
        'idpemilik', 
        'idras_hewan'
    ];
    public $timestamps = false;
}