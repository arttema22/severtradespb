<?php

use App\Models\Tag;
use App\Models\Category;
use App\Models\Catalog\Product;
use MoonShine\Models\MoonshineUser;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Catalog\ProductOptionValue;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MoonshineUser::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignIdFor(Category::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('name')->comment('Заголовок');
            $table->string('slug')->comment('Slug');
            $table->text('description')->nullable()->comment('Описание');
            $table->string('size')->nullable()->comment('Размер');
            $table->string('mark')->nullable()->comment('Марка');
            $table->string('length')->nullable()->comment('Длина');
            $table->text('thumbnail')->nullable()->comment('Изображение');
            $table->json('characteristics')->nullable()->comment('Характеристики');
            $table->text('meta_description')->nullable()->comment('SEO-описание');
            $table->text('meta_keywords')->nullable()->comment('SEO-ключевые слова');
            $table->boolean('is_publish')->default('0')->comment('Статус');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('option_value_product', function (Blueprint $table) {
            $table->foreignIdFor(ProductOptionValue::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('product_tag', function (Blueprint $table) {
            $table->foreignIdFor(Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(Tag::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('option_value_product');
            Schema::dropIfExists('product_tag');
            Schema::dropIfExists('products');
        }
    }
};
