<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
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
    public function index(){
        // sacando total de licencias
        $total_licencia = Licencia::all()->count();
        // sacando total de clientes
        $total_cliente = Cliente::all()->count();
        // sacando total de soportes
        $total_soporte = Soporte::all()->count();
        // sacando total de proyecto
        $total_proyecto = Proyecto::all()->count();

        // Todos los de soporte
        $soportes = User::whereNotIn('id', [1, 2, 3, 8, 10, 11])->pluck('name');
        
        $empresa_clientes = Cliente::all()->pluck('nombre');
        $contacto_clientes = Cliente::all()->pluck('contacto');

        return view('dashboard.index', compact('total_licencia','total_cliente','total_soporte','total_proyecto','soportes','empresa_clientes','contacto_clientes'));
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
