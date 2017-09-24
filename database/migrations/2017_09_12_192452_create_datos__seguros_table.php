<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos__seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('registro_seguro');
            $table->integer('compania_id');
            $table->mediumText('numero_poliza');
            $table->decimal('monto_asegurado');
            $table->integer('fecha_inicio_poliza');
            $table->integer('fecha_fin_poliza');
            $table->integer('cobertura_id');
            $table->string('posee_responsabilidad_civil');
            $table->mediumText('otro_nombre_compania')->nullable();
            $table->mediumText('descripcion_cobertura');
            $table->timestamps();
            
            $table->foreign('compania_id')
            ->references('id')
            ->on('compañia__aseguradoras');

            $table->foreign('cobertura_id')
            ->references('id')
            ->on('coberturas');


        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('datos__seguros');
    }
}
