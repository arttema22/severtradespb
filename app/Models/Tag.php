<?php

namespace App\Models;

use App\Models\Catalog\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    /**
     * Товары, принадлежащие тегу.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
