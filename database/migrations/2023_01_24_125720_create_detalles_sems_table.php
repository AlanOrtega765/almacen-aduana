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
        Schema::create('detalles_sems', function (Blueprint $table) {
            $table->foreignId('numero_sem_pf')->references('numero_sem')->on('sems');

            $table->unsignedBigInteger('id_mercancia_fk');
            $table->foreign('id_mercancia_fk')->references('id_mercancia')->on('mercancias');



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
        Schema::dropIfExists('detalles_sems');
    }
};
