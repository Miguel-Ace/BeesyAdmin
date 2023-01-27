<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    function usuarios(){
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
