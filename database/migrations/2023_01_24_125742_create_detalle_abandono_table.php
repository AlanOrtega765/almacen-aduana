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
        Schema::create('detalle_abandonos', function (Blueprint $table) {
            $table->foreignId('n_oficio')->references('n_oficio')->on('abandonos');
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
            $table->unsignedBigInteger('id_almacen_fk');
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacens');
            $table->unsignedBigInteger('n_rol_fk');
            $table->foreign('n_rol_fk')->references('n_rol')->on('mercancias');


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
        Schema::dropIfExists('detalle_abandonos');
    }
};
