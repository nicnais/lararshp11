<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekam_medis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    protected $fillable = ['created_at', 'anamnesa', 'temuan_klinis', 'diagnosa', 'idpet', 'dokter_pemeriksa', 'idreservasi_dokter'];
    public $timestamps = false;
}