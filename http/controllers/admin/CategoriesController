<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id')->paginate(10);

        return view('admin.categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.form')->with([
            'form_title' => 'Добавить категорию'
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form')->with([
            'form_title' => 'Редактировать категорию',
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('categories.index'));
    }
}
