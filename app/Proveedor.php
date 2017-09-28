<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['id','descripcion','tipo_proveedor','rif','otra_descripcion'];

    public function fa_compra_directa() 
    {
    return $this->hasMany('App\FA_Compra_Directa');
  }
}
