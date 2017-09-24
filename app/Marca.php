<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mueble;
use App\Modelo;

class Marca extends Model
{
    protected $fillable = ['id','denominacion_comercial','nombre_fabricante'];

    public function mueble() 
    {
		return $this->hasMany('App\Mueble');
	}

	public function modelo() 
    {
		return $this->hasMany('App\Modelo');
	}
}
