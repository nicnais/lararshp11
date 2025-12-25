<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class temu_dokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    protected $fillable = [
        'no_urut',
        'waktu_daftar',
        'status',
        'idpet',
        'idrole_user'
    ];
    public $timestamps = false;
}