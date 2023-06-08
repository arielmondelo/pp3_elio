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
        Schema::create('suplementos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id');
            $table->string('numeroSuplemento');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('descripcion');
            $table->string('estado');
            $table->float('montoAumentar');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suplementos');
    }
};
