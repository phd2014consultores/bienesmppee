<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBien extends Model
{
    protected $fillable = ['nombre'];
    
    public function bien() 
    {
		return $this->hasMany('App\Bien');
	}

}
