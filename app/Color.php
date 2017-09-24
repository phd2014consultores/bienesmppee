<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mueble;

class Color extends Model
{
    protected $fillable = ['id','color'];

    public function mueble() 
    {
		return $this->hasMany('App\Mueble');
	}
}
