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
            $table->id()->from(5000);
            $table->date('fecha_boleta');
            $table->string('n_doc_imputado');
            $table->string('nombres_imputado');
            $table->string('apellidos_imputado');
            $table->string('nacionalidad');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('franquicia');
            $table->string('descripcion');
            $table->integer('bultos');
            $table->string('peso');
            $table->string('avanzada');
            $table->string('almacen');
            $table->string('observaciones');
            $table->date('plazo_maximo');
            $table->string('estado');
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
