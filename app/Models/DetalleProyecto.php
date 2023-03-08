<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProyecto extends Model
{
    use HasFactory;

    function proyectos(){
        return $this->belongsTo(Proyecto::class,  'id_proyecto');
    }

    function usuarios(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

    function estados(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    function etapas(){
        return $this->belongsTo(Etapa::class, 'id_etapa');
    }
}
