<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /**
     * Получить все значения к опции.
     */
    public function values()
    {
        return $this->hasMany(ProductOptionValue::class);
    }
}
