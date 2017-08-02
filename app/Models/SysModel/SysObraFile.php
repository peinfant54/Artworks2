<?php

namespace App\Models\SysModel;

use Illuminate\Database\Eloquent\Model;

class SysObraFile extends Model
{
    protected $table = 'sys_obra_file';

    protected $fillable = [
        'id', 'id_obra', 'name'
    ];

    public function obra()
    {
        return $this->belongsTo('App\Models\SysModel\SysObra', 'id_obra');
    }
}
