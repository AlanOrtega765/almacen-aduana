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
        Schema::create('mercancias', function (Blueprint $table) {
            $table->id('id_mercancia');
            $table->text('nombre_merc');
            $table->integer('peso')->nullable();

            $table->integer('drs_n_item')->nullable();
            $table->string('unidad_medida', 10)->nullable();
            $table->integer('cantidad_bulto')->nullable();
            $table->integer('valor_mercancia')->nullable();
            $table->unsignedBigInteger('id_almacen_fk')->nullable();
            $table->foreign('id_almacen_fk')->references('id_almacen')->on('almacenes');
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
        Schema::dropIfExists('mercancias');
    }
};
