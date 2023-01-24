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
        Schema::create('sem', function (Blueprint $table) {
            $table->id('numero_sem');
            $table->date('fecha_llegada');
            $table->date('fecha_venc');
            $table->string('tipo_cancelacion', 20)->nullable;
            $table->text('observacion', 500);
            $table->boolean('estado');
            $table->integer('total_general');
            $table->integer('numero_lig_grav')->nullable();
            $table->date('fecha_gcp')->nullable();

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
        Schema::dropIfExists('sem');
    }
};
