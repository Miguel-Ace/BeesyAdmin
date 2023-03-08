<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use App\Models\Estado;
use App\Models\Usuario;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\DetalleProyecto;

class PlantillaDetalleProyectoController extends Controller
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
        $usuarios = Usuario::all();
        $estados = Estado::all();
        $etapas = Etapa::all();
        $valor = 0;
        return view('plantilla_detalle_proyecto.index', compact('datos','busqueda','obtenerId','proyectos','usuarios','estados','etapas','valor'));
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
            'id_proyecto' => 'required|unique:detalle_proyectos',
            'num_actividad' => 'required|min:1',
            'nombre_actividad' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'horas_propuestas' => 'required|min:1',
            'horas_reales' => 'required|min:1',
            'meta_hrs_optimas' => 'required|min:1',
            'id_usuario' => 'required|min:1',
            'ejecutor_cliente' => 'required',
            'tipo' => 'required',
            'rendimiento' => 'required',
            'id_estado' => 'required',
            'id_etapa' => 'required',
            'select_plantilla' => 'required',
        ]);

        $datos = $request->except('_token');
        DetalleProyecto::insert($datos);
        return redirect('/plantilla_detalle_proyectos?buscar='.$obtenerId)->with('success','GUARDADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $obtenerId)
    {
        $proyectos = Proyecto::all();
        $datos = DetalleProyecto::find($id);
        return view('plantilla_detalle_proyecto.show', compact('datos','obtenerId','proyectos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $obtenerId)
    {
        $datos = DetalleProyecto::find($id);
        $proyectos = Proyecto::all();
        $usuarios = Usuario::all();
        $estados = Estado::all();
        $etapas = Etapa::all();
        $valor = 0;
        return view('/plantilla_detalle_proyecto.edit', compact('datos','obtenerId','proyectos','usuarios','estados','etapas','valor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $obtenerId)
    {
        $datos = $request->except('_token','_method');
        DetalleProyecto::where('id','=',$id)->update($datos);
        return redirect('/plantilla_detalle_proyectos?buscar='.$obtenerId)->with('success','INFORMACIÓN ACTUALIZADA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetalleProyecto::destroy($id);
        return redirect('/plantilla_detalle_proyecto')->with('danger','ELMINADO CON ÉXITO');
    }
}
