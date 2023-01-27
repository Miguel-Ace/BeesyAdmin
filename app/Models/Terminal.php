<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','id_licencia','serial','nombreEquipo','ultimoAcceso','estado'];

    function clientes(){
        return $this->belongsTo(Cliente::class, 'id_licencia');
    }
}
