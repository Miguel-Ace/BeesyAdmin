<?php

namespace App\Exports;

use App\Models\Soporte;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SoporteExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Soporte::all();
    // }

    public function view(): View
    {
        return View('export', [
            'datos' => Soporte::all()
        ]);
    }
}
