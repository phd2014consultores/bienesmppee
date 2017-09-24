<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componentes_Mueble extends Model
{
    protected $fillable = ['id','marca','modelo','serial','tipo','descripcion','mueble_id'];

    public function mueble() 
	{
		return $this->belongsTo('App\Mueble');
	}
}
