<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FA_Transferencia extends Model
{
     protected $fillable = ['id','nombre_quien_transfiere','nombre_beneficiario','numero_autorizacion','fecha_autorizacion','nombre_registro','tomo','folio','fecha_registro','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}

