<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(?string $slug = null)
    {
        if ($slug) {
            $category = Category::query()
                ->where('slug', $slug)
                ->where('type', 1)
                ->where('is_publish', 1)
                ->first();

            $categories = Category::query()
                ->where('category_id', $category->id)
                ->where('type', 1)
                ->where('is_publish', 1)
                ->get();

            return view('categories.show', [
                'category' => $category,
                'categories' => $categories
            ]);
        }

        $categories = Category::query()
            ->where('category_id', null)
            ->where('type', 1)
            ->where('is_publish', 1)
            ->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }
}
