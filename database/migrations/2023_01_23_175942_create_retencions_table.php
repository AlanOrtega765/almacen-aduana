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
        Schema::create('retencions', function (Blueprint $table) {
            $table->id('n_boleta')->from(53000); // asignacion de la id desde el 53000
            $table->date('fecha_reten');
            $table->date('fecha_venc');
            $table->boolean('franquicia');
            $table->string('estado', 10);
            $table->timestamps();
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retencions');
    }
};
