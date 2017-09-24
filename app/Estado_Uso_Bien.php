<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Uso_Bien extends Model
{
    protected $fillable = ['id','estado_uso'];

    public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
