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
     *
     * Tabla creada para almacenar Datos relacionados a Suspención de Despacho
     */
    public function up()
    {
        Schema::create('suspensiones_despachos', function (Blueprint $table) {
            $table->id('n_documento');          //Identificador de Suspención de despacho

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
        Schema::dropIfExists('suspensiones_despachos');
    }
};
