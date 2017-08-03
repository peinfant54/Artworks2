<?php

namespace App\Http\Controllers\admin\profile;

use App\Models\CoreModel\CoreProfile;
use 
    Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\SystemCatchLog\LogSystem;
use 
    Illuminate\Support\Facades\Auth;

use 
    Illuminate\Support\Facades\Input;
use App\Models\CoreModel\CoreModule;
use App\User;
use App\Models\CoreModel\CorePermission;
use 
    Illuminate\Support\Facades\Session;



class ProfileController extends Controller
{

    private $idmodulo = 2; /* Defined by the databases table CoreModule */

    public function ProfileIndex()
    {
        try{

            $title = "Proyecto Galeria";
            /* Menu */
            
            $modules  = User::find(Auth::id())->profile->module;
            
            $user = User::find(Auth::id());
            
            $profile = User::find(Auth::id())->profile;

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

                        $pro = CoreProfile::paginate(10);
                        $allmod = CoreModule::all();
                        return view('admin/profile/index')
                            ->with('title', $title)
                            ->with('modulos', $modules)
                            ->with('profiles', $pro)
                            ->with('allmod', $allmod)
                            ->with('xmod', $a);
                    }
                }
            }
            
            Session::flash('msg_access', 'Profile');
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

    public function ProfilePermissions()
    {
        try{

            
            $mod  = User::find(Auth::id())->profile->module;

            foreach($mod as $a)
            {
                if($a->id == $this->idmodulo) /* Is allowed to see whork this Module */
                {
                    /* Content */
                    $module=CoreModule::all();
                    //echo $module."<br>";

                    foreach($module as $md)
                    {
                        
                        echo "<br>------------------<br>Original Input= ".Input::get('read'.$md->id)."<br>";

                        
                        if(is_null(Input::get('read'.$md->id)))
                        {
                            $rread = 0;
                        }
                        else{
                            $rread = 1;
                        }
                        
                        if(is_null(Input::get('write'.$md->id)))
                        {
                            $wwrite = 0;
                        }
                        else{
                            $wwrite = 1;
                        }
                        
                        if(is_null(Input::get('edit'.$md->id)))
                        {
                            $eedit = 0;
                        }
                        else{
                            $eedit = 1;
                        }
                        
                        if(is_null(Input::get('delete'.$md->id)))
                        {
                            $ddelete = 0;
                        }
                        else{
                            $ddelete = 1;
                        }
                        echo "Mod ID= ".$md->id."<br>";
                        echo "Read= ".$rread;
                        echo "<br>Write= ".$wwrite;
                        echo "<br>Edit= ".$eedit;
                        echo "<br>Delete= ".$ddelete;

                        /*$ss = CorePermission::updateOrCreate(
                            ['id_module'  =>   $md->id],
                            ['id_profile' =>   Input::get('id_profile')],
                            ['rread'      =>   $rread],
                            ['wwrite'     =>   $wwrite],
                            ['eedit'      =>   $eedit],
                            ['ddelete'    =>   $ddelete]
                        );
                        $ss->save();*/
                        
                        $per = CorePermission::where(['id_profile' => Input::get('id_profile'), 'id_module' => $md->id])->get();
                        //$per = CorePermission::where(['id_profile' => 1, 'id_module' => $md->id])->get();
                        echo "<br>Sql=".$per."---";
                        if($per->count() == 0) //WE need to check if the register exist or not
                        {
                            //echo "<br>Nueva Parte";
                            $per = new CorePermission();
                            $per->id_module = $md->id;
                            
                            $per->id_profile = Input::get('id_profile');
                            $per->rread = $rread;
                            $per->wwrite = $wwrite;
                            $per->eedit = $eedit;
                            $per->ddelete = $ddelete;
                            $per->save();
                        }
                        else
                        {
                            //if($per <> ""){ echo "<br> ".$per->count();}

                            foreach ($per as $a)
                            {
                                echo "<br>Sql2=".$a->id;
                                if($a) // We have to create a new Register
                                {

                                    $a->rread = $rread;
                                    $a->wwrite = $wwrite;
                                    $a->eedit = $eedit;
                                    $a->ddelete = $ddelete;
                                    $a->save();
                                }
                                else{ // The register existes so we have to Updated.

                                    $per = new CorePermission();
                                    $per->id_module = $md->id;
                                    
                                    $per->id_profile = Input::get('id_profile');
                                    $per->rread = $rread;
                                    $per->wwrite = $wwrite;
                                    $per->eedit = $eedit;
                                    $per->ddelete = $ddelete;
                                    $per->save();
                                }
                            }

                        }
                    }
                    //exit;
                    
                    Session::flash('dbUpdated', '2');
                    
                    
                    LogSystem::writeSystemLog("The profile with ID = ". Input::get('id_profile').", Permissions has been updated","admin",Auth::id());
                    return redirect("admin/profile/index");
                }
            }

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
    public function ProfileEdit()
    {
        try{

            
            $pro = CoreProfile::find(Input::get('id_profile'));
            
            $pro->name = Input::get('name');
            
            $pro->descripcion = Input::get('descripcion');
            $pro->save();
            
            Session::flash('dbUpdated', '1');
            
            LogSystem::writeSystemLog("The profile with ID = ". $pro->id." has been updated","admin",Auth::id());
            return redirect("admin/profile/index");

        }
        catch(\Exception $e)
        {
            
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function ProfileDestroy()
    {
        try{
            
            CoreProfile::destroy(Input::get('id_profile'));
            /*$profile = CoreProfile::find(Input::get('id_profile'));
            echo $profile;
            exit;
            $profile->destroy();*/

            
            Session::flash('dbDelete', 'Profile');
            
            
            LogSystem::writeSystemLog("The Profile with ID = ". Input::get('id_profile') ." has been deleted","admin",Auth::id());
            return redirect("admin/profile/index");

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

    public function ProfileCreate()
    {
        try{
            $pro = new CoreProfile();
            
            $pro->name = Input::get('name');
            
            $pro->descripcion = Input::get('descripcion');
            $pro->save();
            
            Session::flash('dbCreate', 'Profile');
            
            LogSystem::writeSystemLog("The Profile with ID = ". $pro->id." has been created","admin",Auth::id());
            return redirect("admin/profile/index");
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
