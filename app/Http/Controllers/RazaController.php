<?php

namespace Rolcito\Http\Controllers;

use Illuminate\Http\Request;
use Rolcito\Race;
class RazaController extends Controller
{
    public function index(Request $request)
    {


        if($request->ajax()){

            $races = Race::all();

            return $races;

        }else{
            return 'algo anda mal';
        }
    }
}
