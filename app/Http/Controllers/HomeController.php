<?php
namespace App\Http\Controllers;

use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CoreModel\CoreModule;
use Illuminate\Http\Request;
use App\User;
use App\Models\SysModel\SysObra;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $title = "Proyecto Galeria AX2";

            return view('home')->with('title',$title);
        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }
    public function AdminIndex()
    {
        try{


            $mod  = User::with('profile')->find(Auth::id())->profile->module;
            LogSystem::writeSystemLog("The User has view the index","Home.Index",Auth::id());
            //$mod  = User::find(Auth::id())->profile->module;

            /*echo "Usuario = ".$user."<br>";
            echo "Perfil = ".$profile."<br>";
            echo "Modulos = ".$mod."<br>";*/
            //exit;
            app('debugbar')->info($mod);
            $mess = "Pruebs de Mnesaje usted no tiene acceso";
            $pro = SysObra::orderBy('id', 'desc')->paginate(15);
            $allmod = CoreModule::all();
            return view('admin/index')
                        ->with('modulos', $mod)
                        ->with('msg', $mess)
                        ->with('allmod', $allmod)
                        ->with('obras', $pro);
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
