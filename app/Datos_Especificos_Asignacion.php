<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_Especificos_Asignacion extends Model
{
   protected $fillable = ['id','unidad_administrativa','responsable_administrativo','responsable_uso_directo','ubicacion_administrativo_id','ubicacion_geografica_id'];

  public function bien() 
  {
    return $this->hasmany('App\Bien');
  }

  public function ubicacion_geografica() 
  {
    return $this->belongsTo('App\Ubicacion_Geografica');
  }

public function ubicacion_administrativo() 
  {
    return $this->belongsTo('App\Ubicacion_Administrativo');
  }



}
