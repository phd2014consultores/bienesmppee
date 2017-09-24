<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uso_Actual_Bien extends Model
{
   protected $fillable = ['id','uso_actual'];

   public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
