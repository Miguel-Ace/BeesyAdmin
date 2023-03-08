<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCliente extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','cliente'];
}
