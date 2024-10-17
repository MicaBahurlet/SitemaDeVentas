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
        Schema::table('compras', function (Blueprint $table) {
            // Agregamos la columna si no existe
            if (!Schema::hasColumn('compras', 'proveedore_id')) {
                $table->foreignId('proveedore_id')
                    ->nullable()
                    ->constrained('proveedores')
                    ->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::table('compras', function (Blueprint $table) {
                // $table->dropForeign(['proveedore_id']);
                $table->dropColumn('proveedore_id');
            });
        }
    }
};
