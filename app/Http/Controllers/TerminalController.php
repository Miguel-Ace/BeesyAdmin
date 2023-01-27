<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
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
        $datos = Terminal::all();
        $clientes = Cliente::all();
        return view('terminal.index', compact('datos','clientes'));
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
            'id_licencia' => 'required',
            'serial' => 'required|min:9|max:9',
            'nombreEquipo' => 'required',
            'ultimoAcceso' => 'required',
        ]);

        $datos = $request->except('_token');
        Terminal::insert($datos);
        return redirect('/terminales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function show(Terminal $terminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Terminal::find($id);
        $clientes = Cliente::all();
        return view('terminal.edit', compact('datos','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Terminal::where('id','=',$id)->update($datos);
        return redirect('/terminales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Terminal::destroy($id);
        return redirect('/terminales');
    }
}
