<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ras_hewan extends Model
{
    protected $table = 'ras_hewan';
    protected $primaryKey = 'idras_hewan';
    protected $fillable = ['nama_ras', 'idjenis_hewan'];
    public $timestamps = false;
}