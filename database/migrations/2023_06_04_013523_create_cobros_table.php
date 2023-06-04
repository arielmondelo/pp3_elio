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
        Schema::create('cobros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipoCobro_id');
            $table->float('monto');
            $table->date('fecha');
            $table->string('nombreProducto', 100);
            $table->string('descripcion');
            $table->string('estado', 10);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipoCobro_id')->references('id')->on('tipo_cobros')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobros');
    }
};
