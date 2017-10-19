<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('codigo');
            $table->mediumText('nombre');
            $table->integer('categoria_id');
            $table->timestamps();

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subcategorias');
    }
}
