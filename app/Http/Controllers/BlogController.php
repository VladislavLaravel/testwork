<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;;
use App\Post;
use Auth;
use Validator;

class BlogController extends Controller
{   
    //  list of all categories

    public function index()
    {
        $categories = Category::all()->sortBy('id');

        return view('blog.categories_list', compact('categories'));
    }

    //  list of all categories  posts
    public function posts($id)
    {
        $category = Category::with('posts', 'posts.category', 'posts.user')->findorfail($id);

        return view('blog.posts_list', compact('category'));
    }

    public function post($id)
    {   
        // find out  users IP and check count unique users for our post

        $visitor_ip     = $_SERVER['REMOTE_ADDR'];
        $count_visitors = \Cache::tags($id)->get('count_visitors') == NULL ? 1 : \Cache::tags($id)->get('count_visitors');

        // add new unique users if ip is unique 

        if(\Cache::tags($id)->get($visitor_ip) == null){

            $count_visitors = \Cache::tags($id)->get('count_visitors' ) + 1;
            \Cache::tags($id)->forever($visitor_ip, 'ip');
            
        }

        \Cache::tags($id)->forever('count_visitors', $count_visitors);

        //  add new view for our post

        $count_views = \Cache::tags($id)->get('count_views') == NULL ? 1 : \Cache::tags($id)->get('count_views') + 1;
        \Cache::tags($id)->forever('count_views', $count_views);
        
        $post = Post::with('category', 'user')->findorfail($id);

        return view('blog.post', compact('post', 'count_views', 'count_visitors'));
    }
    

}
