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
        Schema::create('entornos_virtuales', function (Blueprint $table) {
            $table->id();
            $table->string('nombreMV', 25);
            $table->string('estado', 25);
            $table->double('capacidadDisco');
            $table->float('memoriaRAM');
            $table->string('arquitectura', 25);
            $table->string('sistemaOperativo', 25);
            $table->string('contrasena',15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entornos_virtuales');
    }
};
