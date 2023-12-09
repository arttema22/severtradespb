<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $categories = Category::where('category_id', null)->get();

        $products = Product::query()
            //->with(['categories', 'tags'])
            //->withComments()
            //->withLikes()
            //->published()
            ->latest()
            ->take(6)
            ->get();

        // dd($categories);

        return view('welcome', compact('products', 'categories'));
    }
}
