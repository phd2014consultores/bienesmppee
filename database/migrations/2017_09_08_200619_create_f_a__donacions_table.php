<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFADonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a__donacions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('nombre_donante');
            $table->mediumText('nombre_beneficiario');
            $table->mediumText('numero_contrato');
            $table->integer('fecha_contrato');
            $table->mediumText('nombre_registro');
            $table->mediumText('tomo');
            $table->integer('folio');
            $table->integer('fecha_registro');
            $table->integer('forma_adquisicion_id');
            $table->timestamps();

            $table->foreign('forma_adquisicion_id')
                  ->references('id')
                  ->on('forma__adquisicions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('f_a__donacions');
    }
}
