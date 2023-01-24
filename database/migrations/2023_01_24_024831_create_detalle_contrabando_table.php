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
        Schema::create('detalle_contrabando', function (Blueprint $table) {
            $table->foreignId('n_rol_fk')->references('n_rol_fk')->on('contrabando');
            $table->unsignedBigInteger('id_person_fk');
            $table->foreign('id_person_fk')->references('id_person')->on('persona');
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id_users')->on('users');
            $table->unsignedBigInteger('id_almacen_fk');
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacen');
            $table->unsignedBigInteger('n_rol_fk');
            $table->foreign('n_rol_fk')->references('n_rol')->on('mercancias');
            $table->unsignedBigInteger('tipo_mercancias_fk');
            $table->foreign('tipo_mercancias_fk')->references('tipo_mercancias')->on('tipo_mercancia')->nullable();
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('doct')->nullable();

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
        Schema::dropIfExists('detalle_contrabando');
    }
};
