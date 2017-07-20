<?php

namespace App\Models\CoreModel;

use Illuminate\Database\Eloquent\Model;

class CoreProfile extends Model
{
    protected $table = 'core_profiles';


    protected $fillable = [
        'id','name', 'descripcion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function module()
    {
        return $this->belongsToMany('App\Models\CoreModel\CoreModule',
                                    'core_permissions',
                                    'id_profile',
                                    'id_module')
            ->withPivot('id', 'rread','wwrite','eedit','ddelete');
    }
    public function permissions()
    {
        return $this->belongsToMany('App\Models\CoreModel\CoreModule',
                                    'core_permissions',
                                    'id_module',
                                    'id_profile')
                    ->using('App\Models\CoreModel\CorePermission');
    }
}
