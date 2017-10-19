<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoUsoBien extends Model
{
    protected $fillable = ['id','estado_uso'];

    public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
