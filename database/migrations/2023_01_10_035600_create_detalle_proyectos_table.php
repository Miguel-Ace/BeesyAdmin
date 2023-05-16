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
            // $table->string('select_plantilla')->nullable();
            $table->timestamps();

            // $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_etapa')->references('id')->on('etapas')->onDelete('cascade')->onUpdate('cascade');
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
