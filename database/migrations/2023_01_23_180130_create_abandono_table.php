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
        Schema::create('abandono', function (Blueprint $table) {
            $table->id('n_oficio');
            $table->date('fecha_oficio');
            $table->date('fecha_venc');
            $table->string('turno', 30);
            $table->date('fecha_recepcion');
            $table->text('observacion');
            $table->string('estado', 20);
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
        Schema::dropIfExists('abandono');
    }
};
