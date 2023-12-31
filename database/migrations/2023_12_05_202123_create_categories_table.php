<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use MoonShine\Models\MoonshineUser;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MoonshineUser::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->integer('type')->default('1')->comment('Тип');
            $table->foreignIdFor(Category::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->integer('sorting')->default(0);
            $table->string('name')->comment('Название');
            $table->string('slug')->comment('Slug');
            $table->text('description')->nullable()->comment('Описание');
            $table->text('thumbnail')->nullable()->comment('Изображение');
            $table->text('meta_description')->nullable()->comment('SEO-описание');
            $table->text('meta_keywords')->nullable()->comment('SEO-ключевые слова');
            $table->boolean('is_publish')->default('0')->comment('Статус');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('categories');
        }
    }
};
