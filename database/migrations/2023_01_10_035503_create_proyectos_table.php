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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            // $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->string('id_cliente')->nullable();
            $table->string('user_de_cliente')->nullable();
            $table->string('responsable_cliente')->nullable();
            $table->string('email_responsable')->nullable();
            $table->string('telefono_responsable')->nullable();
            // $table->bigInteger('id_usuario')->unsigned()->nullable();
            $table->string('id_usuario')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->string('select_plantilla')->nullable();
            $table->timestamps();

            // $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
};
