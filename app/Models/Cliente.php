<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    // protected $table = 'clientes';
    protected $fillable = ['id','cedula','nombre','contacto','correo','telefono','pais'];
}
