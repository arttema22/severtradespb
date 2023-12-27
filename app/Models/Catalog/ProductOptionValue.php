<?php

namespace App\Models\Catalog;

use App\Models\Catalog\ProductOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOptionValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'option_id'
    ];

    /**
     * Получить опцию для значения.
     */
    public function option()
    {
        return $this->belongsTo(ProductOption::class);
    }

    /**
     * Получить товары с данной опцией.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
