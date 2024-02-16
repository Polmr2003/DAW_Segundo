<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Tag;
use \App\Models\Post;
use \App\Models\User;
use \App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->unverified()->create();

        Category::factory(5)->create();
        Post::factory(50)->create();
        Tag::factory(20)->create();

        // User::factory()->create([
        //      'name' => 'Test User DAW2',
        //      'email' => 'test@example.com',
        //  ]);
    }
}
