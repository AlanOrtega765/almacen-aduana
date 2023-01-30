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
            $table->string('doc_denunciante', 20);
            $table->string('doc_cancelacion', 20)->nullable;
            $table->date('fecha_canc')->nullable();
            $table->string('doc_de_entrega', 20)->nullable;;
            $table->date('fecha_doc_entrega')->nullable;;
            $table->text('observaciones', 50);

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