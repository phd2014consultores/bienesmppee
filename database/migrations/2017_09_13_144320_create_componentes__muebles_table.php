<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentesMueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes__muebles', function (Blueprint $table) {
            $table->mediumText('id')->primary;
            $table->mediumText('marca');
            $table->integer('mueble_id');
            $table->mediumText('modelo');
            $table->mediumText('serial');
            $table->mediumText('tipo');
            $table->mediumText('descripcion');
            $table->timestamps();

            $table->foreign('mueble_id')
            ->references('id')
            ->on('muebles');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('componentes__muebles');
    }
}
