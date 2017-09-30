<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muebles', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('serial');
            $table->integer('marca_id');
            $table->integer('modelo_id');
            $table->integer('color_id');
            $table->integer('ano_fabricacion');
            $table->mediumText('especificaciones_tecnicas');
            $table->mediumText('otras_especificaciones_tecnicas');
            $table->timestamps();

            $table->foreign('marca_id')
            ->references('id')
            ->on('marcas');

            $table->foreign('modelo_id')
            ->references('id')
            ->on('modelos');

            $table->foreign('color_id')
            ->references('id')
            ->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('muebles');
    }
}
