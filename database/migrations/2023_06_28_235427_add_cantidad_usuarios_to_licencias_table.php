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
        Schema::table('licencias', function (Blueprint $table) {
            $table->string('cantidad_usuario')->nullable();
            $table->string('bee_commerce')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('licencias', function (Blueprint $table) {
            $table->dropColumn('cantidad_usuario');
            $table->dropColumn('bee_commerce');
        });
    }
};
