<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
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
        $datos = Etapa::all();
        return view('etapas.index', compact('datos'));
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
            'etapa' => 'required',
        ]);

        $datos = $request->except('_token');
        Etapa::insert($datos);
        return redirect('/etapas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function show(Etapa $etapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Etapa::find($id);
        return view('etapas.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Etapa::where('id','=',$id)->update($datos);
        return redirect('/etapas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etapa  $etapa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etapa::destroy($id);
        return redirect('/etapas');
    }
}
