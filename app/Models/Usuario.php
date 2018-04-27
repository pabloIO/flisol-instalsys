<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
date_default_timezone_set('America/La_Paz');
class Usuario extends Model
{
    protected $table = 'usuario';
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    protected $fillable = ['nombres', 'apellidos', 'nombre_usuario'];
    public function computers_installed(){
    	return $this->belongsToMany('App\Models\Computadora', 'usuario_registra_computadora', 'usuario_id', 'computadora_id')
    			->withPivot('id', 'fecha_creacion', 'fecha_actualizacion');
    }
    // accesors
    public function getFullNameAttribute(){
      return ucfirst($this->nombres) . ' ' . ucfirst($this->apellidos);
    }
}
