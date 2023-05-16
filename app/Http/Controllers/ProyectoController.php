<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleProyecto;
use App\Models\Proyecto;
use App\Models\PruebaDetalleProyecto;
use App\Models\User;
use App\Models\UserCliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProyectoController extends Controller
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
        $ultimoId = Proyecto::max('id');
        return view('proyecto.index', compact('ultimoId','proyectos','datos','busqueda','clientes','usuarios','valor','detalleProyectos','userdeclientes'));
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
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            // 'id_cliente' => 'required|unique:proyectos',
            'id_cliente' => 'required',
            'user_de_cliente' => 'required',
            'responsable_cliente' => 'required|string|min:3',
            'email_responsable' => 'required|email',
            'telefono_responsable' => 'required|min:8|max:8',
            'id_usuario' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'select_plantilla' => 'required',

        ]);

        $datos = $request->except('_token');
        Proyecto::insert($datos);

        $pruebaDetallProyectos = PruebaDetalleProyecto::all();

        $ultimoId = Proyecto::max('id');

        foreach ($pruebaDetallProyectos as $id => $pruebaDetallProyecto) {

            if ($pruebaDetallProyecto->select_plantilla == $request->input('select_plantilla')) {
                $detalleItem = new DetalleProyecto();
                $detalleItem->id_proyecto = $ultimoId;
                $detalleItem->num_actividad = $pruebaDetallProyecto->num_actividad;
                $detalleItem->nombre_actividad = $pruebaDetallProyecto->nombre_actividad;
                $detalleItem->horas_propuestas = $pruebaDetallProyecto->horas_propuestas;
                $detalleItem->meta_hrs_optimas = $pruebaDetallProyecto->meta_hrs_optimas;
                $detalleItem->id_estado = $pruebaDetallProyecto->id_estado;
                $detalleItem->id_etapa = $pruebaDetallProyecto->id_etapa;
                $detalleItem->save();
            }
        }

        return redirect('/proyectos')->with('success','GUARDADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Proyecto::find($id);
        $clientes = Cliente::all();
        $usuarios = User::all();
        $userdeclientes = UserCliente::all();
        $valor = 0;
        return view('proyecto.edit', compact('datos','clientes','usuarios','valor','userdeclientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Proyecto::where('id','=',$id)->update($datos);
        return redirect('/proyectos')->with('success','INFORMACIÓN ACTUALIZADA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::destroy($id);
        return redirect('/proyectos')->with('danger','ELMINADO CON ÉXITO');
    }
}
