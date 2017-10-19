<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFACompraAbiertoCerradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a__compra__abierto__cerrados', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('numero_concurso');
            $table->mediumText('nombre_concurso');
            $table->integer('fecha_concurso');
            $table->mediumText('numero_contrato');
            $table->integer('fecha_contrato');
            $table->mediumText('numero_nota_entrega');
            $table->integer('fecha_nota_entrega');
            $table->mediumText('numero_factura');
            $table->integer('fecha_factura');
            $table->integer('forma_adquisicion_id');
            $table->timestamps();
            
                $table->foreign('forma_adquisicion_id')
                  ->references('id')
                  ->on('forma_adquisicions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('f_a__compra__abierto__cerrados');
    }
}
