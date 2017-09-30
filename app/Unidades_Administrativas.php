<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidades_Administrativas extends Model
{
    protected $fillable = ['id','codigo','descripcion','codigo_categoria','denominacion','codigo_unidad_adscrita'];
    
}
