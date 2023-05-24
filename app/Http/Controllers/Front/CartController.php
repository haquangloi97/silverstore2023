<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function Cart() {
        $products = Product::all();
        return view('front.cart', compact('products'));
    }

    public function AddToCart($id) {
        $product = Product::find($id);

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'sale' => $product->sale,
                'img' => $product->img,
                'qty' => 1
            ];
        }

        if ($cart[$id]['qty'] > 3)
            return back();

        session()->put('cart', $cart);
        return back();
    }

    public function CartRemove($id) {
        $cart = session('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function CartPlus($id) {
        $cart = session('cart');

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }

        return back();
    }

    public function CartMinus($id) {
        $cart = session('cart');

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;
            session()->put('cart', $cart);
        }

        return back();
    }

    public function Order(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ]);

        $carts = $request->session()->get('cart');

        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->save();

        foreach ($carts as $id => $cart) {
            $product = Product::find($id);

            if ($cart['qty'] > $product->qty) {
                $order->delete();
                $request->session()->forget('cart');
                $request->session()->flash('orderFailure');
                return back();
            }

            $product->qty -= $cart['qty'];
            $product->sold += $cart['qty'];
            $product->save();

            if ($cart['sale'])
                $currentPrice = $cart['sale'];
            else
                $currentPrice = $cart['price'];

            $data = [
                'order_id' => $order->id,
                'product_id' => $id,
                'qty' => $cart['qty'],
                'price' => $currentPrice
            ];
            OrderDetail::create($data);
        }

        $request->session()->flash('orderInformation', ['orderID' => $order->id, 'orderName' => $order->name, 'orderPhone' => $order->phone, 'orderDate' => $order->created_at]);
        $request->session()->flash('orderCompleted', $carts);
        $request->session()->forget('cart');
        return back();
    }
}
