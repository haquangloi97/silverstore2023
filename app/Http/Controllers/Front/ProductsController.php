<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    //
    public function Products($foo) {
        $category = Category::where('slug', $foo)->firstOrFail();
        $products = Product::where('category', $category->id)->where('status', true)->paginate(16);
        return view('front.products', compact('category', 'products'));
    }
}
