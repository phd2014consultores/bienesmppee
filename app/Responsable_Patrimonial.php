<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable_Patrimonial extends Model
{
     protected $fillable = ['id','ci','nombre','apellido','telefono','cargo','correo_electronico','numero_gaceta','fecha_gaceta','numero_resolucion_decreto','fecha_resolucion_decreto','ente_id'];

    public function ente() 
	{
		return $this->belongsTo('App\Ente');
	}
}
