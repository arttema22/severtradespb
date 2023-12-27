<?php

namespace App\Models\Catalog;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Productattribute extends Model
{
    use HasFactory;

    /**
     * Категория к которой привязаны атрибуты.
     */
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Получить все значения для атрибута.
     */
    public function values()
    {
        return $this->hasMany(Productattributevalue::class, 'attribute_id');
    }
}
