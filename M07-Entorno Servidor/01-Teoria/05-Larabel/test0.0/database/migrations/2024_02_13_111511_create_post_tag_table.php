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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // nombre de la fila con la foreign key
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('post') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada

            // nombre de la fila con la foreign key
            $table->unsignedBigInteger('tags_id');
            $table->foreign('tags_id')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('tags') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
