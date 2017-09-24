<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion_Administrativa extends Model
{
        protected $fillable = ['id','ubicacion'];

  public function datos_especificos_asignacion() 
  {
    return $this->hasmany('App\Datos_Especificos_Asignacion');
  }
  
}
