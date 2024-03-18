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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // foreing key con la tabla categories
            $table->unsignedBigInteger('show_id');
            $table->foreign('show_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('shows') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada

            $table->string('titulo');
            $table->string('descripcion');
            $table->string('fecha');
            $table->string('autor');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
