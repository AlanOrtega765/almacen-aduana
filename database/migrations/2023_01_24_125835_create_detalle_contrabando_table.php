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
        Schema::create('detalle_contrabandos', function (Blueprint $table) {
            $table->foreignId('n_rol_contrab')->references('n_rol')->on('contrabandos');
            $table->unsignedBigInteger('id_person_fk');
            $table->foreign('id_person_fk')->references('id_person')->on('personas');
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
            $table->unsignedBigInteger('id_almacen_fk');
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacens');
            $table->unsignedBigInteger('n_rol_fk');
            $table->foreign('n_rol_fk')->references('n_rol')->on('mercancias');
            $table->unsignedBigInteger('tipo_mercancias_fk');
            $table->foreign('tipo_mercancias_fk')->references('id_mercancias')->on('tipomercancias');
            $table->unsignedBigInteger('id_vehiculo_fk');
            $table->foreign('id_vehiculo_fk')->references('id_vehiculo')->on('datos_vehiculos');


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
        Schema::dropIfExists('detalle_contrabandos');
    }
};
