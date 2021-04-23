<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class AuthorController extends Controller
{
    public function ShowAuthor()
    {
        $authors = Author::all();
        return view('admin.author.show', compact('authors'));
    }

    public function CreateAuthor()
    {
        return view('admin.author.create');
    }

    public function StoreAuthor(Request $request)
    {
       $validatedData = $request->validate([
          'name' => 'required|min:2|max:30',
          'slug' => 'required|min:2|max:30',
          'meta_title' => 'required|min:2|max:100',
          'author_detail' => 'required|min:20|max:2000'
       ]);

       Author::create([
          'name'                => $request->name,
          'slug'                => Str::slug($request->slug),
          'meta_title'          => $request->meta_title,
          'meta_description'    => $request->meta_description,
          'meta_tags'           => $request->meta_tags,
          'author_schema'       => json_encode($request->author_schema),
          'detail'              => $request->author_detail,
          'cover_image'         => $request->cover_image,
          'og_image'            => $request->og_image,
       ]);

       $notification = array(
         'message' => 'Author inserted successfully',
         'alert-type' => 'success',
       );

       return redirect()->back()->with($notification);
    }

    public function EditAuthor($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.author.edit', compact('author'));
    }

    public function UpdateAuthor(Request $request, $id)
    {$validatedData = $request->validate([
        'name' => 'required|min:2|max:30',
        'slug' => 'required|min:2|max:30',
        'meta_title' => 'required|min:2|max:100',
        'author_detail' => 'required|min:20|max:2000'
    ]);

        Author::where('id', $id)->update([
            'name'                => $request->name,
            'slug'                => Str::slug($request->slug),
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'meta_tags'           => $request->meta_tags,
            'author_schema'       => json_encode($request->author_schema),
            'detail'              => $request->author_detail,
            'cover_image'         => $request->cover_image,
            'og_image'            => $request->og_image,
        ]);

        $notification = array(
            'message' => 'Author updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('show.author')->with($notification);
    }
    public function DeleteAuthor(Author $author)
    {
        $check = Post::whereRaw("FIND_IN_SET(?, author_id) > 0", $author->id)->get();
        if (count($check) > 0){
            foreach ($check as $key=>$value){
                if ($value->author_id != 1){
                    Post::where('author_id',$value->author_id)->update([
                        'author_id' => 1
                    ]);
                }
            }
            $author->delete();
            $notification = array(
                'message' => 'Author Deleted successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            $author->delete();
            $notification = array(
                'message' => 'Author Deleted successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

    }


//    Author page id or detail pages
    public function AuthorShow()
    {
        $author_id = get_postid("post_id");
        $page_id = get_postid("page_id");
        $slug = get_postid("slug");
        if($page_id != 3){
            return redirect()->route('404');
        }
        $author = Author::where("id",$author_id)->first();

        if ($author_id){
            $posts = DB::table('authors')
                ->join('posts', 'authors.id', 'posts.author_id')
                ->select('posts.*','authors.name','authors.detail','authors.cover_image','authors.slug as auth_slug','authors.id as auth_id')
                ->where("authors.id",$author->id)->latest()->paginate(6);
        }
        if(!isset($author->id)){
            return redirect()->route('404');
        }
        if($slug != $author->slug){
            return redirect(route("base_url")."/".$author->slug."-3".$author->id);
        }

        $categories = Category::all();
       return view('frontend.author.show_author', compact('categories','author','posts'));
    }

}
