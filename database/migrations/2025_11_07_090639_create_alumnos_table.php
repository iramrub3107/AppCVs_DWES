<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono')->nullable();
            $table->string('correo')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->decimal('nota_media', 3, 2)->nullable();
            $table->text('experiencia')->nullable();
            $table->text('formacion')->nullable();
            $table->text('habilidades')->nullable();
            $table->string('fotografia')->nullable(); // Ruta de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');    
    }
};
