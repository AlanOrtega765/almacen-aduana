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
     * Tabla Utilizada para especificar los datos de las personas externas a la aduana,
     * Ya sean Pasajeros(Comprobante de Retención), Imputados(Contrabandos), Consignatarios(SEM, SEV)
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_person');                //Identificador de la persona
            $table->string('nombre_p', 40);         //Nombre de la Persona
            $table->string('apellido_p', 40);       //Apellido de la persona
            $table->string('tipo_doc_p', 20);       //Tipo de Documento de la persona (CI, DNI, PASAPORTE)
            $table->string('nro_id_person', 20);    //Numero del Tipo de Documento
            $table->string('ciudad_p', 80);         //Ciudad en la cual reside la persona
            $table->string('direccion_p', 50);      //Dirección de la persona
            $table->string('nacionalidad_p', 30);   //Nacionalidad de la Persona
            $table->integer('reincidente')->nullable();

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
        Schema::dropIfExists('personas');
    }
};
