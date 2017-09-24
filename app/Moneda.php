<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $fillable = ['id','moneda'];
    public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
