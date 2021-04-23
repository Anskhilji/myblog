<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use function PHPUnit\Framework\matches;

class PostDetailController extends Controller
{
    public function PostDetail()
    {
        $post_id = get_postid("post_id");
        $page_id = get_postid("page_id");
        $slug = get_postid("slug");
        if($page_id != 2){
            return redirect()->route('404');
        }
        $categories= Category::all();
        $count = Post::where("id",$post_id)->first();
            if ($count){
                $post_view_count = $count->post_view;
                Post::where("id",$post_id)->update([
                    'post_view' => $post_view_count + 1,
                ]);
            }

            $post = DB::table('posts')
                ->join('authors', 'posts.author_id', 'authors.id')
                ->select('posts.*','authors.name','authors.detail','authors.cover_image','authors.slug as auth_slug','authors.id as auth_id')
                ->where("posts.id",$post_id)->where('posts.post_status',1)->first();

        if(!isset($post->id)){
            return redirect()->route('404');
        }
        if($slug != $post->slug){
            return redirect(route("base_url")."/".$post->slug."-2".$post->id);
        }

       return view('frontend.post_detail', compact('categories','post'));
    }
}
