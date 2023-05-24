<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class CategoryManagerController extends Controller
{
    public function CreateCategory(Request $request) {
        $category = new Category();

        $request->validate([
            'inputName' => 'required|unique:categories,name|max:255'
        ], [
            'inputName.unique' => '\''.$request->inputName.'\' already exists.',
            'required' => 'The field is required.'
        ]);

        $category->name = preg_replace('/\s+/', ' ', $request->inputName);
        $category->slug = strtolower(str_replace(' ', '-', $category->name));
        $category->save();

        return back();
    }

    public function ViewCategory(string $foo = null) {
        if ($foo == null)
            $currentCategory = Category::first();
        else
            $currentCategory = Category::where('slug', $foo)->firstOrFail();

        return view('dashboard.view-category', compact('currentCategory'));
    }

    public function UpdateCategory($foo, Request $request) {
        $category = Category::where('slug', $foo)->first();

        $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$category->id
        ], [
            'name.unique' => 'Name already exists.',
            'required' => 'The field is required.'
        ]);

        $category->name = preg_replace('/\s+/', ' ', $request->name);
        $category->slug = strtolower(str_replace(' ', '-', $category->name));

        if ($request->status) {
            $category->status = true;
            foreach ($category->getProducts as $product) {
                $product->status = true;
                $product->save();
            }
        } else {
            $category->status = false;
            foreach ($category->getProducts as $product) {
                $product->status = false;
                $product->save();
            }
        }

        $category->save();

        return redirect()->route('viewCategory', ['foo' => $category->slug]);
    }

    public function DeleteCategory($id) {
        $category = Category::find($id);

        foreach ($category->getProducts as $product) {

            foreach ($product->getOrderDetails as $detail)
                $detail->delete();

            $product->delete();
        }

        $category->delete();
        return redirect()->route('viewCategory');
    }
}
