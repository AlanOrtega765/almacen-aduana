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
     * Tabla creada para almacenar los atributos relacionados con el Documento de Abandono Expreso
     */
    public function up()
    {
        Schema::create('abandonos_expresos', function (Blueprint $table) {
            $table->id('n_rol_ae');         //Identificador de Abandonos
            $table->date('fecha_doc');      //Fecha del documento de abandono expreso
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
        Schema::dropIfExists('abandonos_expresos');
    }
};
