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
        Schema::create('shows', function (Blueprint $table) {
            $table->id()->autoIncrement(); // columna de la tabla shows con el id
            $table->string('nombre'); // columna de la tabla shows con el nombre
            $table->string('duracion'); // columna de la tabla shows con la duracion
            $table->string('fechas'); // columna de la tabla shows con la fecha
            $table->string('idiomas'); // columna de la tabla shows con el idioma
            $table->integer('precio'); // columna de la tabla shows con el precio
            $table->string('valoracion'); // columna de la tabla shows con la valoracion

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
