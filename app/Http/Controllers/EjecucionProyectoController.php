<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Proyecto;
use App\Models\UserCliente;
use Illuminate\Http\Request;
use App\Models\DetalleProyecto;

class EjecucionProyectoController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->buscar;
        $datos = Proyecto::where('id','like','%'.$busqueda.'%')
        ->orwhere('nombre','like','%'.$busqueda.'%')
        ->paginate();
        $clientes = Cliente::all();
        $usuarios = User::all();
        $proyectos = Proyecto::all();
        $detalleProyectos = DetalleProyecto::all();
        $userdeclientes = UserCliente::all();
        $valor = 0;
        return view('ejecucion_proyecto.index', compact('proyectos','datos','busqueda','clientes','usuarios','valor','detalleProyectos','userdeclientes'));
    }
}
