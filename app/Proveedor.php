<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['id','descripcion','tipo_proveedor','rif','otra_descripcion','fa_compra_directa'];
}
