<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFACompraDirectasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a__compra__directas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('numero_orden_compra');
            $table->integer('fecha_orden_compra');
            $table->mediumText('numero_nota_entrega');
            $table->integer('fecha_nota_entrega');
            $table->mediumText('numero_factura');
            $table->integer('fecha_factura');
            $table->integer('forma_adquisicion_id');
            $table->mediumText('proveedor_id');
            $table->timestamps();

                $table->foreign('forma_adquisicion_id')
                  ->references('id')
                  ->on('forma_adquisicions');

                $table->foreign('proveedor_id')
                  ->references('id')
                  ->on('proveedors'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_a__compra__directas');
    }
}
