<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FA_Dacion_Pago extends Model
{
     protected $fillable = ['id','nombre_cedente','nombre_beneficiario','numero_finiquito','fecha_finiquito','nombre_registro','tomo','folio','fecha_registro','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}

}
