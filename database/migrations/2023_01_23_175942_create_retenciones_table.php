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
        Schema::create('retenciones', function (Blueprint $table) {
            $table->id('n_boleta')->from(53000); // asignacion de la id desde el 53000
            $table->date('fecha_reten');
            $table->date('fecha_venc');
            $table->boolean('franquicia');
            $table->string('estado', 10);
            $table->text('observaciones', 200)->nullable();
            $table->unsignedBigInteger('id_persona_fk');
            $table->foreign('id_persona_fk')->references('id_person')->on('personas');
            $table->unsignedBigInteger('id_user_fk');
            $table->foreign('id_user_fk')->references('id')->on('users');
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
        Schema::dropIfExists('retenciones');
    }
};
