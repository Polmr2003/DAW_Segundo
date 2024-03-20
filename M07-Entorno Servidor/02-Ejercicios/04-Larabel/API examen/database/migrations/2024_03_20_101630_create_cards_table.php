<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');

            // foreing key con la tabla board
            $table->unsignedBigInteger('trellolist_id');
            $table->foreign('trellolist_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('trellolists') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
