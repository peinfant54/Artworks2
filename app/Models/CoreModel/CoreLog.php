<?php

namespace App\Models\CoreModel;

use Illuminate\Database\Eloquent\Model;

class CoreLog extends Model
{
    protected $table = 'core_log';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
