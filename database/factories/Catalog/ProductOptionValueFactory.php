<?php

namespace Database\Factories\Catalog;

use App\Models\Catalog\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionValueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_option_id' => ProductOption::query()->inRandomOrder()->value('id'),
            'title' => ucfirst($this->faker->word()),
        ];
    }
}
