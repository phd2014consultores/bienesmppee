<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFAPermutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a__permutas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('nombre_copermutante');
            $table->mediumText('nombre_beneficiario');
            $table->mediumText('numero_contrato');
            $table->integer('fecha_contrato');
            $table->mediumText('nombre_registro');
            $table->mediumText('tomo');
            $table->integer('folio');
            $table->integer('fecha_registro');
            $table->mediumText('nombre_licitacion');
            $table->mediumText('numero_licitacion');
            $table->integer('fecha_licitacion');
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
        Schema::drop('f_a__permutas');
    }
}
