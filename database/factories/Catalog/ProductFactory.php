<?php

namespace Database\Factories\Catalog;

use App\Models\Category;
use MoonShine\Models\MoonshineUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'moonshine_user_id' => MoonshineUser::query()->inRandomOrder()->value('id'),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
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
