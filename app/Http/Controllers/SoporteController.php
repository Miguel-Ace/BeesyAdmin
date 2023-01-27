<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Soporte;
use App\Models\Software;
use App\Mail\notificaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SoporteController extends Controller
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
        $datos = Soporte::all();
        $clientes = Cliente::all();
        $softwares = Software::all();
        $cantidad = Soporte::count();
        // $cantidad = Soporte::lastest()->paginate(1);
        return view('soporte.index', compact('datos','clientes','softwares','cantidad'));
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
        $message = request()->validate([
            'sticker' => 'required',
            'colaborador' => 'required',
            'numLaboral' => 'required',
            'fechaHoraInicio' => 'required',
            'fechaHoraFinal' => 'required',
            'id_cliente' => 'required',
            'id_software' => 'required',
            'numLaboral' => 'required',
            'problema' => 'required',
            'solucion' => 'required',
            'observaciones' => 'required',
        ]);

        $datos = $request->except('_token');
        Soporte::insert($datos);


        $correo = new notificaciones($message);
        $emails = ['acevedo51198@gmail.com','acevedomac@gmail.com'];

        foreach ($emails as $email) {
            Mail::to($email)->send($correo);
        }

        // Mail::to('acevedo51198@gmail.com')->queue($correo);
        // Mail::to('acevedomac@gmail.com')->queue($correo);

        return redirect('/soporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function show(Soporte $soporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Soporte::find($id);
        $clientes = Cliente::all();
        $softwares = Software::all();
        return view('soporte.edit', compact('datos','clientes','softwares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->except('_token','_method');
        Soporte::where('id','=',$id)->update($datos);
        return redirect('/soporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soporte  $soporte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Soporte::destroy($id);
        return redirect('/soporte');
    }
}
