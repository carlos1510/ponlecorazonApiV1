<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Encuesta;
use PhpParser\Node\Expr\Cast\Double;

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
        //$response = ["status" => 'ok', "msg"=> "Encuesta registrada"];
        /*if($request->hasFile('image')){
            $image = $request->file('image');

            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);*/
        if($request->has('image') && $request->filled('image')){

            //Decodificar la imagen de base64
            $image = $request->get('image');
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ','+',$image);
            $decodedImage = base64_decode($image);

            $imageName = time().'_'.uniqid().'.jpeg';
            $path = public_path('uploads/' . $imageName);
            file_put_contents($path, $decodedImage);

            //$params = json_decode($request->getContent());
            $encuesta = new Encuesta();
            $encuesta->dni = $request->get('dni');
            $encuesta->nombres = $request->get('nombres');
            $encuesta->apellidos = $request->get('apellidos');
            $encuesta->sexo = $request->get('sexo');
            $encuesta->fecha_nacimiento = $request->get('fecha_nacimiento');
            $encuesta->direccion = $request->get('direccion');
            $encuesta->fecha = $request->get('fecha');
            $encuesta->latitud = $request->get('latitud');
            $encuesta->longitud = $request->get('longitud');
            $encuesta->foto_1 = 'uploads/'.$imageName;
            $encuesta->usersid = $request->get('usersid');
            $encuesta->usersdni = $request->get('usersdni');
            $encuesta->estado = $request->get('estado');

            $encuesta->save();

            return response()->json(['image_url' => url('uploads/' . $imageName)], 201);

        }
        return response()->json(['message' => 'No image provided'], 400);
        
    } 

    public function  update($id, Request $request) {
        //
    }

    public function  destroy($id, Request $request) {
        //
    }
}
