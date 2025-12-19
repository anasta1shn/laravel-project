<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function cartView() {
        return view('cart')->with([
            'categories' => Category::get(),
        ]);
    }

    public function checkoutView() {
        if (Auth::check()) {
            isset($_COOKIE['cart']) ? $cart = json_decode($_COOKIE['cart'], true) : $cart = [];

            if (empty($cart)) {
                return redirect(route('index'));
            }

            $user = auth()->user();

            return view('cart_confirm')->with([
                'categories' => Category::get(),
                'address' => $user->address,
                'phone' => $user->phone_number
            ]);
        }

        session()->flash('warning', 'Для оформления заказа необходимо авторизоваться!');
        return redirect(route('user.login'));
    }

    public function confirmOrder(CartRequest $request) {
        isset($_COOKIE['cart']) ? $cart = json_decode($_COOKIE['cart'], true) : $cart = [];

        if (empty($cart)) {
            return redirect(route('index'));
        }

        $order = Order::create();

        foreach ($cart as $product) {
            $order->products()->attach($product['product_id']);
            $pivotRow = $order->products()->where('product_id', $product['product_id'])->first()->pivot;
            $pivotRow->quantity = $product['count'];
            $pivotRow->update();
        }

        setcookie('cart','',time()-3600,'/');
        $order->saveOrder($request->get('address'), $request->get('phone'));

        return redirect(route('user.userOrders'));
    }
}
