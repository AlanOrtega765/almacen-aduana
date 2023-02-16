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
        Schema::create('sems', function (Blueprint $table) {
            $table->id('numero_sem');
            $table->date('fecha_llegada')->nullable();          //fecha llegada sem (almacen deposito)
            $table->date('fecha_venc')->nullable();
            $table->string('aduana_presenta', 20)->nullable();  //aduana en la que se presenta
            $table->date('entrega_maxima')->nullable();          //fecha maxima de entrega
            $table->string('tipo_cancelacion', 20)->nullable(); //REEXPORTACION, IMPORTACION, ENTREGA
            $table->text('observacion', 500)->nullable();
            $table->string('estado')->nullable();

            $table->string('drs_tipo',20)->nullable();          //Doc regimen suspensivo
            $table->string('drs_numero',20)->nullable();        //Doc regimen suspensivo
            $table->date('drs_fecha')->nullable();              //Doc regimen suspensivo
            $table->date('drs_fecha_venc')->nullable();         //Doc regimen suspensivo
            $table->string('numero_lig_grav',20)->nullable();
            $table->date('fecha_gcp')->nullable();
            $table->integer('total_general')->nullable();
            $table->unsignedBigInteger('id_persona_fk')->nullable();
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
        Schema::dropIfExists('sems');
    }
};
