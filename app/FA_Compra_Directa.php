<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FA_Compra_Directa extends Model
{
     protected $fillable = ['id','proveedor','numero_orden_compra','fecha_orden_compra','numero_nota_entrega','fecha_nota_entrega','numero_factura','fecha_factura','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}

}
