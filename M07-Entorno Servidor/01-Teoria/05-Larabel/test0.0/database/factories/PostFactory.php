<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //¿Qué es el slug?
        //Titulo de prueba
        //titulo-de-prueba

        $title = $this->faker->sentence();

        return [
            'title'         =>  $title,
            'slug'          =>  Str::slug($title),
            'body'          =>  $this->faker->paragraphs(5, true),
            'image_url'     =>  $this->faker->imageUrl(640,480),
            'category_id'   =>  Category::all()->random()->id,
            'user_id'       =>  User::all()->random()->id
        ];
    }
}
