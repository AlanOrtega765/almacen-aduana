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
     * Tabla creada para almacenar los atributos relacionados con el Documento de Actas de levantamiento de mercancias en rezago
     */
    public function up()
    {
        Schema::create('rezagos', function (Blueprint $table) {
            $table->id('n_acta');                                   //Identificador de rezagos
            $table->date('fecha_doc');                              //Fecha del documento de Rezago
            $table->string('acta_entrega_rezago', 20);              //Acta de entrega de mercancias en rezago
            $table->string('carnet_tramitacion_a',20)->nullable();  //Carnet de tramitación
            $table->string('dus',20)->nullable();                   //
            $table->string('bl',20)->nullable();                    //
            $table->string('gcp',20)->nullable();                   //
            $table->string('dpu',20)->nullable();                   //
            $table->string('acl_manifesto',20)->nullable();         //
            $table->string('fecha_manifesto',20)->nullable();       //
            $table->string('solicitante', 30)->nullable();          //
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
        Schema::dropIfExists('rezagos');
    }
};
