<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('moonshine_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title')->comment('Заголовок');
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
