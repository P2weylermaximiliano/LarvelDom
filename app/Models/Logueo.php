<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logueo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'nombre',
        'navegador',
        'accion',
        'fecha y hora'
    ];
}
