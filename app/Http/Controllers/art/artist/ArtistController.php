<?php

namespace App\Http\Controllers\art\artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysModel\SysArtista;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CoreModel\CoreModule;
use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Models\SysModel\SysObra;
use Barryvdh\DomPDF\Facade as PDF;

class ArtistController extends Controller
{
    private $idmodulo = 5; /* Defined by the databases table CoreModule */

    public function ArtistIndex()
    {
        try{

            $title = "Proyecto Galeria";
            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;

            foreach($modules as $a)
            {

                if($a->id == $this->idmodulo) /* Is allowed to see this Module */
                {

                    if($a->pivot->rread > 0 or $a->pivot->eedit > 0 or $a->pivot->wwrite > 0 or $a->pivot->ddelete > 0)
                    {
                        /* Content */

                        $pro = SysArtista::paginate(10);
                        $allmod = CoreModule::all();
                        return view('art.artist.index')
                            ->with('title', $title)
                            ->with('modulos', $modules)
                            ->with('Artists', $pro)
                            ->with('allmod', $allmod)
                            ->with('xmod', $a);
                    }
                }
            }
            Session::flash('msg_access', 'Artist');
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

    public function ArtistDestroy()
    {
        try{

            SysArtista::destroy(Input::get('id_artist'));


            Session::flash('dbDelete', 'Artist');


            LogSystem::writeSystemLog("The Artist with ID = ". Input::get('id_artist') ." has been deleted","Art.Artist",Auth::id());
            return redirect("art/artist/index");

        }
        catch(\Exception $e)
        {

            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e->getMessage());
            Session::flash('dbDeleteError', 'Artist');
            return redirect("art/artist/index");
        }

    }

    public function ArtistEdit()
    {
        try{
            $loc = SysArtista::find(Input::get('id_artist'));
            $loc->nombre = Input::get('name');
            $loc->apellido = Input::get('lastname');
            $loc->save();
            Session::flash('dbUpdated', '1');
            LogSystem::writeSystemLog("The Artist with ID = ". $loc->id." has been updated","Art.Artist",Auth::id());
            return redirect("art/artist/index");

        }
        catch(\Exception $e)
        {

            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function ArtistCreate()
    {
        try{
            $pro = new SysArtista();

            $pro->nombre = Input::get('name');
            $pro->apellido = Input::get('lastname');
            $pro->save();
            Session::flash('dbCreate', 'Artist');

            LogSystem::writeSystemLog("The Artist with ID = ". $pro->id." has been created","Art.Artist",Auth::id());
            return redirect("art/artist/index");
        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
        }

    }

    public function ArtistExport($id)
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;

            $pro = SysObra::where('id_artista', $id)->orderBy('id', 'desc')->paginate(15);

            /* Se tiene que hacer all()->plunck() y no plunck() directamente, ya que para
   poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */
            $artists = SysArtista::all()->where('id', $id)->pluck('full_name', 'id');


            return view('art.artist.export')
                ->with('modulos', $modules)
                ->with('obras', $pro)
                ->with('artist', $artists);

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

    public function ArtistExportpdf()
    {
        try{
            //$pdf = PDF::loadView('art.artist.pdf');
            /*            $view = \View::make('art.artist.pdf');
                        $pdf = \App::make('dompdf.wrapper');
                        $pdf->loadHTML($view);
                        return $pdf->stream('test.php'); */// Para desplegar en la misma pantalla
            //return $pdf->download('test.php'); // Para descargar el archivo
            //return view('art.artist.pdf');
            //echo "hola";
            $title = Input::get('NameArtist');
            //view()->share('title', "Pan con queso");
            //$view =  view('art.artist.pdf');

            $lista = Input::get('listartworks');

            $obras = SysObra::find($lista);

                //dd(Input::get('listartworks'));
            $pdf =  PDF::loadView('art.artist.pdf', compact(['title', 'obras']))
                        ->setPaper('a4', 'portrait')
                        ->setWarnings(false);
            return $pdf->download('test.pdf');

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            Session::flash('msg_access2', $e);
            echo $e;
            //return redirect("admin/index");
        }

    }
}
