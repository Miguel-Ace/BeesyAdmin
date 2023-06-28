<?php

namespace App\Exports;

use App\Models\Cliente;
use App\Models\Licencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class LicenciaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Licencia::all();
    // }

    public function view(): View
    {
        $datos = Licencia::all();
        return View('licenciaExport', compact('datos'));
    }
}
