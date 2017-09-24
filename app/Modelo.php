<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mueble;

class Modelo extends Model
{
            protected $fillable = ['id','denominacion_fabricante','marca_id'];

    public function mueble() 
    {
		return $this->hasMany('App\Mueble');
	}

	public function marca() 
	{
		return $this->belongsTo('App\Marca');
	}



}
