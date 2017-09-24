<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Forma_Adquisicion;

class FA_Compra_Abierto_Cerrado extends Model
{
        protected $fillable = ['id','numero_concurso','nombre_concurso','fecha_concurso','numero_contrato','fecha_contrato','numero_nota_entrega','fecha_nota_entrega','numero_factura','fecha_factura','forma_adquisicion_id'];

     	public function forma_adquisicion() 
	{
		return $this->belongsTo('App\Forma_Adquisicion');
	}

	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
