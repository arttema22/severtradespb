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
            'user_id' => fake()->numberBetween(1, 1),
            'name' => ucfirst($this->faker->words(2, true)),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'size' => $this->faker->words(1, true),
            'mark' => $this->faker->words(1, true),
            'length' => $this->faker->words(1, true),
            'thumbnail' => $this->faker->url(),
            //'characteristics' => $this->faker->json_decode(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->words(2, true),
            'is_publish' => $this->faker->boolean(),
        ];
    }
}
