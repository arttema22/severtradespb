<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'categories',
    ];

    /**
     * Категории, принадлежащие товару.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Теги, принадлежащие товару.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
