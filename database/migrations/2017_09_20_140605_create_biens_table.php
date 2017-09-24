<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->mediumText('id')->primary();
            $table->mediumText('valor_adquisicion');
            $table->integer('fecha_adquisicion');
            $table->integer('fecha_ingreso_organo');
            $table->mediumText('descripcion_estado');
            $table->integer('tipo_bien_id');
            $table->integer('inmueble_id')->nullable();
            $table->integer('mueble_id')->nullable();
            $table->integer('forma_adquisicion_id');
            $table->integer('fa_adju_conf_expr_id')->nullable();
            $table->integer('fa_compra_abierto_cerrado_id')->nullable();
            $table->integer('fa_compra_directa_id')->nullable();
            $table->integer('fa_dacion_pago_id')->nullable();
            $table->integer('fa_donacion_id')->nullable();
            $table->integer('fa_permuta_id')->nullable();
            $table->integer('fa_transfecia_id')->nullable();
            $table->integer('categoria_id');
            $table->integer('responsable_id')->nullable();
            $table->integer('subcategoria_id');
            $table->integer('categoria_especifica_id');
            $table->integer('datos_seguro_id');
            $table->integer('moneda_id');
            $table->mediumText('otra_moneda');
            $table->integer('estado_bien_id');
            $table->integer('estado_uso_id');
            $table->integer('uso_actual_id');
            $table->boolean('habilitado');
            $table->timestamps();

            $table->foreign('tipo_bien_id')
            ->references('id')
            ->on('tipo__biens');

            $table->foreign('inmueble_id')
            ->references('id')
            ->on('inmuebles');

            $table->foreign('mueble_id')
            ->references('id')
            ->on('muebles');

            $table->foreign('forma_adquisicion_id')
            ->references('id')
            ->on('forma__adquisicions');

            $table->foreign('fa_adju_conf_expr_id')
            ->references('id')
            ->on('f_a__adju__conf__exprs');

            $table->foreign('fa_compra_abierto_cerrado_id')
            ->references('id')
            ->on('f_a__compra__abierto__cerrados');

            $table->foreign('fa_compra_directa_id')
            ->references('id')
            ->on('f_a__compra__directas');

            $table->foreign('fa_dacion_pago_id')
            ->references('id')
            ->on('f_a__dacion__pagos');

            $table->foreign('fa_donacion_id')
            ->references('id')
            ->on('f_a__donacions');

            $table->foreign('fa_permuta_id')
            ->references('id')
            ->on('f_a__permutas');

            $table->foreign('fa_transfecia_id')
            ->references('id')
            ->on('f_a__transferencias');

            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias');

            $table->foreign('subcategoria_id')
            ->references('id')
            ->on('subcategorias');

            $table->foreign('categoria_especifica_id')
            ->references('id')
            ->on('categoria__especificas');

            $table->foreign('datos_seguro_id')
            ->references('id')
            ->on('datos__seguros');

            $table->foreign('moneda_id')
            ->references('id')
            ->on('monedas');

            $table->foreign('estado_bien_id')
            ->references('id')
            ->on('estado__biens');

            $table->foreign('estado_uso_id')
            ->references('id')
            ->on('estado__uso__biens');

            $table->foreign('uso_actual_id')
            ->references('id')
            ->on('uso__actual__biens');

            $table->foreign('responsable_id')
            ->references('id')
            ->on('datos__especificos__asignacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biens');
    }
}
