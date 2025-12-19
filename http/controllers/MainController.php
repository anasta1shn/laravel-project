<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function index() {
        return view('index')->with([
            'categories' => Category::orderBy('id')->get(),
            'products' => $this->latestProducts(8)
        ]);
    }

    public function categoryView($id) {
        $category = Category::where('id', $id)->first();
        $categories = Category::orderBy('id')->get();
        $products = $category->products()->paginate(4);

        return view('category')->with([
            'category' => $category,
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function latestProducts($limit = 0) {
        $products = Product::get()->sortDesc();
        return $limit ? $products->slice(0, $limit) : $products;
    }

    public function userOrdersView() {
        return view('auth.user_orders')->with([
            'orders' => Order::where('user_id', '=', auth()->id())->get()->sortDesc(),
            'categories' => Category::orderBy('id')->get()
        ]);
    }

    public function searchView() {
        if (!isset($_GET['search'])) {
            return redirect(route('index'));
        }

        $products = Product::where('title', 'like', '%' . $_GET['search'] . '%')
            ->orWhere('description', 'like', '%' . $_GET['search'] . '%')
            ->paginate(4)->appends(['search' => $_GET['search']]);

        $categories = Category::orderBy('id')->get();

        return view('search')->with([
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function productView($id) {
        $product = Product::where('id', $id)->first();
        $categories = Category::orderBy('id')->get();

        return view('product')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }
}
