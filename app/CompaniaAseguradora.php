<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaniaAseguradora extends Model
{
 
 	protected $fillable = ['id','nombre'];

 	public function datos_seguro() 
    {
		return $this->hasMany('App\Datos_Seguro');
	}

}
