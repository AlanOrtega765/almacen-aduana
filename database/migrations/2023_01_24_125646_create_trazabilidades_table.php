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
     * Tabla creada para almacenar los atributos relacionados con la trazabilidad de las mercancias
     * Del movimiento de una mercancia de un almacen, a otro
     */
    public function up()
    {
        Schema::create('trazabilidades', function (Blueprint $table) {
            $table->foreignId('id_almacen_fk')->references('id_almacen')->on('almacenes');          //Almacen donde se encuentra
            $table->unsignedBigInteger('id_mercancia_fk');
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias');       //Mercancia
            $table->date('fecha_inicio');                                                           //Fecha inicial del desplazamiento de la mercancia (salida almacen)
            $table->date('fecha_termino');                                                          //Fecha de llegada de la mercancia al almacen
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
        Schema::dropIfExists('trazabilidades');
    }
};
