<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productattributevalue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_text',
    ];

    /**
     * Получить атрибут, которому принадлежит значение.
     */
    public function attribute()
    {
        return $this->belongsTo(Productattribute::class);
    }

    /**
     * Получить товар, которому принадлежит значение.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
