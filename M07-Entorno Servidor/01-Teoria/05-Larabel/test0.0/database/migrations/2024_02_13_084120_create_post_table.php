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
        Schema::create('post', function (Blueprint $table) {
            $table->id(); // id auto incremental
            $table->string('title', 45)->unique(); // tipe string de nombre name con un maximo de 45 caracteres i unico
            $table->string('image_url')->nullable(); // pone null el valor para que sea opcional

            // 1r metodo de crear una clave foranea: nombre de la fila con la foreign key
            $table->foreignId('users_id')
                ->nullable() // pone null el valor para que sea opcional
                ->constrained() // crea una foreign key en esta columna con referencia al id
                ->nullOnDelete(); // cuando se elimine se pondra el valor en null

            // 2n metodo de crear una clave foranea: foreign key references
            $table->unsignedBigInteger('users_id_');
            $table->foreign('users_id_')
                ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
                ->on('users') // le especificamos la tabla a la que vamos a hacer la referencia
                ->cascadeOnDelete(); // eliminamos en cascada


            $table->timestamps(); // fecha de creacion y modificacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
