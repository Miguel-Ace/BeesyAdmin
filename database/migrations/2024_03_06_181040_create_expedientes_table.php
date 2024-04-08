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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user_pertenece')->unsigned()->nullable(); // El usuario dueño del expediente
            $table->bigInteger('id_user_soluciona')->unsigned()->nullable(); // El usuario que realiza el expediente
            $table->string('tipo')->nullable(); // Laboratorio,Especialización,Mejora
            $table->string('num_expediente')->nullable(); // Numero del expediente
            $table->string('expediente')->nullable(); // Ejemplo: Edwin_Torres-150-L
            $table->string('archivo')->nullable(); // Aqui suben un archivo rar, word ó pdf
            $table->string('prioridad')->nullable(); // Leve, Media y Alta
            $table->string('estado')->nullable(); // Enviado, En proceso, En revisión y Completado
            $table->string('fecha_entrada')->nullable(); // Cuando se crea el lab
            $table->string('fecha_programada')->nullable(); // Cuando se estima que esté listo el lab
            $table->string('fecha_salida')->nullable(); // Cuando realmente se entrega el lab
            $table->string('fecha_revision')->nullable(); // Cuando soporte finaliza o completa la revisión
            $table->bigInteger('id_empresa')->unsigned()->nullable(); // Obtener datos de la tabla cliente
            $table->bigInteger('id_software')->unsigned()->nullable(); // Obtener datos de la tabla software
            $table->timestamps();

            $table->foreign('id_user_pertenece')->references('id')->on('users');
            $table->foreign('id_user_soluciona')->references('id')->on('users');
            $table->foreign('id_empresa')->references('id')->on('clientes');
            $table->foreign('id_software')->references('id')->on('software');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
