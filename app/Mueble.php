<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mueble extends Model
{
    protected $fillable = ['id','serial','marca_id','modelo_id','color_id','especificaciones_tecnicas','otras_especificaciones_tecnicas','ano_fabricacion'];

    	public function marca() 
	{
		return $this->belongsTo('App\Marca');
	}

	    	public function modelo() 
	{
		return $this->belongsTo('App\Modelo');
	}
	    	public function color() 
	{
		return $this->belongsTo('App\Color');
	}

	public function componente_mueble() 
    {
		return $this->hasMany('App\Componentes_Mueble');
	}
	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
