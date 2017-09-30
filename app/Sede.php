<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = ['id','codigo','tipo_sede','especificacion_tipo_sede','descripcion','localizacion','codigo_pais','especifique_otro_pais','codigo_parroquia_ente','codigo_ciudad_ente','nombre_otra_ciudad','urbanizacion','calle_avenida','casa_edificio','piso','ente_id'];

    public function ente() 
  {
    return $this->belongsTo('App\Ente');
  }
}
