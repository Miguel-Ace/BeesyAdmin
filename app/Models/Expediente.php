<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_user_pertenece',
        'id_user_soluciona',
        'tipo',
        'expediente',
        'archivo',
        'prioridad',
        'estado',
        'fecha_entrada',
        'fecha_programada',
        'fecha_salida',
        'fecha_revision',
        'id_empresa',
        'id_software',
        'num_expediente',
    ];

    function usuarios(){
        return $this->belongsTo(User::class, 'id_user_pertenece');
    }

    function usuarios2(){
        return $this->belongsTo(User::class, 'id_user_soluciona');
    }

    function empresas(){
        return $this->belongsTo(Cliente::class, 'id_empresa');
    }

    function softwares(){
        return $this->belongsTo(Software::class, 'id_software');
    }
}
