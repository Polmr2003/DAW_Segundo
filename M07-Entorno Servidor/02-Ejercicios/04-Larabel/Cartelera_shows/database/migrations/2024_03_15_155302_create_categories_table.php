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
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement(); // columna de la tabla categories con el id

            // columna de la tabla categories con el nombre de categoria que es un enum
            $table->enum('categoria', ['Teatro', 'Danza', 'Monologo', 'Comedia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
