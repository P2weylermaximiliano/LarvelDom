<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fechaNacimiento',
        'grupo',
        'año'
    ];

    public function assists(){
        return $this->hasMany(Assist::class);
    }
}
