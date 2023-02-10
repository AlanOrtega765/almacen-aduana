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
     */
    public function up()
    {
        Schema::create('trazabilidades', function (Blueprint $table) {
            $table->foreignId('id_almacen_fk')->references('id_almacen')->on('almacenes');
            $table->unsignedBigInteger('id_mercancia_fk');
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
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
