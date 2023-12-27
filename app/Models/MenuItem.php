<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'title',
        'url',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
