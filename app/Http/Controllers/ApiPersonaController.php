<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class ApiPersonaController extends Controller
{
    public function show($numero_documento, Request $request){
        $persona  = Persona::where("numero_documento",$numero_documento)->first();

        return response()->json($persona);
    }
}
