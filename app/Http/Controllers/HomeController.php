<?php
namespace App\Http\Controllers;

use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CoreModel\CoreModule;
use Illuminate\Http\Request;
use App\User;
use App\Models\SysModel\SysObra;
use App\Models\SysModel\SysArtista;
use App\Models\SysModel\SysUbicaciones;



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

            foreach($mod as $d)
            {
                if($d->id == 6)
                {
                    //dd($d);
                    $permission_edit_art = $d->pivot->eedit;
                    $permission_delete_art = $d->pivot->ddelete;
                }
            }

            //$permission_edit_art = $mod[6]->pivot_eedit;
            //$permission_delete_art = $mod[6]->pivot_ddelete;
            /*echo "Usuario = ".$user."<br>";
            echo "Perfil = ".$profile."<br>";
            echo "Modulos = ".$mod."<br>";*/
            //exit;
            $location = SysUbicaciones::pluck('name','id');
            $artists = SysArtista::all()->pluck('full_name', 'id');

            app('debugbar')->info($permission_edit_art);
            $mess = "Pruebs de Mnesaje usted no tiene acceso";
            $pro = SysObra::orderBy('id', 'desc')->paginate(15);
            $allmod = CoreModule::all();
            return view('admin/index')
                        ->with('modulos', $mod)
                        ->with('msg', $mess)
                        ->with('allmod', $allmod)
                        ->with('obras', $pro)
                        ->with('editar_obra', $permission_edit_art)
                        ->with('borrar_obra', $permission_delete_art)
                        ->with('location', $location)
                        ->with('artist', $artists);
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
