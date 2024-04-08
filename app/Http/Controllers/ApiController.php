<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Licencia;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Soporte;
use App\Models\Terminal;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //==================================
    //cliente

    //Obtener todos los clientes
    public function getCliente(){
        return response()->json(Cliente::all(),200);
    }

    // Obtener cliente por id
    public function getClienteid($id){
        $cliente = Cliente::find($id);
        if (empty($cliente)) {
            return response()->json(['Mensaje' => 'ID INCORRECTO'],404);
        }
        return response()->json($cliente,200);
    }

    //==================================
    //Soporte

    // Obtener todos los soportes
    public function getSoporte(){
        return response()->json(Soporte::all(),200);
    }

    // Insertar soportes
    public function insertSoporte(Request $request){
        $cantidad = Soporte::all()->last()->ticker;

        $soporte = Soporte::create([
            "ticker" => $cantidad ? $cantidad + 1 : 1,
            "colaborador" => $request['colaborador'],
            "fechaCreacionTicke" => $request['fechaCreacionTicke'] ? $request['fechaCreacionTicke'] : null,
            "fechaInicioAsistencia" => $request['fechaInicioAsistencia'] ? $request['fechaInicioAsistencia'] : null,
            "fechaFinalAsistencia" => $request['fechaFinalAsistencia'] ? $request['fechaFinalAsistencia'] : null,
            "id_cliente" => $request['id_cliente'],
            "id_software" => $request['id_software'],
            "problema" => $request['problema'],
            "solucion" => $request['solucion'],
            "observaciones" => $request['observaciones'] ? $request['observaciones'] : null,
            "numLaboral" => $cantidad ? $cantidad + 1 : 1,
            "prioridad" => $request['prioridad'],
            "estado" => $request['estado'],
            "correo_cliente" => $request['correo_cliente'],
            "archivo" => $request['archivo'] ? $request['archivo'] : null,
            "id_expediente" => $request['id_expediente'] ? $request['id_expediente'] : '',
            "empresa" => $request['empresa'],
            "origen_asistencia" => $request['origen_asistencia'],
            "interno" => $request['interno'] ? $request['interno'] : null,
            "fecha_prevista_cumplimiento" => $request['fecha_prevista_cumplimiento'],
            "user_cliente" => $request['user_cliente'],
            "imagen" => $request['imagen'] ? $request['imagen'] : '-'
        ]);

        if (is_null($soporte)) {
            return response()->json(["message"=>"No se pudo insertar"],404);
        }

        return response()->json($soporte,200);

        // $usuario = Soporte::create($request->all());
        // if (is_null($usuario)) {
        //     return response()->json(["message"=>"No se pudo insertar"],404);
        // }
        // return response()->json($usuario,200);
    }

    // Obtener cantidad de soportes a clientes
    public function countSoporteCliente($colaborador){
        // Obtener todos los clientes
        $clientes = Cliente::all();

        // Inicializar el array de resultados
        $resultado = [];

        foreach ($clientes as $cliente) {
            // Contar todos los soportes para el cliente
            $conteo_total = Soporte::where('id_cliente', $cliente->contacto)->count();

            // Contar los soportes específicos para el colaborador "Edwin Torres"
            $conteo_colaborador = Soporte::where('colaborador', $colaborador)
                                        ->where('id_cliente', $cliente->contacto)
                                        ->count();

            // Agregar resultados al array
            $resultado[] = [
                'empresa' => $cliente->nombre,
                'contacto' => $cliente->contacto,
                'conteo_total' => $conteo_total,
                'conteo_colaborador' => $conteo_colaborador
            ];
        }

        return response()->json($resultado, 200);
    }

    // borrar soportes
    public function deleteSoporte(Request $request, $id){
        $usuario = Soporte::destroy($id);
        if (is_null($usuario)) {
            return response()->json(["message"=>"No se pudo borrar"],404);
        }
        return response()->json(["message"=>"Borrado"],200);
    }

    //==================================
    //Licencia

    //Obtener todas las licencias
    public function getLicencia(){
        return response()->json(Licencia::all(),200);
    }

    // Obtener cliente por id
    public function getLicenciaid($id){
        $licencia = Licencia::find($id);
        if (empty($licencia)) {
            return response()->json(['Mensaje' => 'ID INCORRECTO'],404);
        }
        return response()->json($licencia,200);
    }

    //==================================
    //Terminal

    public function getTerminal(){
        return response()->json(Terminal::all(),200);
    }

    // Obtener cliente por id
    public function getTerminalid($id){
        $terminal = Terminal::find($id);
        if (empty($terminal)) {
            return response()->json(['Mensaje' => 'ID INCORRECTO'],404);
        }
        return response()->json($terminal,200);
    }

    // Insertar Cliente
    public function insertTerminal(Request $request){
        $terminal = Terminal::create($request->all());
        if (empty($terminal)) {
            return response()->json(['Mensaje' => 'HUBO UN PROBLEMA AL AGREGAR'],404);
        }
        return response()->json($terminal,200);
    }

    //==================================
    //Pregunta

    public function getPregunta(){
        return response()->json(Pregunta::all(),200);
    }

    public function getPreguntaId($id){
        $pregunta = Pregunta::find($id);
        
        if (empty($pregunta)) {
            return response()->json(['Mensaje' => 'ID INCORRECTO'],404);
        }
        return response()->json($pregunta,200);
    }

    public function insertPregunta(Request $request){
        $pregunta = Pregunta::insert($request->all());
        
        if (empty($pregunta)) {
            return response()->json(['Mensaje' => 'HUBO UN PROBLEMA AL AGREGAR'],404);
        }
        
        return response()->json($pregunta,200);
    }

    //==================================
    //Respuesta

    public function getRespuesta(){
        return response()->json(Respuesta::all(),200);
    }

    public function getRespuestaId($id){
        $respuesta = Respuesta::find($id);
        
        if (empty($respuesta)) {
            return response()->json(['Mensaje' => 'ID INCORRECTO'],404);
        }
        return response()->json($respuesta,200);
    }

    public function insertRespuesta(Request $request){
        $respuesta = Respuesta::insert($request->all());
        
        if (empty($respuesta)) {
            return response()->json(['Mensaje' => 'HUBO UN PROBLEMA AL AGREGAR'],404);
        }
        
        return response()->json($respuesta,200);
    }

    //==================================
    //Graficos

    public function graficoSoporte(){
        $contacto_clientes = Cliente::all()->pluck('contacto');
        $nombre_clientes = Cliente::all()->pluck('nombre');
        $resultados = [];

        foreach ($contacto_clientes as $indice => $nombre) {
            $conteo = Soporte::where('id_cliente', $nombre)->count();
            $resultados[$indice] = $conteo;
        }

        return response()->json([$nombre_clientes,$resultados],200);
    }

}
