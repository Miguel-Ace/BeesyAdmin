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
        Schema::table('users', function (Blueprint $table) {
            $table->string('con_laboratorio')->nullable();
            $table->string('con_especializacion')->nullable();
            $table->string('con_mejora')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('con_laboratorio');
            $table->dropColumn('con_especializacion');
            $table->dropColumn('con_mejora');
        });
    }
};
