<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Bien extends Model
{
    protected $fillable = ['tipo_bien'];
    
    public function bien() 
    {
		return $this->hasMany('App\Bien');
	}

}
