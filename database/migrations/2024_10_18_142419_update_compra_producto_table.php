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
        Schema::table('compra_producto', function (Blueprint $table) {
            // primero elimino las claves foráneas antes que los indices unicos
            $table->dropForeign(['compra_id']);
            $table->dropForeign(['producto_id']);

            // borro índices únicos
            $table->dropUnique(['compra_id']);
            $table->dropUnique(['producto_id']);

            // Agregar un índice único combinado
            $table->unique(['compra_id', 'producto_id']);

            // vuelvo a agregar las claves foráneas sin la restricción unique
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compra_producto', function (Blueprint $table) {
            // elimino el índice único combinado
            $table->dropUnique(['compra_id', 'producto_id']);

            // elimino las claves foráneas
            $table->dropForeign(['compra_id']);
            $table->dropForeign(['producto_id']);

            // restauro los índices únicos originales
            $table->unique('compra_id');
            $table->unique('producto_id');

            // vuelvo a agregar las claves foráneas con restricción unique
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }
};
