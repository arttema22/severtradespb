<?php

namespace Database\Factories;

use MoonShine\Models\MoonshineUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'moonshine_user_id' => MoonshineUser::query()->inRandomOrder()->value('id'),
            'type' => fake()->numberBetween(1, 2),
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
