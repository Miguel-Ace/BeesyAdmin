<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etapa;
// use App\Models\Usuario;
use App\Models\Estado;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\DetalleProyecto;
use App\Mail\notificacionesProyecto;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DetalleProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $obtenerId = $_GET['buscar'];
        $busqueda = $request->buscar;
        $datos = DetalleProyecto::where('id_proyecto','like','%'.$busqueda.'%')->paginate();
        $proyectos = Proyecto::all();
        $usuarios = User::all();
        $estados = Estado::all();
        $etapas = Etapa::all();
        $datalleproyectos = DetalleProyecto::all();
        $valor = 0;
        return view('detalle_proyecto.index', compact('datos','datalleproyectos','busqueda','obtenerId','proyectos','usuarios','estados','etapas','valor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $obtenerId)
    {
        request()->validate([
            // 'id_proyecto' => 'required|unique:detalle_proyectos',
            'id_proyecto' => 'required',
            'num_actividad' => 'required|min:1',
            'nombre_actividad' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'horas_propuestas' => 'required|min:1',
            'id_usuario' => 'required|min:1',
            'ejecutor_cliente' => 'required',
            'tipo' => 'required',
            'rendimiento' => 'required',
            'id_etapa' => 'required',
        ]);

        // $correo = new notificacionesProyecto($message);
        // $emails = DB::table('users')->pluck('email');
        // Mail::to($emails)->send($correo);

        $datos = $request->except('_token');
        DetalleProyecto::insert($datos);
        return redirect('/detalle_proyectos?buscar='.$obtenerId)->with('success','GUARDADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleProyecto  $detalleProyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id, $obtenerId)
    {
        $proyectos = Proyecto::all();
        $usuarios = User::all();
        $datos = DetalleProyecto::find($id);
        return view('detalle_proyecto.show', compact('datos','obtenerId','proyectos','usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleProyecto  $detalleProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $obtenerId)
    {
        $datos = DetalleProyecto::find($id);
        $proyectos = Proyecto::all();
        $usuarios = User::all();
        $estados = Estado::all();
        $etapas = Etapa::all();
        $valor = 0;
        return view('/detalle_proyecto.edit', compact('datos','obtenerId','proyectos','usuarios','estados','etapas','valor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleProyecto  $detalleProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $obtenerId)
    {
        $message = [
            'id_proyecto' => $request->input('id_proyecto'),
            'num_actividad' => $request->input('num_actividad'),
            'nombre_actividad' => $request->input('nombre_actividad'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            'horas_propuestas' => $request->input('horas_propuestas'),
            'id_usuario' => $request->input('id_usuario'),
            'ejecutor_cliente' => $request->input('ejecutor_cliente'),
            'tipo' => $request->input('tipo'),
            'rendimiento' => $request->input('rendimiento'),
            'id_estado' => $request->input('id_estado'),
            'id_etapa' => $request->input('id_etapa')
        ];

        $clientes = Cliente::all();
        $proyectos = Proyecto::all();
        foreach ($proyectos as $proyecto) {
            if ($proyecto->id == $obtenerId) {
                $nombreCliente = $proyecto->id_cliente;
                $emailResponsable = $proyecto->email_responsable;
            }
        }
        foreach ($clientes as $cliente) {
            if ($cliente->nombre == $nombreCliente) {
                $correoCliente = $cliente->correo;
            }
        }

        // El código se repite para no tener el mismo mensaje 2 o más vences en la bandeja de gmail x correo
        $correo = new notificacionesProyecto($message);
        $email = $correoCliente;
        Mail::to($email)->send($correo);
        
        $correo = new notificacionesProyecto($message);
        $email = $emailResponsable;
        Mail::to($email)->send($correo);
        
        $datos = $request->except('_token','_method');
        DetalleProyecto::where('id','=',$id)->update($datos);
        return redirect('/detalle_proyectos?buscar='.$obtenerId)->with('success','INFORMACIÓN ACTUALIZADA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleProyecto  $detalleProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetalleProyecto::destroy($id);
        return redirect('/detalle_proyectos')->with('danger','ELMINADO CON ÉXITO');
    }
}
