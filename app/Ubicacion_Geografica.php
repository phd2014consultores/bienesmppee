<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion_Geografica extends Model
{
    protected $fillable = ['id','ubicacion','pais','localizacion','parroquia','calle_avenida','urbanizacion','casa_edificio','posee_sede','sede'];
    
  public function datos_especificos_asignacion() 
  {
    return $this->hasmany('App\Datos_Especificos_Asignacion');
  }

}
