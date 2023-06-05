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
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoEntidad_id');
            $table->string('nombre', 100);
            $table->string('nombreRepresentante', 100);
            $table->string('apellidosRepresentante', 100);
            $table->string('telefono', 10);
            $table->string('direccion');
            $table->string('cuenta',25);
            $table->string('moneda', 10);
            $table->string('codigoReeup', 50);
            $table->string('codigoNit', 50);
            $table->string('titular', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipoEntidad_id')->references('id')->on('tipo_entidades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades');
    }
};
