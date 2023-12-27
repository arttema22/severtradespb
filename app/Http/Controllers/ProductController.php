<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Catalog\Product;

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

            $product->load(['optionValues.option']);
            $options = $product->optionValues->mapToGroups(function ($item) {
                return [$item->option->title => $item];
            });

            return view('catalog.products.show', [
                'product' => $product,
                'categories' => $categories,
                'options' => $options,
            ]);
        }

        return view('tags.index', [
            //    'tags' => $tags
        ]);
    }
}
