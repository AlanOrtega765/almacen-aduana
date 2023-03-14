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
     * Tabla creada para almacenar los atributos relacionados con el detalle de Servicio de entrega de Vehiculos
     * (con s final porque el nombre de la tabla debe ser escrito en plural)
     */
    public function up()
    {
        Schema::create('detalles_sevs', function (Blueprint $table) {
            $table->foreignId('numero_sev_pf')->references('numero_sev')->on('sevs');
            $table->unsignedBigInteger('id_vehiculo_fk');
            $table->foreign('id_vehiculo_fk')->references('id_vehiculo')->on('datos_vehiculos');

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
        Schema::dropIfExists('detalles_sevs');
    }
};
