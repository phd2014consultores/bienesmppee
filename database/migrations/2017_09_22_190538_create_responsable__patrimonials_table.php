<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablePatrimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable__patrimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('ci');
            $table->mediumText('nombre');
            $table->mediumText('apellido');
            $table->mediumText('telefono');
            $table->mediumText('cargo');
            $table->mediumText('correo_electronico');
            $table->mediumText('numero_gaceta');
            $table->integer('fecha_gaceta');
            $table->mediumText('numero_resolucion_decreto');
            $table->integer('fecha_resolucion_decreto');
            $table->integer('ente_id');
            $table->boolean('habilitado');
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
        Schema::dropIfExists('responsable__patrimonials');
    }
}
