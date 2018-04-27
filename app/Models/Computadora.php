<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
date_default_timezone_set('America/La_Paz');

class Computadora extends Model
{
    protected $table = 'computadora';
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    protected $fillable = ['marca', 'ram', 'procesador',
                           'so_a_instalar', 'so_actual', 'persona_instalada_id',
                         'se_puede_instalar', 'tipo', 'detalles'];
    public function computers_installed(){
    	return $this->belongsToMany('App\Models\Usuario', 'usuario_registra_computadora', 'computadora_id', 'usuario_id')
    			->withPivot('id', 'fecha_creacion', 'fecha_actualizacion');
    }
    // accesors
    // public function getFullNameAttribute(){
    //   return ucfirst($this->nombres) . ' ' . ucfirst($this->apellidos);
    // }
}
