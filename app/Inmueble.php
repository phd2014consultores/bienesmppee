<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    protected $fillable = ['id','oficina_registro_notaria','referencia_registro','numero_registro','tomo','folio','protocolo','fecha_registro','nombre_propietario_anterior','area_construccion','unidad_medida_area_construccion','area_terreno','unidad_medida_area_terreno','dependencias_integran','otras_especificaciones'];


    public function unidad_medida_area_construccion() 
	{
		return $this->belongsTo('App\Unidad_Medida');
	}

	    public function unidad_medida_area_terreno() 
	{
		return $this->belongsTo('App\Unidad_Medida');
	}
	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}


