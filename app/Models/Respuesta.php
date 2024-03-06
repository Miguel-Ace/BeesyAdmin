<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_pregunta',
        'num_respuesta',
        'cedula_cliente',
        'cliente',
        'pais',
        'usuario',
        'fecha_hora',
        'num_intento',
        'notas'
    ];

    function preguntas(){
        return $this->belongsTo(Pregunta::class,  'id_pregunta');
    }
}
