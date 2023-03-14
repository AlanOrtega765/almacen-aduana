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
     * Tabla creada para almacenar los atributos relacionados con el detalle del comprobante de reteción
     * aqui se almacenan todos los datos que se necesitan para generar el documento de Comprobante de retencion
     *
     */
    public function up()
    {
        Schema::create('detalles_retenciones', function (Blueprint $table) {
            $table->foreignId('n_boleta_pf')->references('n_boleta')->on('retenciones');        //Numero de boleta comprobante de retencion
            $table->unsignedBigInteger('id_mercancia_fk');                                      //Lista de mercancias
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias');

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
        Schema::dropIfExists('detalles_retenciones');
    }
};
