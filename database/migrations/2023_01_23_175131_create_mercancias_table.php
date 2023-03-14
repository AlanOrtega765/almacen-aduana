<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * Tabla en donde se especifican cada una de las mercancias existentes en el almacén
     */
    public function up()
    {
        Schema::create('mercancias', function (Blueprint $table) {
            $table->id('id_mercancia');                             // identificador mercancias
            $table->text('nombre_merc');                            //Nombre de la mercancias(Descripcion)
            $table->integer('peso')->nullable();                    //Peso del Bulto total de mercancias
            $table->integer('drs_n_item')->nullable();              //
            $table->string('unidad_medida', 10)->nullable();        // Unidad de Medida de las mercancias opcional
            $table->integer('cantidad_bulto')->nullable();          //Cantidad de Bultos
            $table->integer('valor_mercancia')->nullable();         //Valor total de la mercancia en US
            $table->unsignedBigInteger('id_almacen_fk')->nullable();
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacenes');
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
        Schema::dropIfExists('mercancias');
    }
};
