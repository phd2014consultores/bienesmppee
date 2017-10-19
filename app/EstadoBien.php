<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoBien extends Model
{
        protected $fillable = ['id','estado_bien'];

        public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
