<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Sede extends Model
{
    protected $fillable = ['id','tipo'];

    public function sede() 
  {
    return $this->HasMany('App\Sede');
  }
}
