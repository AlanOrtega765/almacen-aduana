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
     * Tabla creada para almacenar los atributos relacionados con el detalle de Suspencion de despacho
     * (con s final porque el nombre de la tabla debe ser escrito en plural)
     */
    public function up()
    {
        Schema::create('detalles_suspensiones_despachos', function (Blueprint $table) {
            $table->foreignId('n_documento')->references('n_documento')->on('suspensiones_despachos');
            $table->unsignedBigInteger('id_person_fk');
            $table->foreign('id_person_fk')->references('id_person')->on('personas');
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
            $table->unsignedBigInteger('id_almacen_fk');
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacenes');
            $table->unsignedBigInteger('id_mercancia_fk');
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias')->nullable();
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
        Schema::dropIfExists('detalles_suspensiones_despachos');
    }
};
