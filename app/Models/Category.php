<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * Товары, принадлежащие категории.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Может стоит удалить?????
     * Родительские категории.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    /**
     * Для категории выдаст первый дочерний уровень
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Для категории выдаст все дочерние уровни.
     */
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }
}
