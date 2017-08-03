<?php

namespace App\Models\CoreModel;

use Illuminate\Database\Eloquent\Model;

class CoreSysLog extends Model
{
    protected $table = 'core_sys_log';

    public $timestamps = false;

    /*protected $fillable = [
        'date', 'id_user', 'info',
    ];*/
}
