<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FA_Adju_Conf_Expr;
use App\FA_Compra_Abierto_Cerrado;
use App\FA_Compra_Directa;
use App\FA_Dacion_Pago;
use App\FA_Donacion;
use App\FA_Permuta;
use App\FA_Transferencia;

class Forma_Adquisicion extends Model
{
    protected $fillable = ['id','forma_adquisicion'];

        public function fa_adju_conf_expr() 
    {
		return $this->hasMany('App\FA_Adju_Conf_Expr');
	}

	    public function fa_compra_abierta_cerrado() 
    {
		return $this->hasMany('App\FA_Compra_Abierto_Cerrado');
	}

		public function fa_compra_directa() 
    {
		return $this->hasMany('App\FA_Compra_Directa');
	}

		public function fa_dacion_pago() 
    {
		return $this->hasMany('App\FA_Dacion_Pago');
	}
		public function fa_donacion() 
    {
		return $this->hasMany('App\FA_Donacion');
	}

		public function fa_permuta() 
    {
		return $this->hasMany('App\FA_Permuta');
	}

		public function fa_transferencia() 
    {
		return $this->hasMany('App\FA_Transferencia');
	}
	public function bien() 
    {
		return $this->hasMany('App\Bien');
	}
}
