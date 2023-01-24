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
        Schema::create('rezago', function (Blueprint $table) {
            $table->id('n_acta');
            $table->date('fecha_doc');
            $table->string('acta_entrega_rezago', 20);
            $table->string('carnet_tramitacion_a',20)->nullable();
            $table->string('dus',20)->nullable();
            $table->string('bl',20)->nullable();
            $table->string('gcp',20)->nullable();
            $table->string('dpu',20)->nullable();
            $table->string('acl_manifesto',20)->nullable();
            $table->string('fecha_manifesto',20)->nullable();
            $table->string('solicitante', 30);
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
        Schema::dropIfExists('rezago');
    }
};
