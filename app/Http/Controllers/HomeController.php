<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Catalog\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $categories = Category::where('category_id', null)->get();

        $products = Product::query()
            //->homepage()
            ->get();

        return view('welcome', compact('products', 'categories'));
    }
}
