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
        Schema::create('tipo_mercancia', function (Blueprint $table) {
            $table->foreignId('n_rol_fk')->references('n_rol')->on('mercancias');
            $table->unsignedBigInteger('tipo_mercancias');
            $table->foreign('tipo_mercancias')->references('tipo_mercancias')->on('tipo_mercancia');
            $table->integer('cantidad');
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
        Schema::dropIfExists('tipo_mercancia');
    }
};
