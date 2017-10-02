<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['id','pais'];

    public function sede() 
  {
    return $this->HasMany('App\Sede');
  }

	public function estado() 
  {
    return $this->HasMany('App\Estado');
  }

}
