<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Catalog\Product;
use Illuminate\Database\Seeder;
use Database\Factories\Catalog\ProductOptionFactory;
use Database\Factories\Catalog\ProductOptionValueFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // создаем роли для пользователей
        $this->call([RoleSeeder::class]);

        // создаем пользователей
        $this->call([UserSeeder::class]);

        // создаем категории
        Category::factory(15)->create();

        // создаем теги
        $tagValues = Tag::factory(20)->create();

        // создаем опции для товаров
        ProductOptionFactory::new()->count(3)->create();

        $productOptionValues = ProductOptionValueFactory::new()->count(30)->create();

        Product::factory(50)
            ->hasAttached($productOptionValues)
            ->hasAttached($tagValues)
            ->create();
    }
}
