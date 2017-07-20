<?php

namespace App\Http\Controllers\admin\log;

use App\Models\CoreModel\CoreLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CoreModel\CoreModule;
use App\User;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{
    private $idmodulo = 3;

    public function LogIndex()
    {
        try{

            $title = "Proyecto Galeria";

            /* Menu */

            $mod  = User::find(Auth::id())->profile->module;

            foreach($mod as $a)
            {
                if($a->id == $this->idmodulo) /* Is allowed to see this Module */
                {
                    if($a->pivot->rread > 0 or $a->pivot->eedit > 0 or $a->pivot->wwrite > 0 or $a->pivot->ddelete > 0)
                    {
                        /* Content */
                        $logs = CoreLog::orderBy('fecha', 'desc')->paginate(15);



                        return view('admin/log/index')->with('title',$title)->with('modulos', $mod)->with('logs', $logs);
                    }



                }
            }
            Session::flash('msg_access', 'Log');
            return redirect("admin/index"); /* If he dont have access redirect to the Index*/

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }
}
