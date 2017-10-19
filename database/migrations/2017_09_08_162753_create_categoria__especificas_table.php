<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaEspecificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_especificas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('codigo');
            $table->mediumText('nombre');
            $table->integer('subcategoria_id');
            $table->timestamps();

                $table->foreign('subcategoria_id')
                      ->references('id')
                      ->on('subcategorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categoria_especificas');
    }
}
