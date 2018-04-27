<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('America/La_Paz');

class PersonaInstalada extends Model
{
    protected $table = 'persona_instalada';
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    protected $fillable = ['nombres', 'apellidos', 'correo'];

}
