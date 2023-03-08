<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\UserCliente;
use Illuminate\Http\Request;

class UserClienteController extends Controller
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
        $datos = UserCliente::where('id','like','%'.$busqueda.'%')->paginate();
        $userclientes = UserCliente::all();
        $clientes = Cliente::all();
        $valor = 0;
        return view('user_cliente.index', compact('datos','userclientes','obtenerId','busqueda','clientes','valor'));
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cliente' => 'required',
        ]);

        $datos = $request->except('_token');
        // UserCliente::insert($datos);
        UserCliente::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'cliente' => $datos['cliente'],
        ]);
        return redirect('/user_cliente?buscar='.$obtenerId)->with('success','GUARDADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCliente  $userCliente
     * @return \Illuminate\Http\Response
     */
    public function show(UserCliente $userCliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCliente  $userCliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $obtenerId = $_GET['buscar'];
        $datos = UserCliente::find($id);
        return view('user_cliente.edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCliente  $userCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $obtenerId)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cliente' => 'required',
        ]);
        $datos = $request->except('_token','_method');
        // UserCliente::where('id','=',$id)->update($datos);
        $datos = UserCliente::find($id);

        $datos->name = $request->input('name');
        $datos->email = $request->input('email');
        $datos->cliente = $request->input('cliente');
        $datos->save();

        return redirect('/user_cliente?buscar='.$obtenerId)->with('success','INFORMACIÓN ACTUALIZADA');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCliente  $userCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserCliente::destroy($id);
        return redirect('/user_cliente')->with('danger','ELMINADO CON ÉXITO');
    }
}
