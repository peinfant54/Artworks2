<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageLocalizationController extends Controller
{
    public function index(Request $request)
    {
            if($request->lang == 'es')
            {

                Session::put('applocale', 'es');

            }
            else{

                Session::put('applocale', 'en');
                //echo  "Ingles";
            }
//dd($request);
        return Redirect::back();

    }
}
