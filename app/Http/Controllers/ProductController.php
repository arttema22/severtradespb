<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(?string $slug = null)
    {
        // $tags = Tag::query()
        //     ->where('type', 1)
        //     ->where('is_publish', 1)
        //     ->get();

        if ($slug) {
            $product = Product::query()
                ->where('slug', $slug)
                ->where('is_publish', 1)
                ->first();

            $categories = Category::query()
                ->where('category_id', null)
                ->where('type', 1)
                ->where('is_publish', 1)
                ->get();

            return view('products.show', [
                'product' => $product,
                'categories' => $categories,
            ]);
        }

        return view('tags.index', [
            //    'tags' => $tags
        ]);
    }
}
