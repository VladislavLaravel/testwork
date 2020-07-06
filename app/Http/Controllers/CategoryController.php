<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Validator;

class CategoryController extends Controller
{   
    // validetions rules

    protected $rules = [
        'name'        => 'required|max:20',
        'description' => 'required|max:50',
    ];

    public function index()
    {
        $categories = Category::all()->sortBy('id');

        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        // check validation and create new category

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->file('image'))
            $path = $request->file('image')->store('upload', 'public');
        else
            $path = '';

        $category = Category::create(array(
            'name'         => $request->name,
            'description'  => $request->description,
            'image'        => $path,
        ));

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::findorfail($id);

        $category->name        = $request->name;
        $category->description = $request->description;

        if($request->file('image'))
            $category->image = $request->file('image')->store('upload', 'public');

        $category->save();


        return redirect()->route('category.index');
    }

}
