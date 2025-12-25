<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'idrole';
    protected $fillable = ['nama_role'];
    public $timestamps = false;

    public function roleuser()
    {
        return $this->hasMany(roleuser::class, 'idrole', 'idrole');
    }
}
