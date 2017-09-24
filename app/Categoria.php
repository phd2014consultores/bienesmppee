<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategoria;

class Categoria extends Model

{   protected $primaryKey = 'id'; 
	protected $fillable = ['id','categoria','codigo'];
    
    public function subcategoria() 
    {
		return $this->hasMany('App\Subcategoria');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
