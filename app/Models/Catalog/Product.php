<?php

namespace App\Models\Catalog;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * свойство $casts, чтобы указать,
     * что атрибут characteristics должен обрабатываться как JSON
     */
    protected $casts = [
        'characteristics' => 'json',
    ];

    protected $fillable = [
        'size',
        'categories',
    ];

    public function scopeProductlist($query)
    {
        $query->where('is_publish', 1)
            //->orderBy('')
            ->limit(9);
    }

    /**
     * Категория которой принадлежит товар.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Теги, принадлежащие товару.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Получить все значения атрибутов для товара.
     */
    // public function values()
    // {
    //     return $this->hasMany(Productattributevalue::class, 'product_id');
    // }

    /**
     * Получить все значения опций для товара.
     */
    public function optionValues()
    {
        return $this->belongsToMany(ProductOptionValue::class);
    }
}
