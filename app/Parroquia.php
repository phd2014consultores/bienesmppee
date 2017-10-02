<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
   
protected $fillable = ['id','codigo','parroquia','municipio_id'];
    
    public function sede() 
  {
    return $this->HasMany('App\Sede');
  }

  public function municipio() 
  {
    return $this->belongsTo('App\Municipio');
  }
}
