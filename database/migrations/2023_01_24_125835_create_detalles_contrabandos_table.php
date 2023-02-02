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
        Schema::create('detalles_contrabandos', function (Blueprint $table) {
            $table->foreignId('n_rol_contrab')->references('n_rol')->on('contrabandos');

            $table->unsignedBigInteger('n_rol_merc');
            $table->foreign('n_rol_merc')->references('n_rol')->on('mercancias')->nullable();
            $table->unsignedBigInteger('id_vehiculo_fk');
            $table->foreign('id_vehiculo_fk')->references('id_vehiculo')->on('datos_vehiculos')->nullable();


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
        Schema::dropIfExists('detalles_contrabandos');
    }
};
