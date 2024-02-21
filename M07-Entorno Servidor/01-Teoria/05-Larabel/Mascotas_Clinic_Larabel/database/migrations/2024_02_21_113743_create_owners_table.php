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
        Schema::create('owners', function (Blueprint $table) {

            $table->id(); // id auto incremental
            $table->string('name', 45); // tipe string de nombre name con un maximo de 45 caracteres i unico
            $table->string('email')->unique(); // tipe string de nombre email

            // 2n metodo de crear una clave foranea: foreign key references
            // $table->unsignedBigInteger('users_id_');
            // $table->foreign('users_id_')
            //     ->references('id') // le especificamos la columna a la que vamos a hacer la referencia
            //     ->on('users') // le especificamos la tabla a la que vamos a hacer la referencia
            //     ->cascadeOnDelete(); // eliminamos en cascada

            $table->timestamps(); // pone null el valor para que sea opcional


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
