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
        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta');

            $table->string('venta_nombre');
            $table->string('venta_telefono');
            $table->string('venta_correo');
            $table->string('venta_direccion');
            
            $table->decimal('venta_total', 10, 2);
            $table->date('venta_registro');

            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
