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
     * Tabla creada para almacenar los atributos relacionados con el Documento de Comprobante de Reteción
     */
    public function up()
    {
        Schema::create('retenciones', function (Blueprint $table) {
            $table->id('n_boleta')->from(53000);            // asignacion de la id desde el 53000
            $table->date('fecha_reten');                    //Fecha de la retención
            $table->date('fecha_venc');                     //Fecha de vencimiento de la retención
            $table->boolean('franquicia');                  //Utilizacion de Franquicia (Si, No)
            $table->string('estado', 10);                   //Estado de la retención (Vigente, Vencido)
            $table->text('observaciones')->nullable();      //Observaciones opcionales al documento

            //Claves Foraneas
            $table->unsignedBigInteger('id_persona_fk');
            $table->foreign('id_persona_fk')->references('id_person')->on('personas');
            $table->unsignedBigInteger('id_user_fk');
            $table->foreign('id_user_fk')->references('id')->on('users');
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
