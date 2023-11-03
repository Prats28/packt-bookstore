<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->unique()->isbn10,
            'image' => $this->faker->imageUrl,
            'published' => $this->faker->date,
            'publisher' => $this->faker->company,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
