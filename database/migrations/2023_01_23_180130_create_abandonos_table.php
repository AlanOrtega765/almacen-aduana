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
     * Tabla creada para almacenar los atributos relacionados con el Documento de Abandono
     */
    public function up()
    {
        Schema::create('abandonos', function (Blueprint $table) {
            $table->id('n_oficio');                         //Identificador del documento de abandono
            $table->date('fecha_oficio');                   //Fecha del abandono
            $table->date('fecha_venc');                     //Fecha de vencimiento del abandono
            $table->date('fecha_recepcion')->nullable();    //Fecha de recepción mercancias
            $table->text('observacion')->nullable();        //Observaciones opcionales
            $table->string('estado', 20);                   //Estado del abandono (Vigente, Vencido)
            $table->unsignedBigInteger('id_users_fk');
            $table->foreign('id_users_fk')->references('id')->on('users');
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
        Schema::dropIfExists('abandonos');
    }
};
