<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'idpemilik';
    protected $fillable = ['no_wa', 'alamat', 'iduser'];
    public $timestamps = false;
}