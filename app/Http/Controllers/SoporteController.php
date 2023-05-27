<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Soporte;
use App\Models\Software;
use App\Mail\notificaciones;
use App\Mail\notificacionesFinal;
use App\Mail\notificacionesCliente;
use App\Mail\notificacionesProceso;
use App\Models\UserCliente;
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
        $datos = Soporte::orderBy('id','desc')->get();
        $clientes = Cliente::all();
        $softwares = Software::all();
        $usuarioclientes = UserCliente::all();
        $cantidad = Soporte::count();
        // $cantidad = Soporte::lastest()->paginate(1);
        return view('soporte.index', compact('datos','clientes','softwares','cantidad','usuarioclientes'));
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
            'ticker' => 'required',
            'colaborador' => 'required',
            'numLaboral' => 'required',
            'fechaInicioAsistencia' => 'required',
            'fechaCreacionTicke' => 'nullable',
            'id_cliente' => 'required',
            'correo_cliente' => 'nullable',
            'id_software' => 'required',
            'numLaboral' => 'required',
            'problema' => 'nullable',
            'solucion' => 'nullable',
            'observaciones' => 'nullable',
            'prioridad' => 'required',
            'estado' => 'required',
            'archivo' => 'nullable',
        ]);

        $datos = $request->except('_token');
        if ($request->file('archivo')) {
            // $datos['archivo'] = $request->file('archivo')->store('archivos','public');
            $datos['archivo'] = $request->file('archivo')->storeAs('archivos', $request->file('archivo')->getClientOriginalName(), 'public');
        }
        Soporte::insert($datos);

        $correo = new notificacionesCliente($message);

        // Mensaje a los clientes
        // ======================
        $email = $request->input('correo_cliente');
        Mail::to($email)->send($correo);

        // Mensaje a soporte
        // =================
        $correo = new notificaciones($message);
        $emails = DB::table('users')->pluck('email');
        Mail::to($emails)->send($correo);

        // $emails = ['acevedo51198mac@gmail.com','juego55miguel@gmail.com','juego2miguel@gmail.com	'];
        // Mail::to('acevedomac@gmail.com')->queue($correo);
        // Mail::to('acevedo51198mac@gmail.com')->queue($correo);

        return redirect('/soporte')->with('success','GUARDADO CON ÉXITO');
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
        $usuarioclientes = UserCliente::all();
        return view('soporte.edit', compact('datos','clientes','softwares','usuarioclientes'));
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
        $message = request()->validate([
            'ticker' => 'required',
            'colaborador' => 'required',
            'numLaboral' => 'required',
            'fechaInicioAsistencia' => 'required',
            'fechaFinalAsistencia' => 'nullable',
            'fechaCreacionTicke' => 'nullable',
            'id_cliente' => 'required',
            'id_software' => 'required',
            'numLaboral' => 'required',
            'problema' => 'nullable',
            'solucion' => 'nullable',
            'observaciones' => 'nullable',
            'prioridad' => 'required',
            'estado' => 'required',
        ]);

        $datos = $request->except('_token','_method');
        Soporte::where('id','=',$id)->update($datos);

        $estado = $request->input('estado');

        if ($estado == 'Completo') {
            // Aqui hagarro el correo que se pasó al input
            $correo = new notificacionesFinal($message);
            $email = $request->input('correo_cliente');
            Mail::to($email)->send($correo);

            $correo = new notificacionesFinal($message);
            $emails = DB::table('users')->pluck('email');
            Mail::to($emails)->send($correo);
        }else{
            // Aqui recorro todos los email sin necesidad de foreach
            $correo = new notificacionesProceso($message);
            $emails = DB::table('users')->pluck('email');
            Mail::to($emails)->send($correo);
        }


        return redirect('/soporte')->with('success','INFORMACIÓN ACTUALIZADA');
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
        return redirect('/soporte')->with('danger','ELMINADO CON ÉXITO');
    }
}
