<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = Product::productlist()->get();

        return view('components.product-list', [
            'products' => $products,
        ]);
    }
}
