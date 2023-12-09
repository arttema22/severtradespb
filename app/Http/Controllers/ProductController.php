<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

            return view('products.show', [
                'product' => $product,
                //    'tags' => $tags,
            ]);
        }

        return view('tags.index', [
            //    'tags' => $tags
        ]);
    }
}
