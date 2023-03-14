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
     * Tabla creada para almacenar los atributos relacionados los datos del vehiculo
     */
    public function up()
    {
        Schema::create('datos_vehiculos', function (Blueprint $table) {
            $table->id('id_vehiculo');                                  //Identificador del vehiculo
            $table->string('marca_vehiculo', 20);                       //Marca del vehiculo
            $table->string('nom_d_vehiculo', 30)->nullable();           //Nombre del Vehiculo
            $table->string('ppu', 15)->nullable();                      //Placa Patente
            $table->string('tipo_vehiculo', 25);                        //Tipo de vehiculo (Auto, Camioneta, Station Wagon, Otro)
            $table->string('modelo_vehiculo', 30);                      //Modelo del vehiculo
            $table->string('chasis_veh', 30)->nullable();               //Numero de Chasis del vehiculo
            $table->integer('n_motor_vehiculo');                        //Numero de Motor del Vehiculo
            $table->integer('anho_fabric')->nullable();                 //Año de fabricación del vehiculo
            $table->string('origen_veh', 20)->nullable();               //Oriren del Vehiculo (Pais)
            $table->unsignedBigInteger('id_almacen_fk')->nullable();
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacenes');
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
        Schema::dropIfExists('datos_vehiculos');
    }
};
