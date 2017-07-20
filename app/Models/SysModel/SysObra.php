<?php

namespace App\Models\SysModel;

use Illuminate\Database\Eloquent\Model;

class SysObra extends Model
{
    protected $table = 'sys_obra';

    protected $fillable = [
        'id', 'n_inv', 'id_artista', 'titulo', 'tecnica', 'dimension', 'ano', 'edicion', 'procedencia', 'catalogo', 'certificacion',
        'valoracion', 'id_ubica', 'file1', 'file2'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Models\SysModel\SysArtista', 'id_artista');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\SysModel\SysUbicaciones', 'id_ubica');
    }

}
