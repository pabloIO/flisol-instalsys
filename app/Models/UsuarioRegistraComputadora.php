<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set('America/La_Paz');

class UsuarioRegistraComputadora extends Model
{
  protected $table = 'usuario_registra_computadora';
  const CREATED_AT = 'creado_en';
  const UPDATED_AT = 'actualizado_en';
  protected $fillable = ['usuario_id', 'computadora_id'];
}
