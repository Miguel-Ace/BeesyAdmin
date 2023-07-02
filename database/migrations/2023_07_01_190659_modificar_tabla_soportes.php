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
        Schema::table('soportes', function (Blueprint $table) {
            $table->text('problema')->nullable()->change();
            $table->text('solucion')->nullable()->change();
            $table->text('observaciones')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soportes', function (Blueprint $table) {
            $table->string('problema')->nullable()->change();
            $table->string('solucion')->nullable()->change();
            $table->string('observaciones')->nullable()->change();
        });
    }
};
