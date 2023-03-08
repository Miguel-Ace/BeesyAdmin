<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SoporteExport;
use Maatwebsite\Excel\Facades\Excel;

class SoporteExportController extends Controller
{
    public function exportarSoporte()
    {
        return Excel::download(new SoporteExport, 'soporte.csv');
    }
}
