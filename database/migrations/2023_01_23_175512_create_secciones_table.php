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
     * Tabla creada para especificar la sección y el sector a la cual pertenece cada una de las mercancias dentro del almacen
     */
    public function up()
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->foreignId('id_almacen_fk')->references('id_almacen')->on('almacenes');
            $table->string('sector', 20);       // Sector en el cual se encuentra el bulto dentro del almacen de la aduana
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
        Schema::dropIfExists('secciones');
    }
};
