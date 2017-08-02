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
            $modules  = User::find(Auth::id())->profile->module;

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

    public function SearchDetails($opc, $textsearch)
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;
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

    public function SearchDetails2($opc, $id, $textsearch)
    {
        try{


            /* Menu */
            $modules  = User::find(Auth::id())->profile->module;
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



}
