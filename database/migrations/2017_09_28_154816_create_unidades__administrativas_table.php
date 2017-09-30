<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesAdministrativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades__administrativas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('codigo');
            $table->mediumText('descripcion');
            $table->mediumText('codigo_categoria');
            $table->mediumText('denominacion')->nullable();
            $table->mediumText('codigo_unidad_adscrita');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades__administrativas');
    }
}
