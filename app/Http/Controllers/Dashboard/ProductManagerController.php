<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductManagerController extends Controller
{
    public function Index() {
        return view('dashboard.index');
    }

    public function ListProducts() {
        $products = Product::all();
        return view('dashboard.view-product', compact('products'));
    }

    public function ViewNewProduct() {
        return view('dashboard.new-product');
    }

    public function CreateNewProduct(Request $request) {
        $product = new Product();

        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|max:255'
        ], [
            'name.unique' => 'Name already exists.',
            'required' => 'The field is required.'
        ]);

        $product->name = preg_replace('/\s+/', ' ', $request->name);
        $product->slug = strtolower(str_replace(array(' ', '/', '.', ','), '-', $this->Convert($product->name)));
        $product->price = $request->price;
        $product->sale = $request->sale;

        if ($request->qty) {
            $product->qty = $request->qty;
        }
        $product->description = $request->description;
        $product->category = $request->category;

        if ($request->uploadImage) {
            $file = $request->uploadImage;
            $fileName = $product->slug.'.'.$file->extension();
            $file->move(public_path('front/img'), $fileName);
            $product->img = $fileName;
        }

        if ($request->featured) {
            $product->featured = true;
        }

        $product->save();
        return back()->with('success', 'Thêm mới thành công!');
    }

    public function ViewProduct($foo) {
        $product = Product::where('slug', $foo)->firstOrFail();
        return view('dashboard.edit-product', compact('product'));
    }

    public function UpdateProduct($foo, Request $request) {
        $product = Product::where('slug', $foo)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|max:255|unique:products,name,'.$product->id,
            'price' => 'required|max:255',
            'qty' => 'required'
        ], [
            'name.unique' => 'Name already exists.',
            'required' => 'The field is required.'
        ]);

        $product->name = preg_replace('/\s+/', ' ', $request->name);
        $product->slug = strtolower(str_replace(array(' ', '/', '.', ','), '-', $this->Convert($product->name)));
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->category = $request->category;

        if ($request->uploadImage) {
            if (isset($product->img)) {
                $oldFile = public_path('front/img/'.$product->img);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $file = $request->uploadImage;
            $fileName = $product->slug.'.'.$file->extension();
            $file->move(public_path('front/img'), $fileName);
            $product->img = $fileName;
        }

        if ($request->status)
            $product->status = true;
        else
            $product->status = false;

        if ($request->featured)
            $product->featured = true;
        else
            $product->featured = false;

        $product->save();

        return redirect()->route('viewProduct', ['foo' => $product->slug]);
    }

    public function DeleteProduct($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return back();
    }
}
