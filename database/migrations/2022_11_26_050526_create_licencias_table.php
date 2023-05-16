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
        Schema::create('licencias', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            // $table->bigInteger('id_cliente')->unsigned();
            $table->string('id_cliente');
            // $table->bigInteger('id_software')->unsigned();
            $table->string('id_software');
            $table->string('ruta');
            $table->string('cantidad');
            $table->string('fechaInicio');
            $table->string('fechaFinal');
            $table->timestamps();

            // $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            // $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias');
    }
};
