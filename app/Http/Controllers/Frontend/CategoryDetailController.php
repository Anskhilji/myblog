<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryDetailController extends Controller
{
    public function CategoryIndex()
    {
        $post_id = get_postid("post_id");
        $page_id = get_postid("page_id");
        $slug = get_postid("slug");
        if($page_id != 1){
            return redirect()->route('404');
        }
        $category = Category::where("id",$post_id)->first();
        if (!isset($category->id)){
            return redirect()->route('404');
        }
        if($slug != $category->slug){
            return redirect(route("base_url")."/".$category->slug."-1".$category->id);
        }

        $posts = Post::whereRaw("FIND_IN_SET(?, category_id) > 0", $post_id)->where('post_status',1)->paginate(6);

        $categories= Category::all();
        return view('frontend.category_detail', compact('categories','posts'));
    }
}
