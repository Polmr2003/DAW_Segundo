<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\shows_categoriesFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // añadimos datos predefinidos por nosotros en la base de datos en la tabla categories
        \App\Models\Categories::create(['categoria' => 'Teatro']);
        \App\Models\Categories::create(['categoria' => 'Danza']);
        \App\Models\Categories::create(['categoria' => 'Monólogo']);
        \App\Models\Categories::create(['categoria' => 'Comedia']);

        // añadimos datos fake de show_categories a nuestra base de datos
        \App\Models\show_categories::factory(10)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
