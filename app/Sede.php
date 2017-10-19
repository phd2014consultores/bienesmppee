<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = ['id','codigo','tipo_id','especificacion_tipo_sede','descripcion','localizacion','codigo_pais','especifique_otro_pais','parroquia_id','ciudad_id','nombre_otra_ciudad','urbanizacion','calle_avenida','casa_edificio','piso','ente_id'];

    public function ente()
    {
        return $this->belongsTo('App\Ente');
    }

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
    public function parroquia()
    {
        return $this->belongsTo('App\Parroquia');
    }
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
    public function tipo_sede()
    {
        return $this->belongsTo('App\Tipo_Sede');
    }


}
