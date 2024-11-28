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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('producto_nombre', 70);
            $table->string('producto_descripcion', 200);
            $table->string('producto_imagen', 500);
            $table->decimal('producto_precio_unitario', 10, 2);

            $table->unsignedBigInteger('codigo_especie');
            $table->unsignedBigInteger('codigo_marca');
            $table->unsignedBigInteger('codigo_categoria');

            $table->foreign('codigo_especie')->references('id_especie')->on('especie')->onDelete('cascade');
            $table->foreign('codigo_marca')->references('id_marca')->on('marca')->onDelete('cascade');
            $table->foreign('codigo_categoria')->references('id_categoria')->on('categoria')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
