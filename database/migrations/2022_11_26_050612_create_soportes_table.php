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
        Schema::create('soportes', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->string('sticker');
            $table->string('colaborador');
            $table->string('fechaHoraInicio');
            $table->string('fechaHoraFinal');
            $table->bigInteger('id_cliente')->unsigned();
            $table->bigInteger('id_software')->unsigned();
            $table->string('problema');
            $table->string('solucion');
            $table->string('numLaboral');
            $table->string('observaciones');
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soportes');
    }
};
