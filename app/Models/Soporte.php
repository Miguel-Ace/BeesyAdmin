<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    use HasFactory;

    function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    function softwares(){
        return $this->belongsTo(Software::class, 'id_software');
    }
}
