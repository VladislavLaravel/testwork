<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Category;
use Auth;
use Validator;

class CategoryController extends Controller
{

    public function index()
    {
        return view('categories.list', ['categories' => Category::all()->sortBy('id')]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        if($request->file('image'))
            $category->image = $request->file('image')->store('upload', 'public');

        $category->save();

        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->all());

        if($request->file('image'))
            $category->image = $request->file('image')->store('upload', 'public');

        $category->save();


        return redirect()->route('category.index');
    }

}
