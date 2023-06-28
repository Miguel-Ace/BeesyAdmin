<?php

namespace App\Http\Controllers;

use App\Models\Soporte;
use Illuminate\Http\Request;
use App\Exports\SoporteExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Response;

class SoporteExportController extends Controller
{
    public function vista(Request $request){
        $datos = Soporte::all();
        return view('export', compact('datos'));
    }

    public function exportarSoporte(Request $request)
    {
        return Excel::download(new SoporteExport, 'soporte.csv');
    }
}
