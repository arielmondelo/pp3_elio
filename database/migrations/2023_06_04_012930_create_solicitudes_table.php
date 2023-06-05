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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoSolicitud_id');
            $table->unsignedBigInteger('entidad_id');
            $table->unsignedBigInteger('contrato_id');
            $table->string('numeroExpediente', 50);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('estado', 10);
            $table->string('descripcion');
            $table->string('nombreProducto');
            $table->string('versionProducto');
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('tipoSolicitud_id')->references('id')->on('tipo_solicitudes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
