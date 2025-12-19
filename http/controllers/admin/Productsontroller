<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id')->paginate(5);

        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('id')->get();

        return view('admin.products.form')->with([
            'form_title' => 'Добавить продукцию',
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $params = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
        }

        Product::create($params);

        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('id')->get();

        return view('admin.products.form')->with([
            'form_title' => 'Редактировать продукцию',
            'categories' => $categories,
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        $currentImage = $product->getAttributes()['image'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
            $params['image'] = $path;
            Storage::delete($currentImage);
        } else {
            $params['image'] = $currentImage;
        }

        $product->update($params);

        return redirect(route('products.index'));
    }
}
