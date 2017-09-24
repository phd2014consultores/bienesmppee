<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->mediumText('id')->primary();
            $table->mediumText('descripcion');
            $table->mediumText('tipo_proveedor');
            $table->mediumText('rif');
            $table->mediumText('otra_descripcion');
            $table->integer('fa_compra_directa');
            $table->timestamps();

            $table->foreign('fa_compra_directa')
            ->references('id')
            ->on('f_a__compra__directas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proveedors');
    }
}
