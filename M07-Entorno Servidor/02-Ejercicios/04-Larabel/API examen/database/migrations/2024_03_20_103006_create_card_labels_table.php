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
        Schema::create('card_labels', function (Blueprint $table) {
            $table->id();

            // foreing key con la tabla show
            $table->unsignedBigInteger('card_id');
            $table->foreign('card_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('cards') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada

            // foreing key con la tabla categories
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('labels') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_labels');
    }
};
