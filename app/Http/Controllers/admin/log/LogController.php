<?php

namespace App\Http\Controllers\admin\log;

use App\Models\CoreModel\CoreLog;
use App\Models\SysModel\SysObra;
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
    private $idmodulo = 4;

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

    public function LogSummary()
    {
        try{

            $this->idmodulo  = 3;


            /* Menu */

            $mod  = User::find(Auth::id())->profile->module;

            foreach($mod as $a)
            {
                if($a->id == $this->idmodulo) /* Is allowed to see this Module */
                {
                    if($a->pivot->rread > 0 or $a->pivot->eedit > 0 or $a->pivot->wwrite > 0 or $a->pivot->ddelete > 0)
                    {
                        /* Content */

                        $sin_obra = SysObra::where('id_ubica', '1000')->count(); //Obras sin ubicacion

                        $sin_titulo = SysObra::where('titulo', 'Sin título')->count(); //Obras sin Titulo

                        $sin_file = SysObra::where('file1', '')->count(); //Obras sin Foto

                        $total = SysObra::count();


                        $query = DB::select("select b.id, b.name, round((count(*)/(select count(*) from sys_obra))*100,2)  porc
                                    from sys_obra a, sys_ubicaciones b
                                      where a.id_ubica = b.id
                                    group by id_ubica
                                    order by porc desc");

                        //dd($query);

                        return view('admin/log/summary')
                                ->with('modulos', $mod)
                                ->with('sin_obra', $sin_obra)
                                ->with('sin_titulo', $sin_titulo)
                                ->with('sin_file', $sin_file)
                                ->with('query', $query)
                                ->with('total', $total);
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
