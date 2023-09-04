<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Soporte;
use App\Models\Licencia;
use App\Models\Proyecto;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $ultimoMesLicencia = Licencia::whereBetween('fechaInicio', [Carbon::now()->subMonth()->toDateTimeString(), Carbon::now()])->get(['cantidad']);

        $licencias = Licencia::all();
        $clientes = Cliente::all();
        $soportes = Soporte::all();
        $proyectos = Proyecto::all();

        // Licencia
            foreach ($licencias as $licencia) {
                foreach($clientes as $cliente){
                    
                    if($licencia->id_cliente == $cliente->id){
                        $data1['label'][] = $cliente->nombre;
                    }
                }
                $data1['data'][] = $licencia->cantidad;
            }
            if (empty($data1)) {
                $data1 = 0;
            }else {
            }
            $data['data1'] = json_encode($data1);
            
        // Soporte
            foreach ($soportes as $soporte) {
                foreach($clientes as $cliente){
                    
                    if($soporte->id_cliente == $cliente->id){
                        $data2['label'][] = $cliente->nombre;
                        // $data2['label'][] = $cliente->nombre;
                    }
                }
                $data2['data'][] = $soporte->numLaboral;
                // $data2['data'][] = $soporte->numLaboral;
            }
            if (empty($data2)) {
                $data2 = 0;
            }else {
            }
            $data['data2'] = json_encode($data2);

        // Proyecto
            foreach ($proyectos as $proyecto) {
                foreach($clientes as $cliente){
                    
                    if($proyecto->id_cliente == $cliente->id){
                        $data3['label'][] = $cliente->nombre;
                    }
                }
                $data3['data'][] = $proyecto->nombre;
            }
            if (empty($data3)) {
                $data3 = 0;
            }else {
            }
            $data['data3'] = json_encode($data3);


            // ================
        // Licencia
            foreach ($licencias as $licencia) {
                foreach($clientes as $cliente){
                    
                    if($licencia->id_cliente == $cliente->id){
                        $data4['label'][] = $cliente->nombre;
                    }
                }
                foreach($ultimoMesLicencia as $licenci){
                    $data4['data'][] = $licenci->cantidad;
                }
            }
            if (empty($data4)) {
                $data4 = 0;
            }else {
            }
            $data['data4'] = json_encode($data4);
            
        // Soporte
            foreach ($soportes as $soporte) {
                foreach($clientes as $cliente){
                    
                    if($soporte->id_cliente == $cliente->id){
                        $data5['label'][] = $cliente->nombre;
                    }
                }
                $data5['data'][] = $soporte->numLaboral;
            }
            if (empty($data5)) {
                $data5 = 0;
            }else {
            }
            $data['data5'] = json_encode($data5);

        // Proyecto
            foreach ($proyectos as $proyecto) {
                foreach($clientes as $cliente){
                    
                    if($proyecto->id_cliente == $cliente->id){
                        $data6['label'][] = $cliente->nombre;
                    }
                }
                $data6['data'][] = $proyecto->nombre;
            }
            if (empty($data6)) {
                $data6 = 0;
            }else {
            }
            $data['data6'] = json_encode($data6);
            
        $totalLicencias = Licencia::count();
        $totalClientes = Cliente::count();
        $totalsoportes = Soporte::count();
        $totalproyectos = Proyecto::count();
        $ultimoMesLicencia = Licencia::whereBetween('fechaInicio', [Carbon::now()->subMonth()->toDateTimeString(), Carbon::now()])->get(['cantidad']);
        // $ultimoMesSoporte = Soporte::whereBetween('fechaHoraInicio', [Carbon::now()->subMonth()->toDateTimeString(), Carbon::now()])->get(['cantidad']);
        // $ultimoMesProyecto = Proyecto::whereBetween('fecha_inicio', [Carbon::now()->subMonth()->toDateTimeString(), Carbon::now()])->get(['cantidad']);

        $licencias = Licencia::all();
        $clientes = Cliente::all();
        $soportes = Soporte::all();
        $proyectos = Proyecto::all();
        $empresas = Soporte::pluck('empresa');
        
        $arrayClientes = [];

        foreach ($clientes as $cliente) {
            array_push($arrayClientes, [
                'cantidad' => 1,
                'empresa' => $cliente->nombre,
                'nombre' => $cliente->contacto,
            ]);
        }

        for ($i=0; $i < count($arrayClientes); $i++) {
            // echo $arrayClientes[$i]['empresa'];
            if ($soporte['empresa'] == $soportes[$i]['empresa']) {
                echo $soporte['cantidad']++;
            }
        }
        
        $arrSoportes = DB::table('soportes')->select('id', 'fechaCreacionTicke','id_cliente','empresa')->get();

        return view('dashboard.index', $data ,compact('arrSoportes','empresas','licencias','clientes','soportes','proyectos','ultimoMesLicencia','totalLicencias','totalClientes','totalsoportes','totalproyectos','arrayClientes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
