<?php

namespace App\Http\Controllers;

use App\Exports\LicenciaExport;
use Illuminate\Http\Request;
use App\Exports\SoporteExport;
use Maatwebsite\Excel\Facades\Excel;

class LicenciaExportController extends Controller
{
    public function exportarLicencia()
    {
        return Excel::download(new LicenciaExport, 'Licencias.csv');
    }
}
