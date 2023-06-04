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
<<<<<<< HEAD
            // $table->unsignedBigInteger('entidad_id');
=======
>>>>>>> e78a96670e61fb599af357dde3e9ad342f6273a2
            $table->string('numeroSuplemento');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('descripcion');
            $table->string('estado');
            $table->float('montoAumentar');
            $table->softDeletes();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade')->onUpdate('cascade');
<<<<<<< HEAD
            // $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade')->onUpdate('cascade');
=======
>>>>>>> e78a96670e61fb599af357dde3e9ad342f6273a2
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
