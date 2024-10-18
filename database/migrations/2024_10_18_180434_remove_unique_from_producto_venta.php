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
        Schema::table('producto_venta', function (Blueprint $table) {
            $table->dropUnique(['venta_id']); 
            $table->dropUnique(['producto_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producto_venta', function (Blueprint $table) {
            $table->unique('venta_id'); // reagregar índice 
            $table->unique('producto_id'); // rt
        });
    }
};
