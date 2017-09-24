<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
 	protected $fillable = ['id','cobertura'];

 	public function datos_seguro() 
    {
		return $this->hasMany('App\Datos_Seguro');
	}

}
