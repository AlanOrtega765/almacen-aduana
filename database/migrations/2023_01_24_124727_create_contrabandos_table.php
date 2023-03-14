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
     * Tabla creada para almacenar los atributos relacionados con el Documento de Contrabando
     */
    public function up()
    {
        Schema::create('contrabandos', function (Blueprint $table) {
            $table->id('n_rol')->from(2000);                    //Identificador de documento de contrabandos
            $table->date('fecha_contrab');                      //Fecha del documento de contrabando
            $table->date('fecha_venc_contrab');                 //Fecha de vencimiento del documento
            $table->string('estado', 10);                       //Estado de vencimiento (Vigente, Vencido)
            $table->string('tipo_contrabando', 20);             //Tipo de contrabando o entidad que la realizo (Carabineros, PDI, Turno Regular, Suspencion de despacho, Otro)
            //$table->string('instituciones', 20);              //
            $table->integer('nue')->nullable();                 //Atributo NUE
            $table->string('doc_denunciante', 20);              //Docoumento del denunciante
            $table->string('doc_cancelacion', 20)->nullable();  //Documento de cancelacion
            $table->date('fecha_canc')->nullable();             //Fecha de la cancelacion
            $table->string('doc_de_entrega', 20)->nullable();   //Documento de entrega
            $table->date('fecha_doc_entrega')->nullable();      //Fecha del documento de entrega
            $table->text('observaciones', 50)->nullable();      //Observaciones opcional
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
        Schema::dropIfExists('contrabandos');
    }
};
