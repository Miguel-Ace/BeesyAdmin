<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class NosImportaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Preguntas
    public function pregIndex(Request $request){
        $datos = Pregunta::all();
        return view('nos_importa.pregunta.index', compact('datos'));
    }

    public function pregStore(Request $request){
        request()->validate([
            'pregunta' => 'required',
            'fecha_creacion' => 'required',
            'intentos' => 'required',
            'activo' => 'required',
        ]);

        $datos = $request->except('_token');
        Pregunta::insert($datos);
        return redirect('/preguntas')->with('success','GUARDADO CON ÉXITO');
    }

    public function pregEdit($id){
        $datos = Pregunta::find($id);

        return view('nos_importa.pregunta.edit', compact('datos'));
    }

    public function pregUpdate(Request $request, $id){
        request()->validate([
            'pregunta' => 'required',
            'fecha_creacion' => 'required',
            'intentos' => 'required',
            'activo' => 'required',
        ]);

        $datos = $request->except('_token','_method');
        Pregunta::where('id','=',$id)->update($datos);
        return redirect('/preguntas')->with('success','INFORMACIÓN ACTUALIZADA');
    }

    public function pregDestroy($id)
    {
        Pregunta::destroy($id);
        return redirect('/preguntas')->with('danger','ELMINADO CON ÉXITO');
    }

    // Preguntas
    public function resIndex(Request $request){
        $datos = Respuesta::all();
        $preguntas = Pregunta::all();
        
        $countPreguntas = [];

        foreach ($preguntas as $key => $value) {
            array_push($countPreguntas, $value->id);
        }
        return view('nos_importa.respuesta.index', compact('datos','countPreguntas'));
    }
}
