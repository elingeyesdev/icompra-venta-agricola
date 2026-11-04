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
         if (!Schema::hasTable('unidad_medidas')) {
        Schema::table('unidad_medidas', function (Blueprint $table) {
            //

            $table->integer('estado')->default(1)->after('abreviatura');
        });
         }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_medidas', function (Blueprint $table) {
            //
        });
    }
};
