<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FA_Permuta extends Model
{
     protected $fillable = ['id','nombre_copermutante','nombre_beneficiario','nombre_licitacion','numero_licitacion','fecha_licitacion','numero_contrato','fecha_contrato','nombre_registro','tomo','folio','fecha_registro','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
