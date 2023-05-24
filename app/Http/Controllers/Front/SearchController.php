<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function Search(Request $request) {
        $k = $request->k;

        if ($k) {
            $value = preg_replace('/\s+/', '%', $k);
            $products = Product::where('name', 'like', '%' . $value . '%')->where('status', true)->paginate(16);

            if ($products->total() == 1) {
                $product = $products->first();
                return redirect()->route('productDetails', ['foo1' => $product->getCategory->slug, 'foo2' => $product->slug]);
            }
        } else {
            return back();
        }

        return view('front.search', compact('products', 'k'));
    }
}
