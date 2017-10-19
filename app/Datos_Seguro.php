<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_Seguro extends Model
{
    
	protected $fillable = ['id','registro_seguro','compania_id','numero_poliza','monto_asegurado','fecha_inicio_poliza','fecha_fin_poliza','cobertura_id','posee_responsabilidad_civil','otro_nombre_compania','descripcion_cobertura'];


	public function compañia_aseguradora() 
	{
		return $this->belongsTo('App\Compania_Aseguradora');
	}

	public function cobertura() 
	{
		return $this->belongsTo('App\Cobertura');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
