<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class ApiPersonaController extends Controller
{
    public function show($numero_documento, Request $request){
        $persona  = Persona::select('id','numero_documento','apellido_paterno','apellido_matero','nombres','nombre','sexo','ubigero_reniec','verificado')->SelectRaw('DATE_FORMAT(fecha_nacimiento,"%d/%m/%Y") as fecha_nacimiento')->where("numero_documento",$numero_documento)->first();

        return response()->json($persona);
    }
}
