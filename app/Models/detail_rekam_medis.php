<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_rekam_medis extends Model
{
    protected $table = 'detail_rekam_medis';
    protected $primaryKey = 'iddetail_rekam_medis';
    protected $fillable = [
        'idrekam_medis',
        'kode_tindakan_terapi',
        'detail'
    ];
}
