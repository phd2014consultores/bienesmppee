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
            $table->integer('tipo_id');
            $table->mediumText('especificacion_tipo_sede')->nullable();
            $table->mediumText('descripcion');
            $table->mediumText('localizacion');
            $table->integer('pais_id');
            $table->mediumText('especifique_otro_pais')->nullable();
            $table->integer('parroquia_id');
            $table->integer('ciudad_id');
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

            $table->foreign('pais_id')
            ->references('id')
            ->on('pais');

            $table->foreign('parroquia_id')
            ->references('id')
            ->on('parroquias');

            $table->foreign('ciudad_id')
            ->references('id')
            ->on('ciudads');

            $table->foreign('tipo_id')
            ->references('id')
            ->on('tipo__sedes');
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
