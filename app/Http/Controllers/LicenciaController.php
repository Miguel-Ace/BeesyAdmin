<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Licencia;
use App\Models\Software;
use Illuminate\Http\Request;

class LicenciaController extends Controller
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
    public function index()
    {
        $datos = Licencia::all();
        $clientes = Cliente::all();
        $softwares = Software::all();
        return view('licencia.index', compact('datos','clientes','softwares'));
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
            'id_cliente' => 'required',
            'id_software' => 'required',
            'cantidad' => 'required',
            'fechaInicio' => 'required',
            'fechaFinal' => 'required',
        ]);

        $datos = $request->except('_token');
        Licencia::insert($datos);
        return redirect('/licencias')->with('success','GUARDADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function show(Licencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Licencia::find($id);
        $clientes = Cliente::all();
        $softwares = Software::all();
        return view('licencia.edit', compact('datos','clientes','softwares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Licencia::where('id','=',$id)->update($datos);
        return redirect('/licencias')->with('success','INFORMACIÓN ACTUALIZADA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Licencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Licencia::destroy($id);
        return redirect('/licencias')->with('danger','ELMINADO CON ÉXITO');
    }
}
