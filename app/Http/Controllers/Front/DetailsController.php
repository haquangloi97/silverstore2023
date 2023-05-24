<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function ProductDetails($foo1, $foo2)
    {
        $product = Product::where('slug', $foo2)->firstOrFail();
        $relatedProducts = Product::where('category', $product->category)
            ->where('qty', '>', 0)
            ->where('id', '<>', $product->id)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        return view('front.details', compact('product', 'relatedProducts'));
    }
}
