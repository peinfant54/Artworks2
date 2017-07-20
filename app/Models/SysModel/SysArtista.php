<?php

namespace App\Models\SysModel;

use Illuminate\Database\Eloquent\Model;

class SysArtista extends Model
{
    protected $table = 'sys_artista';

    protected $fillable = [
        'id','nombre', 'apellido'
    ];

    public function getFullNameAttribute()
    {
        return $this->nombre . " " . $this->apellido;
    }
}
