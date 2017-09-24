<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ente extends Model
{
    protected $fillable = ['id','rif_organismo','codigo_rgbp','fecha_remision_inventario','codigo_sicegof','siglas','rif','razon_social','telefono','direccion_web','correo_electronico','fecha_gaceta','numero_gaceta'];

    public function maxima_autoridad() 
	{
		return $this->hasMany('App\Maxima_Autoridad');
	}
}
