<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
use Auth;
use Validator;

class PostController extends Controller
{   
    // validetions rules

    protected $rules = [
        'name'        => 'required|max:20',
        'description' => 'required|max:50',
        'text'        => 'required|max:500',
        'status'      => 'required|max:20',
        'category'    => 'required|numeric',
    ];

    public function index()
    {
        $posts = Post::with('user', 'category')->get()->sortBy('id');

        return view('posts.list', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->file('image'))
            $path = $request->file('image')->store('upload', 'public');
        else
            $path = '';
        
        $post = Post::create(array(
            'name'         => $request->name,
            'description'  => $request->description,
            'text'         => $request->text,
            'image'        => $path,
            'user_id'      => Auth::user()->id,
            'category_id'  => $request->category,
            'status'       => $request->status,
        ));

        return redirect()->route('category.index');
    }

    public function edit($id)
    {   
        $post       = Post::findorfail($id);
        $categories = Category::all();

        return view('posts.edit', compact('categories', 'post'));
    }

    public function update(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::findorfail($id);

        $post->name         = $request->name;
        $post->description  = $request->description;
        $post->text         = $request->text;
        $post->user_id      = Auth::user()->id;
        $post->category_id  = $request->category;
        $post->status       = $request->status;

        if($request->file('image'))
            $post->image = $request->file('image')->store('upload', 'public');

        $post->save();

        return redirect()->route('post.index');
    }

}
