<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function ShowPost()
    {
        $posts = Post::get();
        return view('admin.post.show', compact('posts'));
    }

    public function CreatePost()
    {
        $categories = Category::all();
        return view('admin.post.create_post', compact('categories'));
    }

    public function StorePost(Request $request)
    {
//        dd($request->all());
       $validatedData = $request->validate([
          'category_id' => 'required',
          'post_title' => 'required|string|min:3|max:255|',
          'slug' => 'required|min:3|max:255|',
          'meta_title' => 'required|min:3|max:255|',
          'meta_description' => 'nullable|min:3|max:500|',
          'meta_tags' => 'nullable|min:2|max:255|',
          'post_detail' => 'required|',
          'post_cover_image' => 'required|mimes:jpg,jpeg,png',
          'post_og_image' => 'nullable|mimes:jpg,jpeg,png',
       ],[
           'category_id.required' => 'Please select category',
       ]);

        if ($request->hasFile('post_cover_image')){
            $cover_image = $request->file('post_cover_image');
            $image_gen = hexdec(uniqid());
            $image_ext = strtolower($cover_image->getClientOriginalExtension());
            $image_name = $image_gen.'.'.$image_ext;
            $last_cover_image =  'images/'.$image_name;
            $request->post_cover_image->move(public_path('images'), $image_name);
            $data['post_cover_image']       = $last_cover_image;

        }
        if ($request->hasFile('post_og_image')){
            $og_image = $request->file('post_og_image');
            $image_gen = hexdec(uniqid());
            $image_ext = strtolower($og_image->getClientOriginalExtension());
            $image_name = $image_gen.'.'.$image_ext;
            $last_og_image =  'images/'.$image_name;

            $request->post_og_image->move(public_path('images'), $image_name);
            $data['post_og_image']       = $last_og_image;

        }
       $data['category_id']         = implode(',',$request->category_id);
       $data['post_title']          = $request->post_title;
       $data['slug']                = Str::slug($request->slug);
       $data['meta_title']          = $request->meta_title;
       $data['meta_description']    = $request->meta_description;
       $data['meta_tags']           = $request->meta_tags;
       $data['post_schema']         = json_encode($request->post_schema);
       $data['post_detail']         = $request->post_detail;
       if ($request->has('post_status')){
           $data['post_status']         = $request->post_status;
       }else{
           $data['post_status']         = 0;
       }
        $created = Post::create($data);
        if ($created){
            $notification = array(
                'message' => 'Post Created successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function PostEdit($id)
    {
        $categories = Category::all();
        $posts = Post::where('id',$id)->first();

        return view('admin.post.edit_post', compact('categories', 'posts'));
    }

    public function PostUpdate(Request $request, $id)
    {
//        {{ dd($request->all()); }}
        $validatedData = $request->validate([
            'category_id' => 'required',
            'post_title' => 'required|string|min:3|max:255|',
            'slug' => 'required|min:3|max:255|',
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
            'post_detail' => 'required|',
            'post_cover_image' => 'nullable|mimes:jpg,jpeg,png',
            'post_og_image' => 'nullable|mimes:jpg,jpeg,png',
        ],[
            'category_id.required' => 'Please select category',
        ]);
        $old_post_cover_image = $request->old_post_cover_image;
        $old_post_og_image = $request->old_post_og_image;
        if ($request->hasFile('post_cover_image')){
            $cover_image = $request->file('post_cover_image');
            $image_gen = hexdec(uniqid());
            $image_ext = strtolower($cover_image->getClientOriginalExtension());
            $image_name = $image_gen.'.'.$image_ext;
            $last_cover_image =  'images/'.$image_name;
            $request->post_cover_image->move(public_path('images'), $image_name);
            $data['post_cover_image']       = $last_cover_image;

            unlink(public_path($old_post_cover_image));
        }
        if ($request->hasFile('post_og_image')){
            $og_image = $request->file('post_og_image');
            $image_gen = hexdec(uniqid());
            $image_ext = strtolower($og_image->getClientOriginalExtension());
            $image_name = $image_gen.'.'.$image_ext;
            $last_og_image =  'images/'.$image_name;

            $request->post_og_image->move(public_path('images'), $image_name);
            $data['post_og_image']       = $last_og_image;
            if (!$old_post_og_image == null)  {
                unlink(public_path($old_post_og_image));
            }

        }
        $data['category_id']         = implode(',',$request->category_id);
        $data['post_title']          = $request->post_title;
        $data['slug']                = Str::slug($request->slug);
        $data['meta_title']          = $request->meta_title;
        $data['meta_description']    = $request->meta_description;
        $data['meta_tags']           = $request->meta_tags;
        $data['post_schema']         = json_encode($request->post_schema);
        $data['post_detail']         = $request->post_detail;
        if ($request->has('post_status')){
            $data['post_status']         = $request->post_status;
        }else{
            $data['post_status']         = 0;
        }
        $created = Post::where('id',$id)->update($data);
        if ($created){
            $notification = array(
                'message' => 'Post updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'something went wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

//    Publish Or Draft
    public function PostDraft($id)
    {
        Post::where('id',$id)->update([
           'post_status' => 0
        ]);
        $notification = array(
            'message' => 'Post Drafted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function PostPublish($id)
    {
        Post::where('id',$id)->update([
           'post_status' => 1
        ]);
        $notification = array(
            'message' => 'Post Published Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//    ALl Draft
    public function PostAllDraft()
    {
        $posts = Post::where('post_status', 0)->get();
        return view('admin.post.all_draft', compact('posts'));
    }

// All Public

    public function PostAllPublish()
    {
        $posts = Post::where('post_status', 1)->get();
        return view('admin.post.all_publish', compact('posts'));
    }

// Delete Post
    public function PostDelete(Post $post)
    {
        $post->delete();
        $notification = array(
            'message' => 'Post deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
