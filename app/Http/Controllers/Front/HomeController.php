<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function HomePage() {
        $hotSale = Product::orderByRaw('price - sale DESC')->where('status', true)->limit(8)->get();
        $bestSellers = Product::orderBy('sold', 'desc')->where('status', true)->limit(8)->get();
        $featuredProducts = Product::where('featured', true)->where('status', true)->get();
        return view('front.index', compact('hotSale', 'bestSellers'))
            ->with('featuredProducts', $featuredProducts);
    }
}
