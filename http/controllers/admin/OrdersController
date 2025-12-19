<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '!=', 0)->orderBy('id')->paginate(10);

        return view('admin.orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function edit(Order $order)
    {
        return view('admin.orders.form')->with([
            'form_title' => 'Редактировать заказ',
            'order' => $order
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->update(['status' => $request->get('status')]);
        return redirect(route('orders.index'));
    }
}
