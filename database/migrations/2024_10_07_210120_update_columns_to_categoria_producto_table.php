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
        Schema::table('categoria_producto', function (Blueprint $table) {
            //  eliminar la clave foránea
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['categoria_id']);

            //  eliminar los índices únicos
            $table->dropUnique(['producto_id']);
            $table->dropUnique(['categoria_id']);

            //  volver a agregar las claves foráneas sin restricciones únicas
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categoria_producto', function (Blueprint $table) {
            // necesito las claves foráneas antes de restaurar el estado anterior
            $table->dropForeign(['producto_id']);
            $table->dropForeign(['categoria_id']);

            //  agregar los índices únicos
            $table->unique('producto_id');
            $table->unique('categoria_id');

            // para restaurrar las claves foráneas
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }
};
