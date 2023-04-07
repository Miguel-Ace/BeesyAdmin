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
        Schema::create('prueba_detalle_proyectos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_proyecto')->unsigned()->nullable();
            $table->string('num_actividad')->nullable();
            $table->string('nombre_actividad')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->string('horas_propuestas');
            $table->string('horas_reales')->nullable();
            $table->string('meta_hrs_optimas')->nullable();
            // $table->bigInteger('id_usuario')->unsigned()->nullable();
            $table->string('id_usuario')->nullable();
            $table->string('ejecutor_cliente')->nullable();
            $table->string('tipo')->nullable();
            $table->string('rendimiento')->nullable();
            // $table->bigInteger('id_estado')->unsigned()->nullable();
            $table->string('id_estado')->nullable();
            // $table->bigInteger('id_etapa')->unsigned()->nullable();
            $table->string('id_etapa')->nullable();
            $table->string('notas')->nullable();
            $table->string('select_plantilla')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prueba_detalle_proyectos');
    }
};
