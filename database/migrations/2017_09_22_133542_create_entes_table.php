<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('rif_organismo');
            $table->mediumText('codigo_rgbp');
            $table->integer('fecha_remision_inventario');
            $table->mediumText('codigo_sicegof');
            $table->mediumText('siglas');
            $table->mediumText('rif');
            $table->mediumText('razon_social');
            $table->mediumText('telefono');
            $table->mediumText('direccion_web');
            $table->mediumText('correo_electronico');
            $table->integer('fecha_gaceta');
            $table->mediumText('numero_gaceta');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entes');
    }
}
