<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ente extends Model
{
    protected $fillable = ['id','codigo_rgbp','codigo_sicegof','siglas','rif','razon_social','telefono','direccion_web','correo_electronico','fecha_gaceta','numero_gaceta','habilitado'];

    public function maxima_autoridad() 
	{
		return $this->hasMany('App\Maxima_Autoridad');
	}

	public function responsable_patrimonial() 
	{
		return $this->hasMany('App\Responsable_Patrimonial');
	}
	public function sede() 
	{
		return $this->hasMany('App\Sede');
	}
}
