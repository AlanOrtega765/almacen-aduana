<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Se pretende generar una tabla con la lista de conexiones por usuario (Entidad Debil Con respecto a Users)
     * Con IP Nombre dispositivo S.O etc. relacionado a Seguridad.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docts', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('docts');
    }
};
