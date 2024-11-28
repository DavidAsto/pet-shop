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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');

            $table->unsignedBigInteger('codigo_venta');
            $table->unsignedBigInteger('codigo_producto');

            $table->smallInteger('detalle_cantidad');
            $table->decimal('detalle_subtotal', 10, 2);

            $table->foreign('codigo_venta')->references('id_venta')->on('venta')->onDelete('cascade');
            $table->foreign('codigo_producto')->references('id_producto')->on('producto')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
