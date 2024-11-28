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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->date('cotizacion_fecha');
            $table->string('cotizacion_nombre');
            $table->string('cotizacion_correo');
            $table->string('cotizacion_telefono');
            $table->string('cotizacion_descripcion', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
