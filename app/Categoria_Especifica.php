<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategoria;

class Categoria_Especifica extends Model
{
    protected $fillable = ['id','categoria_especifica','subcategoria_id','codigo'];

    	public function subcategoria() 
	{
		return $this->belongsTo('App\Subcategoria');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
