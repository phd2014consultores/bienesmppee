<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('denominacion_fabricante');
            $table->integer('marca_id');
            $table->mediumText('codigo');
            $table->mediumText('codigo_bien');
            $table->timestamps();

            $table->foreign('marca_id')
            ->references('id')
            ->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modelos');
    }
}
