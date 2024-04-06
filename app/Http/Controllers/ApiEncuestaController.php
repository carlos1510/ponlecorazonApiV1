<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Encuesta;

class ApiEncuestaController extends Controller
{
    public function index(Request $request) {
        // Si no se envia el parametro
        $encuestas = Encuesta::all();

        return response()->json($encuestas);
    }

    public function  show($id, Request $request){
        $encuesta  = Encuesta::find($id);

        return response()->json($encuesta);
    }

    public function  store(Request $request) {
        $response = ["status" => 'ok', "msg"=> "Encuesta registrada"];
        $params = json_decode($request->getContent());
        $encuesta = new Encuesta();
        $encuesta->dni = $params->dni;
        $encuesta->nombres = $params->nombres;
        $encuesta->apellidos = $params->apellidos;
        $encuesta->sexo = $params->sexo;
        $encuesta->fecha_nacimiento = $params->fecha_nacimiento;
        $encuesta->direccion = $params->direccion;
        $encuesta->fecha = $params->fecha;
        $encuesta->latitud = $params->latitud;
        $encuesta->longitud = $params->longitud;
        $encuesta->foto_1 = $params->foto_1;
        $encuesta->usersid = $params->usersid;
        $encuesta->usersdni = $params->usersdni;
        $encuesta->estado = $params->estado;

        $encuesta->save();

        return response()->json($response);
    } 

    public function  update($id, Request $request) {
        //
    }

    public function  destroy($id, Request $request) {
        //
    }
}
