<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'ticker',
        'colaborador',
        'fechaCreacionTicke',
        'fechaInicioAsistencia',
        'fechaFinalAsistencia',
        'id_cliente',
        'id_software',
        'problema',
        'solucion',
        'observaciones',
        'numLaboral',
        'prioridad',
        'estado',
        'correo_cliente',
        'archivo',
        'id_expediente',
        'empresa',
        'origen_asistencia',
        'interno',
        'fecha_prevista_cumplimiento',
        'user_cliente',
        'imagen',
    ];

    // function clientes(){
    //     return $this->belongsTo(Cliente::class, 'id_cliente');
    // }

    // function softwares(){
    //     return $this->belongsTo(Software::class, 'id_software');
    // }
}
