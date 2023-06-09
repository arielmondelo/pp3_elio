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
        Schema::create('users', function (Blueprint $table) {
            /* $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->timestamp('correo_verificado')->nullable();
            $table->string('contrasena');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes(); */

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            $table->rememberToken();
            $table->integer('rol')->default(3);
            $table->timestamps();            
            $table->softDeletes();
            /* $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
