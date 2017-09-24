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
            $table->mediumText('id')->primary();
            $table->mediumText('denominacion_fabricante');
            $table->mediumText('marca_id');
            $table->mediumText('modelo');
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
