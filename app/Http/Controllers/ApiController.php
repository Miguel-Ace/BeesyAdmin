<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Licencia;
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
}
