<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Categoria_Especifica;


class Subcategoria extends Model
{
     protected $fillable = ['id','subcategoria','categoria_id','codigo'];

	public function categoria() 
	{
		return $this->belongsTo('App\Categoria');
	}

	    public function categoria_especifica() 
    {
		return $this->hasMany('App\Categoria_Especifica');
	}
	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
