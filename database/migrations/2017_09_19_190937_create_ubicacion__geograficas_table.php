<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionGeograficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion__geograficas', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('ubicacion');
            $table->mediumText('pais');
            $table->mediumText('localizacion');
            $table->mediumText('parroquia');
            $table->mediumText('calle_avenida');
            $table->mediumText('urbanizacion');
            $table->mediumText('casa_edificio');
            $table->mediumText('posee_sede');
            $table->mediumText('sede');
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
        Schema::dropIfExists('ubicacion__geograficas');
    }
}
