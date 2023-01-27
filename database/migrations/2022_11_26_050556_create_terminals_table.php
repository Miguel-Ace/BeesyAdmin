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
        Schema::create('terminals', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->bigInteger('id_licencia')->unsigned();
            $table->string('serial');
            $table->string('nombreEquipo');
            $table->string('ultimoAcceso');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('id_licencia')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals');
    }
};
