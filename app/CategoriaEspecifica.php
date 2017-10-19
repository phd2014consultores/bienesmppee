<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaEspecifica extends Model
{
    protected $fillable = ['id','nombre','subcategoria_id','codigo'];

    	public function subcategoria() 
	{
		return $this->belongsTo('App\Subcategoria');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
