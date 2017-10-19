<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = ['id','valor_adquisicion','fecha_adquisicion','fecha_ingreso_organo','descripcion_estado','tipo_bien_id','inmueble_id','mueble_id','forma_adquisicion_id','fa_adju_conf_expr_id','fa_compra_abierto_cerrado_id','fa_compra_directa_id','fa_dacion_pago_id','fa_donacion_id','fa_permuta_id','fa_transfecia_id','categoria_id','subcategoria_id','categoria_especifica_id','datos_seguro_id','moneda_id','otra_moneda','estado_bien_id','estado_uso_id','uso_actual_id','responsable_id','habilitado'];

    public function tipo_bien() 
  {
    return $this->belongsTo('App\TipoBien');
  }
  public function inmueble() 
  {
    return $this->belongsTo('App\Inmueble');
  }
  public function mueble() 
  {
    return $this->belongsTo('App\Mueble');
  }
  public function forma_adquisicon() 
  {
    return $this->belongsTo('App\FormaAdquisicion');
  }
  public function categoria() 
  {
    return $this->belongsTo('App\Categoria');
  }
  public function subcategoria() 
  {
    return $this->belongsTo('App\Subcategoria');
  }
  public function categoria_especifica() 
  {
    return $this->belongsTo('App\CategoriaEspecifica');
  }
  public function fa_adju_conf_expr() 
  {
    return $this->belongsTo('App\FA_Adju_Conf_Expr');
  }
  public function fa_compra_abierto_cerrado() 
  {
    return $this->belongsTo('App\FA_Compra_Abierto_Cerrado');
  }
  public function fa_compra_directa() 
  {
    return $this->belongsTo('App\FA_Compra_Directa');
  }

    public function fa_dacion_pago() 
  {
    return $this->belongsTo('App\FA_Dacion_Pago');
  }
    public function fa_donacion() 
  {
    return $this->belongsTo('App\FA_Donacion');
  }
    public function fa_permuta() 
  {
    return $this->belongsTo('App\FA_Permuta');
  }
    public function fa_transferencia() 
  {
    return $this->belongsTo('App\FA_Transferencia');
  }
    public function datos_seguro() 
  {
    return $this->belongsTo('App\Datos_Seguro');
  }
    public function moneda() 
  {
    return $this->belongsTo('App\Moneda');
  }
    public function estado_bien() 
  {
    return $this->belongsTo('App\EstadoBien');
  }
    public function estado_uso_bien() 
  {
    return $this->belongsTo('App\EstadoUsoBien');
  }
    public function uso_actual_bien() 
  {
    return $this->belongsTo('App\UsoActualBien');
  }
    public function responsable() 
  {
    return $this->belongsTo('App\Datos_Especificos_Asignacion');
  }
    public function fotos() 
  {
    return $this->hasMany('App\Fotos');
  }
}
