<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFAAdjuConfExprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_a__adju__conf__exprs', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('propietario');
            $table->mediumText('beneficiario');
            $table->mediumText('autoridad');
            $table->mediumText('numero_sentencia');
            $table->integer('fecha_sentencia');
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
        Schema::drop('f_a__adju__conf__exprs');
    }
}
