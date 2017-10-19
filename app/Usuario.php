<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = "usuarios";
    private $errors;

    protected $fillable = ['cedula','piso', 'ala', 'telefono_extension', 'celular', 'condicion_id',  'usa_estacionamiento','vehiculo_id','institucion_id', 'des_otra_condicion', 'sexo', 'ultima_actualizacion', 'nombre', 'apellido', 'dependencia', 'organismo', 'tipo_personal'];


    private $rules = array(
        'piso'   => 'required|string',
        'ala'    => 'required|string',
        'telefono_extension'    => 'required|digits_between:4,10|numeric',
        'celular' => 'required|digits_between:10,13|numeric',
        'condicion_id' => 'required',
        'institucion_id' => 'required',
        'sexo' => 'required|string|max:20',
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'dependencia' => 'required|string|max:100',
        'organismo' => 'required|string|max:100',
        'tipo_personal' => 'required|string|max:100',
    );


    public function validate($data){

        $v = Validator::make($data, $this->rules);

        if ($v->fails()){
            $this->errors = $v->errors()->toArray();
            return false;
        }

        return true;
    }

    public function errors(){
        return $this->errors;
    }


    public function condicion()
    {
        return $this->hasOne('App\Condicion', 'id');
    }

    public function institucion()
    {
        return $this->hasOne('App\Institucion', 'id');
    }

    public function vehiculo()
    {
        return $this->hasMany('App\Vehiculo', 'id');
    }
}
