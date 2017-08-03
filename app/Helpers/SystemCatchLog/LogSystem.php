<?php
/**
 * Created by PhpStorm.
 * User: peinfant
 * Date: 24-05-17
 * Time: 13:05
 */
namespace App\Helpers\SystemCatchLog;

use App\Models\CoreModel\CoreLog;
use Illuminate\Support\Facades\DB;
use App\Models\CoreModel\CoreSysLog;

class LogSystem
{
    /*
     * @param string $msg
     *
     * @param int $userid
     *
     * @return
     *
     * */
    public static function writeLog($msg, $userid)
    {
        try{
            $date = new \DateTime();
            $log = new CoreSysLog();
            $log->date = $date->format('Y-m-d H:i:s');
            $log->id_user = $userid;
            $log->info = $msg;
            $log->save();
        }
        catch(\Exception $e){
            echo $e;
        }


    }
    public static function writeSystemLog($msg, $modulo, $userid)
    {
        try{
            $date = new \DateTime();
            $log = new CoreLog();
            $log->fecha = $date->format('Y-m-d H:i:s');
            $log->id_user = $userid;
            $log->module = $modulo;
            $log->dato = $msg;
            $log->save();
        }
        catch(\Exception $e){
            echo $e;
        }


    }
}