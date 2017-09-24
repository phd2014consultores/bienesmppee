<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Bien extends Model
{
        protected $fillable = ['id','estado_bien'];

        public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
