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
        Schema::create('detalles_abandonos', function (Blueprint $table) {
            $table->foreignId('n_oficio')->references('n_oficio')->on('abandonos');
            $table->string('turno', 30);
            $table->unsignedBigInteger('n_rol_fk');
            $table->foreign('n_rol_fk')->references('n_rol')->on('mercancias');


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
        Schema::dropIfExists('detalles_abandonos');
    }
};
