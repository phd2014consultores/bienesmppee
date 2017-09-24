<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compañia_Aseguradora extends Model
{
 
 	protected $fillable = ['id','nombre'];

 	public function datos_seguro() 
    {
		return $this->hasMany('App\Datos_Seguro');
	}

}
