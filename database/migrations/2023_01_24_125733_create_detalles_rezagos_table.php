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
        Schema::create('detalles_rezagos', function (Blueprint $table) {
            $table->foreignId('n_boleta_pf')->references('n_boleta')->on('retenciones');
            $table->unsignedBigInteger('id_person_fk');
            $table->foreign('id_person_fk')->references('id_person')->on('personas');
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
            $table->unsignedBigInteger('id_almacen_fk');
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacenes');
            $table->unsignedBigInteger('id_mercancia_fk');
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias');

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
        Schema::dropIfExists('detalles_rezagos');
    }
};
