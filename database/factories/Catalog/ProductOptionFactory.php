<?php

namespace Database\Factories\Catalog;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->word())
        ];
    }
}
