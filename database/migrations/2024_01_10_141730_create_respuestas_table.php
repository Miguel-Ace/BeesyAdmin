<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pregunta')->unsigned();
            $table->string('num_respuesta')->nullable();
            $table->string('cedula_cliente')->nullable();
            $table->string('cliente')->nullable();
            $table->string('pais')->nullable();
            $table->string('usuario')->nullable();
            $table->string('fecha_hora')->nullable();
            $table->string('num_intento')->nullable();
            $table->string('notas')->nullable();
            $table->timestamps();

            $table->foreign('id_pregunta')->references('id')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
