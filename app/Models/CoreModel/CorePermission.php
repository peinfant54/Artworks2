<?php

namespace App\Models\CoreModel;

use Illuminate\Database\Eloquent\Model;

class CorePermission extends Model
{

    protected $fillable = [
        'id','id_module', 'id_profile', 'rread', 'wwrite', 'eedit', 'ddelete',
    ];

    protected $table = 'core_permissions';

    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo('App\Models\CoreModel\CoreProfile', 'id_profile');
    }

    public function module()
    {
        return $this->belongsTo('App\Models\CoreModel\CoreModule', 'id_module');
    }
}
