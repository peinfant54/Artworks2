<?php

namespace App\Models\CoreModel;

use Illuminate\Database\Eloquent\Model;

class CoreModule extends Model
{
    protected $table = 'core_module';

    public function group()
    {
        return $this->belongsTo('App\Models\CoreModel\CoreGroupModule', 'id_group');
    }
    public function profile()
    {
        return $this->belongsToMany('App\Models\CoreModel\CoreProfile',
                                    'core_permissions',
                                    'id_module',
                                    'id_profile')
            ->withPivot('id','rread','wwrite','eedit','ddelete');
    }

    public function module2()
    {
        return $this->belongsToMany('App\Models\CoreModel\CoreProfile',
                                    'core_permissions',
                                    'id_module',
                                    'id')
                                    ->using('App\Models\CoreModel\CorePermission');
    }
}
