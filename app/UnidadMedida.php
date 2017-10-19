<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $fillable = ['id','unidad','simbolo','tipo'];

    public function inmueble() 
    {
		return $this->hasMany('App\Inmueble');
	}
}
