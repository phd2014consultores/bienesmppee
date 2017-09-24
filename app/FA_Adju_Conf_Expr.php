<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Forma_Adquisicion;

class FA_Adju_Conf_Expr extends Model
{
     protected $fillable = ['id','propietario','beneficiario','autoridad','numero_sentencia','fecha_sentencia','nombre_registro','tomo','folio','fecha_registro','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
