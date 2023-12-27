<?php

use App\Models\Catalog\ProductOption;
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
        Schema::create('product_option_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductOption::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('title');
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
            Schema::dropIfExists('product_option_values');
        }
    }
};
