<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    protected $fillable = ['id','url','bien_id'];

    public function bien() 
  {
    return $this->belongsTo('App\Bien');
  }
}
