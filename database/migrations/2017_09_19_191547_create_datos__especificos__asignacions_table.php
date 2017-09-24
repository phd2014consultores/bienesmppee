<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosEspecificosAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos__especificos__asignacions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('unidad_administrativa');
            $table->mediumText('responsable_administrativo');
            $table->mediumText('responsable_uso_directo');
            $table->integer('ubicacion_administrativo_id')->nullable();
            $table->integer('ubicacion_geografica_id')->nullable();
            $table->timestamps();

            $table->foreign('ubicacion_administrativo_id')
            ->references('id')
            ->on('ubicacion__administrativas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos__especificos__asignacions');
    }
}
