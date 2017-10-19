<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('oficina_registro_notaria');
            $table->mediumText('referencia_registro');
            $table->integer('numero_registro');
            $table->integer('tomo');
            $table->integer('folio');
            $table->mediumText('protocolo');
            $table->integer('fecha_registro');
            $table->mediumText('nombre_propietario_anterior');
            $table->decimal('area_construccion');
            $table->integer('unidad_medida_area_construccion');
            $table->decimal('area_terreno');
            $table->integer('unidad_medida_area_terreno');
            $table->mediumText('dependencias_integran');
            $table->mediumText('otras_especificaciones');
            $table->timestamps();

            $table->foreign('unidad_medida_area_construccion')
            ->references('id')
            ->on('unidad_medidas');

            $table->foreign('unidad_medida_area_terreno')
            ->references('id')
            ->on('unidad_medidas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inmuebles');
    }
}



