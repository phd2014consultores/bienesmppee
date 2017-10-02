<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['id','codigo','municipio','estado_id'];

    public function estado() 
    {
		return $this->belongsTo('App\Estado');
	}
}
