<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Soporte;
use App\Models\Software;
use App\Models\UserCliente;
use App\Mail\notificaciones;
use Illuminate\Http\Request;
use App\Mail\notificacionesFinal;
use Illuminate\Support\Facades\DB;
use App\Mail\notificacionesCliente;
use App\Mail\notificacionesProceso;
use App\Models\Expediente;
use Carbon\Carbon;
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
        $cantidad = Soporte::all()->last();
        $usuarios = User::where('id', '!=', 8)
        ->where('id', '!=', 2)
        ->get();
 
        // Prioridades
        $prioridades = ['Leve','Moderado','Alta'];
        // Estado
        $estados = ['Asignado','En Proceso','Completo'];
        // Origen de asistencia
        $origen_asistencias = [
            'Laboratorio',
            'Asistencia',
            'Garantía',
            'Instalación',
            'Configuración',
            'Capacitación',
            'Mejora',
            'Especialización',
            'Importación',
            'Servidor',
            'Reunión',
        ];
        return view('soporte.index', compact('datos','clientes','softwares','cantidad','usuarioclientes','usuarios','prioridades','origen_asistencias','estados'));
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
            'colaborador' => 'required',
            // 'fechaInicioAsistencia' => 'required',
            'fechaCreacionTicke' => 'nullable',
            'id_cliente' => 'required',
            'correo_cliente' => 'nullable',
            'id_software' => 'required',
            'problema' => 'nullable',
            'solucion' => 'nullable',
            'observaciones' => 'nullable',
            'prioridad' => 'required',
            'estado' => 'required',
            'archivo' => 'nullable',
            'empresa' => 'required',
            'fecha_prevista_cumplimiento' => 'required',
        ]);

        // $datos = $request->except('_token');
        if ($request->file('archivo')) {
            // $datos['archivo'] = $request->file('archivo')->store('archivos','public');
            $datos['archivo'] = $request->file('archivo')->storeAs('archivos', $request->file('archivo')->getClientOriginalName(), 'public');
        }

        $cantidad = Soporte::all()->last()->ticker;

        $newMensaje = Soporte::create([
            "ticker" => $cantidad ? $cantidad + 1 : 1,
            "colaborador" => $request['colaborador'],
            "fechaCreacionTicke" => $request['fechaCreacionTicke'] ? $request['fechaCreacionTicke'] : null,
            "fechaInicioAsistencia" => $request['fechaInicioAsistencia'] ? $request['fechaInicioAsistencia'] : null,
            "fechaFinalAsistencia" => $request['fechaFinalAsistencia'] ? $request['fechaFinalAsistencia'] : null,
            "id_cliente" => $request['id_cliente'],
            "id_software" => $request['id_software'],
            "problema" => $request['problema'],
            "solucion" => $request['solucion'],
            "observaciones" => $request['observaciones'] ? $request['observaciones'] : null,
            "numLaboral" => $cantidad ? $cantidad + 1 : 1,
            "prioridad" => $request['prioridad'],
            "estado" => $request['estado'],
            "correo_cliente" => $request['correo_cliente'],
            "archivo" => $request['archivo'] ? $request['archivo'] : null,
            "id_expediente" => $request['id_expediente'] ? $request['id_expediente'] : '',
            "empresa" => $request['empresa'],
            "origen_asistencia" => $request['origen_asistencia'],
            "interno" => $request['interno'] ? $request['interno'] : null,
            "fecha_prevista_cumplimiento" => $request['fecha_prevista_cumplimiento'],
            "user_cliente" => $request['user_cliente'],
        ]);

        // Soporte::insert($datos);

        if ($request->input('interno') == 1) {
            // Mensaje a soporte
            $correo = new notificaciones($newMensaje);
            $emails = DB::table('users')->pluck('email');
            Mail::to($emails)->send($correo);
        }else{
            $correo = new notificacionesCliente($newMensaje);

            // Mensaje a los clientes
            // ======================
            $email = $request->input('correo_cliente');
            Mail::to($email)->send($correo);

            // Mensaje a soporte
            // =================
            $correo = new notificaciones($newMensaje);
            $emails = DB::table('users')->pluck('email');
            Mail::to($emails)->send($correo);
        }

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
        $usuarios = User::where('id', '!=', 8)
        ->where('id', '!=', 2)
        ->get();

        // Prioridades
        $prioridades = ['Leve','Moderado','Alta'];
        // Estado
        $estados = ['Asignado','En Proceso','Completo'];
        // Origen de asistencia
        $origen_asistencias = [
            'Laboratorio',
            'Asistencia',
            'Garantía',
            'Instalación',
            'Configuración',
            'Capacitación',
            'Mejora',
            'Especialización',
            'Importación',
            'Servidor',
            'Reunión',
        ];

        return view('soporte.edit', compact('datos','clientes','softwares','usuarioclientes','usuarios','prioridades','estados','origen_asistencias'));
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
        $soporte = Soporte::find($id);
        $soporte->update($datos);
        
        function isExpediente($soporte){
            $expediente = Expediente::find($soporte->id_expediente);

            if ($expediente) {
                $expediente->update(['fecha_revision' => Carbon::now()->format('Y-m-d')]);
            }
        }

        $estado = $request->input('estado');
        
        if ($estado == 'Completo') {
            isExpediente($soporte);

            // Aqui hagarro el correo que se pasó al input
            if ($request->input('interno') == 1) {
                $correo = new notificacionesFinal($message);
                $email = $request->input('correo_cliente');
                Mail::to($email)->send($correo);
            }

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
