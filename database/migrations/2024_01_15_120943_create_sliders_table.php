<?php

use MoonShine\Models\MoonshineUser;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MoonshineUser::class)
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('name')->comment('Название');
            $table->string('title')->nullable()->comment('Заголовок');
            $table->string('bage_title')->nullable()->comment('Заголовок бейджа');
            $table->string('bage_icon')->nullable()->comment('Иконка бейджа');
            $table->text('text')->nullable()->comment('Текст');
            $table->string('btn_title')->nullable()->comment('Заголовок кнопки');
            $table->string('btn_icon')->nullable()->comment('Иконка кнопки');
            $table->string('btn_url')->nullable()->comment('URL кнопки');
            $table->string('image')->nullable()->comment('Изображение');
            $table->boolean('is_publish')->default('0')->comment('Статус');
            $table->integer('sorting')->nullable()->comment('Сортировка');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
