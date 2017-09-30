<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('codigo');
            $table->mediumText('tipo_sede');
            $table->mediumText('especificacion_tipo_sede');
            $table->mediumText('descripcion');
            $table->mediumText('localizacion');
            $table->mediumText('codigo_pais');
            $table->mediumText('especifique_otro_pais')->nullable();
            $table->mediumText('codigo_parroquia_ente');
            $table->mediumText('codigo_ciudad_ente');
            $table->mediumText('nombre_otra_ciudad')->nullable();
            $table->mediumText('urbanizacion');
            $table->mediumText('calle_avenida');
            $table->mediumText('casa_edificio');
            $table->mediumText('piso');
            $table->integer('ente_id');
            $table->timestamps();

            $table->foreign('ente_id')
            ->references('id')
            ->on('entes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sedes');
    }
}
