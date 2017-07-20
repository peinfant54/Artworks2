<?php

namespace App\Http\Controllers\art\location;

use App\Models\SysModel\SysArtista;
use App\Models\SysModel\SysUbicaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CoreModel\CoreModule;
use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class LocationController extends Controller
{
    private $idmodulo = 4; /* Defined by the databases table CoreModule */

    public function LocationIndex()
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;
            //$user = User::find(Auth::id());
            //$profile = User::find(Auth::id())->profile;

            /*echo "Usuario = ".$user."<br>";
            echo "Perfil = ".$profile."<br>";
            echo "Modulos = ".$modules."<br>";*/
            foreach($modules as $a)
            {

                if($a->id == $this->idmodulo) /* Is allowed to see this Module */
                {
                    /*echo "ID = ".$a->id. "<br>";
                    echo "IdC = ". $this->idmodulo. "<br>";*/
                    if($a->pivot->rread > 0 or $a->pivot->eedit > 0 or $a->pivot->wwrite > 0 or $a->pivot->ddelete > 0)
                    {
                        /* Content */

                        /*echo "<br>Read = ".$a->pivot->rread;
                        echo "<br>Write  = ".$a->pivot->wwrite;
                        echo "<br>Edit   = ".$a->pivot->eedit;
                        echo "<br>Delete = ".$a->pivot->ddelete;*/

                        $pro = SysUbicaciones::paginate(10);
                        $allmod = CoreModule::all();
                        return view('art.location.index')
                            ->with('modulos', $modules)
                            ->with('Locations', $pro)
                            ->with('allmod', $allmod)
                            ->with('xmod', $a);
                    }
                }
            }
            Session::flash('msg_access', 'Locations');
            return redirect("admin/index"); /* If he dont have access redirect to the Index*/

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            Session::flash('msg_access2', $e);
            return redirect("admin/index");
        }

    }

    public function LocationDestroy()
    {
        try{

            SysUbicaciones::destroy(Input::get('id_location'));


            Session::flash('dbDelete', 'Location');


            LogSystem::writeSystemLog("The Location with ID = ". Input::get('id_profile') ." has been deleted","Art.Location",Auth::id());
            return redirect("art/location/index");

        }
        catch(\Exception $e)
        {

            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e->getMessage());
            Session::flash('dbDeleteError', 'Profile');
            return redirect("admin/profile/index");
        }

    }

    public function LocationEdit()
    {
        try{
            $loc = SysArtista::find(Input::get('id_location'));
            $loc->name = Input::get('name');
            $loc->save();
            Session::flash('dbUpdated', '1');
            LogSystem::writeSystemLog("The Location with ID = ". $loc->id." has been updated","Art.Location",Auth::id());
            return redirect("art/location/index");

        }
        catch(\Exception $e)
        {

            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function LocationCreate()
    {
        try{
            $pro = new SysUbicaciones();

            $pro->name = Input::get('name');
            $pro->save();
            Session::flash('dbCreate', 'Location');

            LogSystem::writeSystemLog("The Location with ID = ". $pro->id." has been created","Art.Location",Auth::id());
            return redirect("art/location/index");
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
