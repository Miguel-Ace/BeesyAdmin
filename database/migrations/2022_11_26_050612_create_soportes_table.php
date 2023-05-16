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
            $table->string('ticker');
            $table->string('colaborador');
            $table->string('fechaCreacionTicke')->nullable();
            $table->string('fechaInicioAsistencia')->nullable();
            $table->string('fechaFinalAsistencia')->nullable();
            // $table->bigInteger('id_cliente')->unsigned();
            $table->string('id_cliente');
            // $table->bigInteger('id_software')->unsigned();
            $table->string('id_software');
            $table->string('problema')->nullable();
            $table->string('solucion')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('numLaboral');
            // $table->string('usuario');
            $table->string('prioridad');
            $table->string('estado');
            $table->string('correo_cliente');
            $table->string('archivo')->nullable();
            $table->timestamps();

            // $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_software')->references('id')->on('software')->onDelete('cascade')->onUpdate('cascade');
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
