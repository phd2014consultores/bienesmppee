<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['id','estado','codigo','pais_id'];

    public function pais() 
	{
		return $this->belongsTo('App\Pais');
	}

	public function municipio() 
    {
		return $this->hasMany('App\Municipio');
	}
}
