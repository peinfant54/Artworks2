<?php

namespace App\Http\Controllers\art\search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchForm;


use App\Helpers\SystemCatchLog\LogSystem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Models\SysModel\SysArtista;
use App\Models\SysModel\SysUbicaciones;
use App\Models\SysModel\SysObra;
use App\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    //
    public function index()
    {
        $texto = Input::get('textsearch');
        return redirect("art/search/".$texto);
    }
    public function SearchIndex($texto)
    {
        try{

            //$texto = Input::get('textsearch');
            //dd($texto);
            /* Menu */
            //$mod  = User::with('profile')->find(Auth::id())->profile->module;
            $modules  = User::find(Auth::id())->profile->module;

            $permission_edit_art = $modules[6]->pivot->eedit;

            $search_ninv = SysObra::where('n_inv','like', '%'.$texto.'%')
                                  ->orderBy('id', 'desc')->paginate(5);
            $search_titulo = SysObra::Where('titulo','like', '%'.$texto.'%')
                                    ->orderBy('id', 'desc')->paginate(5);
            $search_tecnica = SysObra::Where('tecnica','like', '%'.$texto.'%')
                                    ->orderBy('id', 'desc')->paginate(5);
            $search_procedencia = SysObra::Where('procedencia','like', '%'.$texto.'%')
                                    ->orderBy('id', 'desc')->paginate(5);
            $search_catalogo = SysObra::Where('catalogo','like', '%'.$texto.'%')
                                    ->orderBy('id', 'desc')->paginate(5);
//dd($search_catalogo);
            $search_artists  = SysArtista::where('nombre','like', '%'.$texto.'%')
                            ->orWhere('apellido','like', '%'.$texto.'%')
                            ->get();
            //dd($search_artists);
            $search_location = SysUbicaciones::Where('name','like','%'.$texto.'%')->get();
            //dd($search_artists);
            $location = SysUbicaciones::pluck('name','id');
            /* Se tiene que hace all()->plunck() y no plunck() directamente, ya que para
               poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */

            return view('art.search.index')
                ->with('modulos', $modules) //Modulos
                ->with('location', $location)
                ->with('ninv', $search_ninv)
                ->with('titulo', $search_titulo)
                ->with('tecnica', $search_tecnica)
                ->with('procedencia', $search_procedencia)
                ->with('catalogo', $search_catalogo)
                ->with('artist', $search_artists)
                ->with('location2', $search_location)
                ->with('editar_obra', $permission_edit_art)
                ->with('texto', $texto);

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e);
            //return redirect("admin/index");
        }
    }

    public function SearchDetails($opc, $textsearch, $opc2)
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;
            $permission_edit_art = $modules[6]->pivot->eedit;
            if($opc == 1) // Por Numero de inventario
            {
                $obras = SysObra::where('n_inv','like', '%'.$textsearch.'%')
                    ->orderBy('id', 'desc')->paginate(10);
            }
            elseif($opc == 2) // Por titulo
            {
                $obras = SysObra::Where('titulo','like', '%'.$textsearch.'%')
                    ->orderBy('id', 'desc')->paginate(10);
            }
            elseif($opc == 3) // Por tecnica
            {
                $obras = SysObra::Where('tecnica','like', '%'.$textsearch.'%')
                    ->orderBy('id', 'desc')->paginate(10);
            }
            elseif($opc == 4) // Por Procedencia
            {
                $obras = SysObra::Where('procedencia','like', '%'.$textsearch.'%')
                    ->orderBy('id', 'desc')->paginate(10);
            }
            elseif($opc == 5) // Por Catalogo
            {
                $obras = SysObra::Where('catalogo','like', '%'.$textsearch.'%')
                    ->orderBy('id', 'desc')->paginate(10);
//dd($search_catalogo);
            }


            /*$search_artists  = SysArtista::where('nombre','like', '%'.$textsearch.'%')
                ->orWhere('apellido','like', '%'.$textsearch.'%')
                ->get()->pluck('full_name', 'id');*/
            //dd($search_artists);
            $location = SysUbicaciones::pluck('name','id');
            /* Se tiene que hace all()->plunck() y no plunck() directamente, ya que para
               poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */

            return view('art.search.details')
                ->with('modulos', $modules) //Modulos
                ->with('location', $location)
                ->with('obras', $obras)
                ->with('opc', $opc)
                ->with('opc2', $opc2)
                ->with('editar_obra', $permission_edit_art)
                ->with('textsearch', $textsearch);

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e);
            //return redirect("admin/index");
        }
    }

    public function SearchDetails2($opc, $id, $textsearch, $opc2)
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;
            $permission_edit_art = $modules[6]->pivot->eedit;
            if($opc == 1) // Por Artista
            {
                $obras = SysObra::where('id_artista', $id)
                        ->paginate(10);

                $name = SysArtista::find($id)->nombre ." ". SysArtista::find($id)->apellido;
            }
            elseif($opc == 2) // Por Ubicacion
            {
                $obras = SysObra::where('id_ubica', $id)->paginate(10);

                $name = SysUbicaciones::find($id)->name;
            }




            $location = SysUbicaciones::pluck('name','id');
            /* Se tiene que hace all()->plunck() y no plunck() directamente, ya que para
               poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */

            return view('art.search.details2')
                ->with('modulos', $modules) //Modulos
                ->with('location', $location)
                ->with('obras', $obras)
                ->with('opc', $opc)
                ->with('opc2', $opc2)
                ->with('xid', $id)
                ->with('editar_obra', $permission_edit_art)
                ->with('name', $name)
                ->with('texto', $textsearch);

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e);
            //return redirect("admin/index");
        }
    }

    public function Summary($opc, $id)
    {
        try{


            /* Menu */
            $name = "";
            $modules  = User::find(Auth::id())->profile->module;
            $permission_edit_art = $modules[6]->pivot->eedit;
            if($opc == 1) // Sin titulo
            {
                $obras = SysObra::where('titulo', 'Sin título')
                        ->orderBy('id', 'desc')->paginate(15);
            }
            elseif($opc == 2) // Sin Ubica
            {
                $obras = SysObra::where('id_ubica', '1000')
                    ->orderBy('id', 'desc')->paginate(15);
            }
            elseif($opc == 3) // Sin Imagenes
            {
                $obras = SysObra::where('file1', '')
                    ->orderBy('id', 'desc')->paginate(15);
            }
            elseif($opc == 4) // Por Ubicacióon
            {
                $obras = SysObra::where('id_ubica', $id)
                    ->orderBy('id', 'desc')->paginate(15);
                $name = SysUbicaciones::find($id);
            }



            /*$search_artists  = SysArtista::where('nombre','like', '%'.$textsearch.'%')
                ->orWhere('apellido','like', '%'.$textsearch.'%')
                ->get()->pluck('full_name', 'id');*/
            //dd($search_artists);
            $location = SysUbicaciones::pluck('name','id');

            /* Se tiene que hace all()->plunck() y no plunck() directamente, ya que para
               poder ejecutar la funciuon(full_name) necesita tenern los datos en memoria */

            return view('art.search.summary')
                ->with('modulos', $modules) //Modulos
                ->with('location', $location)
                ->with('obras', $obras)
                ->with('editar_obra', $permission_edit_art)
                ->with('opc', $opc)
                ->with('xid', $id)
                ->with('name', $name);

        }
        catch(\Exception $e)
        {
            LogSystem::writeLog("ExcepcionM : " . $e->getMessage() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionF : " . $e->getFile() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionL : " . $e->getLine() . " ", Auth::id());
            LogSystem::writeLog("ExcepcionT : " . $e->getTraceAsString() . " ", Auth::id());
            //Session::flash('msg_access2', $e);
            //return redirect("admin/index");
        }
    }



}
