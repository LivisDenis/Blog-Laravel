<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            'title' => fake()->name(),
            'preview' => fake()->text(50),
            'description' => fake()->text(),
            'thumbnail' => Storage::url(
                'posts/' . fake()->image(storage_path('app/public/posts'), 640, 480, null, false),
            ),
        ];
    }
}
