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
        Schema::create('datos_vehiculos', function (Blueprint $table) {
            $table->id('id_vehiculo');
            $table->string('marca_vehiculo', 20);
            $table->string('nom_d_vehiculo', 30)->nullable();
            $table->string('ppu', 15)->nullable();
            $table->string('tipo_vehiculo', 25);
            $table->string('modelo_vehiculo', 30);
            $table->string('chasis_veh', 30);
            $table->integer('n_motor_vehiculo');
            $table->integer('anho_fabric');
            $table->string('origen_veh')->nullable();
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
