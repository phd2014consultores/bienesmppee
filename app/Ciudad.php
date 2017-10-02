<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
     protected $fillable = ['id','codigo','ciudad','municipio_id'];

    public function sede() 
  {
    return $this->HasMany('App\Sede');
  }

  public function pais() 
  {
    return $this->belongsTo('App\Pais');
  }
}
