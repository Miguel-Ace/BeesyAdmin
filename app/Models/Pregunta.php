<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'pregunta',
        'fecha_creacion',
        'intentos',
        'activo'
    ];
}
