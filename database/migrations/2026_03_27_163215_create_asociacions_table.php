<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asociacions', function (Blueprint $table) {
            $table->id();

            $table->string('razon_social');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('correo');
            $table->string('telefono');

            $table->string('representante_legal');
            $table->string('celular_representante');
            $table->string('email_representante');

            $table->json('contactos');
            $table->json('maquinarias');
            $table->json('servicios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociacions');
    }
};
