<?php

namespace App\Http\Controllers\art\obra;

use App\Http\Requests\CreateArtWorks;
use App\Models\SysModel\SysArtista;
use App\Models\SysModel\SysUbicaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Models\SysModel\SysObra;
use Illuminate\Support\Facades\Auth;
use App\Models\CoreModel\CoreProfile;
use App\Models\CoreModel\CoreModule;
use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class ObraController extends Controller
{
    private $idmodulo = 6; /* Defined by the databases table CoreModule */

    public function ObraIndex()
    {
        try{

            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;


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
                        //$logs = CoreLog::orderBy('fecha', 'desc')->paginate(15);
                        $pro = SysObra::orderBy('id', 'desc')->paginate(10);

                        $location = SysUbicaciones::pluck('name','id');
                        $artists = SysArtista::all()->pluck('full_name', 'id');
                        /* Se tiene que hace all()->plunck() y no lunck() directamente, ya que para
                           poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */


                        //Debugbar::info($object);
                        //Debugbar::error('Error!');
                        //Debugbar::warning('Watch out…');
                        //Debugbar::addMessage('Another message', 'mylabel');

                        return view('art.obra.index')
                            ->with('modulos', $modules) //Modulos
                            ->with('xmod', $a) //Permisos
                            ->with('obras', $pro)
                            ->with('location', $location)
                            ->with('artist', $artists);
                    }
                }
            }
            Session::flash('msg_access', 'Obras');
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

    public function ObraDestroy()
    {
        try{

            SysObra::destroy(Input::get('id_obra'));
            SysObra::show();


            /*echo "Hola";
            exit;*/

            Session::flash('dbDelete', 'ArtWork');

            LogSystem::writeSystemLog("The ArtWork with ID = ". Input::get('id_obra') ." has been deleted","Art.ArtWorks",Auth::id());
            return redirect("art/obra/index");

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

    public function ObraEdit()
    {
        try{

            $pro = SysObra::find(Input::get('id_obra'));

            $pro->n_inv         = Input::get('n_inv');
            $pro->id_artista       = Input::get('id_artista');
            $pro->titulo        = Input::get('titulo');
            $pro->tecnica       = Input::get('tecnica');
            $pro->dimension     = Input::get('dimension');
            $pro->ano           = Input::get('ano');
            $pro->edicion       = Input::get('edicion');
            $pro->procedencia   = Input::get('procedencia');
            $pro->catalogo      = Input::get('catalogo');
            $pro->certificacion = Input::get('certificacion');
            $pro->valoracion    = Input::get('valoracion');
            $pro->id_ubica      = Input::get('id_ubica'.Input::get('id_obra'));


            $pro->save();
            Session::flash('dbUpdated', '1');
            LogSystem::writeSystemLog("The Artwork with ID = ". $pro->id." has been updated","Art.ArtWorks",Auth::id());
            return redirect("art/obra/index");

        }
        catch(\Exception $e)
        {

            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function ObraCreate(CreateArtWorks $request)
    {
        try{
            $pro = new SysObra();
            $path1 = "";
            $path2 = "";
            $file_name ="";

            if($request->hasFile('foto1'))
            {
                if(Input::file('foto1')->isValid())
                {

                    $file_name= Input::get('n_inv').".".$request->file('foto1')->getClientOriginalExtension();
                    $pathO = "public/Arts_Original/";
                    $pathS = public_path('storage/Arts_Small/'.$file_name);
                    $pathC = public_path('storage/Arts_Square/'.$file_name);

                    $request->file('foto1')->storeAs($pathO, $file_name); //Save Original Photo


                    $img = Image::make($request->file('foto1'));
                    $img2 = Image::make($request->file('foto1'));
                    /*$width = $img->width();
                    $height =  $img->height();*/

                    if($img->width() > $img->height())
                    {
                        $img->resize(800,600); //Resize
                        $img2->resize(800,600)->crop(600,600); //Crop
                    }
                    else
                    {
                        $img->resize(600,800); //Resize
                        $img2->resize(600,800)->crop(600,600); //Crop
                    }


                    $img->save($pathS,60); //Save the New Photo
                    $img2->save($pathC,60); //Save the New Photo

                }
            }





            /*if($request->hasFile('foto1'))
            {
                echo 'Uploaded';
                $path = $request->file('foto1')->store('Arts');

                dd($path);

            }
            else
            {
                echo 'Not Uploaded<br>';
                echo $request->file45;
                dd(Input::get('foto1'));
            }*/


            $pro->n_inv         = Input::get('n_inv');
            $pro->id_artista    = Input::get('id_artista');
            $pro->titulo        = Input::get('titulo');
            $pro->tecnica       = Input::get('tecnica');
            $pro->dimension     = Input::get('dimension');
            $pro->ano           = Input::get('ano');
            $pro->edicion       = Input::get('edicion');
            $pro->procedencia   = Input::get('procedencia');
            $pro->catalogo      = Input::get('catalogo');
            $pro->certificacion = Input::get('certificacion');
            $pro->valoracion    = Input::get('valoracion');
            $pro->id_ubica      = Input::get('id_ubica');
            $pro->file1         = $file_name;
            $pro->file2         = $file_name;
            $pro->save();
            Session::flash('dbCreate', 'Artwork');

            LogSystem::writeSystemLog("The Artwork with ID = ". $pro->id." has been created","Art.ArtWorks",Auth::id());
            return redirect("art/obra/index");
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
