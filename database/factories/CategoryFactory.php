<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'type' => fake()->numberBetween(1, 2),
            'parent_id' => fake()->numberBetween(1, 1),
            'name' => ucfirst($this->faker->words(2, true)),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'thumbnail' => $this->faker->url(),
            'meta_description' => $this->faker->text(),
            'meta_keywords' => $this->faker->words(2, true),
            'is_publish' => $this->faker->boolean(),
        ];
    }
}
