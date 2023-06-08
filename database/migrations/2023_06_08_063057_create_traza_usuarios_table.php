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
        Schema::create('traza_usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipoTraza');
            $table->string('usuarioDest');
            $table->string('emailDest');
            $table->string('usuarioCrea');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traza_usuarios');
    }
};
