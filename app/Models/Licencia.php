<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','id_cliente','id_software','cantidad','fechaInicio','fechaFinal'];

    function clientes(){
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    function softwares(){
        return $this->belongsTo(Software::class, 'id_software');
    }
}
