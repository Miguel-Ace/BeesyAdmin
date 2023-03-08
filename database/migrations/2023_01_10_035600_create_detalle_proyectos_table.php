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
        Schema::create('detalle_proyectos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_proyecto')->unsigned();
            $table->string('num_actividad');
            $table->string('nombre_actividad');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('horas_propuestas');
            $table->string('horas_reales');
            $table->string('meta_hrs_optimas');
            $table->bigInteger('id_usuario')->unsigned();
            $table->string('ejecutor_cliente');
            $table->string('tipo');
            $table->string('rendimiento');
            $table->bigInteger('id_estado')->unsigned();
            $table->bigInteger('id_etapa')->unsigned();
            $table->string('notas')->nullable();
            $table->string('select_plantilla')->nullable();
            $table->timestamps();

            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_etapa')->references('id')->on('etapas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_proyectos');
    }
};
