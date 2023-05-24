<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderManagerController extends Controller
{
    public function ListOrders() {
        $orders = Order::all();
        return view('dashboard.view-order', compact('orders'));
    }

    public function ViewOrder($id) {
        $order = Order::find($id);
        return view('dashboard.order-details', compact('order'));
    }

    public function DeleteOrder($id) {
        $order = Order::find($id);
        foreach ($order->getDetails as $detail)
            $detail->delete();
        $order->delete();
        return back();
    }
}
