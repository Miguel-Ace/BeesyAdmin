<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Soporte;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Mail\noti_expediente;
use App\Mail\notificacionesFinal;
use App\Models\Cliente;
use App\Models\Software;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $datos = Expediente::orderBy('id','desc')->get();
        $soportes = User::whereNotIn('id', [1, 2, 3, 8, 10, 11])->get();
        $programadores = User::whereIn('id', [1, 3, 10, 11])->get();
        $prioridades = ['Leve','Media','Alta'];
        $clientes = Cliente::orderBy('nombre')->get();
        $softwares = Software::orderBy('software')->get();
        return view('expediente.index', compact('datos','soportes','programadores','prioridades','clientes','softwares'));
    }

    public function store(Request $request){
        $request->validate([
            'id_user_pertenece' => 'required',
            'id_user_soluciona' => 'required',
            'tipo' => 'required',
            'archivo' => 'required',
            'prioridad' => 'required',
            'id_empresa' => 'required',
            'id_software' => 'required',
        ], [
            'id_user_pertenece.required' => 'Es necesario el "usuario"',
            'tipo.required' => 'Es necesario el "tipo"',
            'archivo.required' => 'Es necesario el "archivo o file"',
            'prioridad.required' => 'Es necesario la "prioridad"',
            'id_empresa.required' => 'Es necesario la "empresa"',
            'id_software.required' => 'Es necesario el "sistema"',
        ]);

        // if ($request->hasFile('archivo')) {
        //     $request['archivo'] = $request->file('archivo')->storeAs('archivos', $request->file('archivo')->getClientOriginalName(), 'public');
        // }

        // // Configuración para FTP
        // $config = [
        //     'host' => 'tu_ftp_host',
        //     'username' => 'tu_ftp_usuario',
        //     'password' => 'tu_ftp_contraseña',
        //     'port' => 21, // El puerto FTP
        //     'root' => '/directorio/en/el/servidor/ftp', // Cambia esto por el directorio deseado en el servidor FTP
        // ];

        // // Crea una instancia del adaptador FTP
        // $adapter = new Ftp($config);

        // // Crea una instancia de Flysystem
        // $filesystem = new Filesystem($adapter);

        // // Obtiene el archivo desde la solicitud
        // $archivo = $request->file('archivo');

        // // Obtiene el contenido del archivo
        // $contenido = file_get_contents($archivo->getRealPath());

        // // Almacena el archivo en el servidor FTP
        // $filesystem->put('nombre_del_archivo_en_ftp.txt', $contenido);

        // Filtrar el usuario asignado
        $usuario = User::find($request['id_user_pertenece']);

        $expediente = '';
        $num_expediente = 0;
        if ($request['tipo'] == 'Laboratorio') {
            $expediente = $usuario->name .'-'.($usuario->con_laboratorio + 1).'-'.'L';
            $num_expediente = $usuario->con_laboratorio + 1;
            $usuario->update(['con_laboratorio' => $usuario->con_laboratorio + 1]);
        }elseif($request['tipo'] == 'Especialización'){
            $expediente = $usuario->name.'-'.($usuario->con_especializacion + 1).'-'.'E';
            $num_expediente = $usuario->con_especializacion + 1;
            $usuario->update(['con_especializacion' => $usuario->con_especializacion + 1]);
        }else{
            $expediente = $usuario->name .'-'.($usuario->con_mejora + 1).'-'.'M';
            $num_expediente = $usuario->con_mejora + 1;
            $usuario->update(['con_mejora' => $usuario->con_mejora + 1]);
        }

        // Crear el expediente
        $ex = Expediente::create([
            'id_user_pertenece' => $request['id_user_pertenece'],
            'id_user_soluciona' => $request['id_user_soluciona'],
            'tipo' => $request['tipo'],
            'archivo' => $request['archivo'],
            'prioridad' => $request['prioridad'],
            'expediente' => $expediente,
            'estado' => 'Enviado',
            'fecha_entrada' => Carbon::now()->format('Y-m-d'),
            'num_expediente' => $num_expediente,
            'id_empresa' => $request['id_empresa'],
            'id_software' => $request['id_software'],
        ]);

        // Pasar info que se mostrara en el correo
        $message = ([
            'id' => $ex->id,
            'id_user_pertenece' => $request['id_user_pertenece'],
            'id_user_soluciona' => $request['id_user_soluciona'],
            'tipo' => $request['tipo'],
            'archivo' => $request['archivo'],
            'prioridad' => $request['prioridad'],
            'expediente' => $expediente,
            'estado' => 'Enviado',
            'fecha_entrada' => Carbon::now()->format('d-m-Y'),
            'expediente' => $expediente
        ]);

        // Enviar correo a la persona asignada a ese expediente
        $vista_correo = new noti_expediente($message);
        $email = User::where('id', $request['id_user_soluciona'])->get('email');
        Mail::to($email)->send($vista_correo);

        return redirect()->back();
    }

    public function edit($id){
        $datos = Expediente::find($id);
        $programadores = User::whereIn('id', [1, 3, 10, 11])->get();
        $estados = ['En proceso','En revisión','Completado'];
        $prioridades = ['Leve','Media','Alta'];
        $clientes = Cliente::orderBy('nombre')->get();
        $softwares = Software::orderBy('software')->get();
        return view('expediente.edit', compact('datos','programadores','estados','prioridades','clientes','softwares'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_user_soluciona' => 'required',
            'prioridad' => 'required',
            'estado' => 'required',
            'fecha_programada' => 'required',
            'id_empresa' => 'required',
            'id_software' => 'required',
        ], [
            'id_user_soluciona.required' => 'Es necesario el "usuario"',
            'prioridad.required' => 'Es necesario la "prioridad"',
            'estado.required' => 'Es necesario el "estado"',
            'fecha_programada.required' => 'Es necesario la "fecha programada"',
            'id_empresa.required' => 'Es necesario la "empresa"',
            'id_software.required' => 'Es necesario el "sistema"',
        ]);

        $expediente = Expediente::find($id);
        $empresa = Cliente::find($request['id_empresa']);
        $software = Software::find($request['id_software']);

        function update_campos($request) {
            return [
                    'id_user_soluciona' => $request['id_user_soluciona'],
                    'prioridad' => $request['prioridad'],
                    'estado' => $request['estado'],
                    'fecha_programada' => $request['fecha_programada'],
                    'fecha_salida' => $request['estado'] == 'Completado' ? Carbon::now()->format('Y-m-d') : null,
                ];    
        }

        if ($request['estado'] === 'Completado') {
            $expediente->update(update_campos($request));

            // Crear soporte
            $cantidad = Soporte::all()->last()->ticker;

            Soporte::create([
                'ticker' => $cantidad + 1,
                'empresa' => $empresa->nombre,
                'colaborador' => $expediente->usuarios->name,
                'problema' => 'Revisión de lab '.$expediente->num_expediente,
                'fechaCreacionTicke' => Carbon::now(),
                'id_cliente' => $empresa->contacto,
                'user_cliente' => $empresa->contacto,
                'id_software' => $software->software,
                'prioridad' => $request['prioridad'],
                'origen_asistencia' => $expediente->tipo,
                'id_expediente' => $expediente->id,
                'numLaboral' => $cantidad + 1,
                'estado' => 'Asignado',
                'correo_cliente' => $empresa->correo,
            ]);
        }else{
            $expediente->update(update_campos($request));
        }

        return redirect()->back();
    }
}
