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
        Schema::create('contrabandos', function (Blueprint $table) {
            $table->id('n_rol');
            $table->date('fecha_contrab');
            $table->date('fecha_venc_contrab');
            $table->boolean('estado');
            $table->string('tipo_contrabando', 20);
            $table->string('instituciones', 20) ;
            $table->integer('nue');
            $table->string('doc_denunciante', 20);
            $table->string('doc_cancelacion', 20)->nullable;
            $table->date('fecha_canc')->nullable();
            $table->string('doc_de_entrega', 20)->nullable;;
            $table->date('fecha_doc_entrega')->nullable;;
            $table->text('observaciones', 50);
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
