<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $posts = Post::where('post_status',1)->latest()->paginate(6);

        return view('frontend.index', compact('categories', 'posts'));
    }
}
