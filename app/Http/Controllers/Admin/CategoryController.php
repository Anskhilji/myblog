<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function AddCategory()
    {
        return view('admin.category.create_category');
    }

    public function StoreCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:255|unique:categories,category_name',
            'slug' => 'required|min:3|max:255|',
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
        ]);

        Category::create([
            'category_name'        => Str::ucfirst($request->category_name),
            'slug'                 => Str::slug($request->slug),
            'meta_title'           => $request->meta_title,
            'meta_description'     => $request->meta_description,
            'meta_tags'            => $request->meta_tags,
            'category_schema'      => json_encode($request->category_schema),
        ]);
        $notification = array(
            'message' => 'Category Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
//dd($request->all());
        $validatedData = $request->validate([
            'category_name' => 'string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:35|',
            'slug' => 'required|min:3|max:255|',
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
        ]);

        Category::where('id',$id)->update([
            'category_name'        => Str::ucfirst($request->category_name),
            'slug'                 => Str::slug($request->slug),
            'meta_title'           => $request->meta_title,
            'meta_description'     => $request->meta_description,
            'meta_tags'            => $request->meta_tags,
            'category_schema'      => json_encode($request->category_schema),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


// when delete category, the id of category convert into general category
    public function DeleteCategory(Category $category)
    {
        $verify = Post::whereRaw("FIND_IN_SET(?, category_id) > 0", $category->id)->get();
//        dd($verify);
        if (count($verify) > 0){
            $multiplied = $verify->map(function ($item, $key) {
                return explode(',', $item->category_id);
            });
//            dd($multiplied);
            $multiplied2 = json_decode(json_encode($multiplied , true));
            foreach ($multiplied2 as $key => $val){
                if (in_array(1, $val)){
                    $i = array_search( $category->id , $val);
                    unset($val[$i]);
                }else{
                    $i = array_search( $category->id , $val);
                    $val[$i] = 1;
                }
                $multiplied3[] = $val;
            }

            $collection = collect($multiplied3);
            $convertToString = $collection->map(function ($item, $key) {
                return implode(',', $item);
            });

            foreach ($verify as $key => $value){
                Post::where("id", $value->id)->update(['category_id'=>$convertToString[$key]]);
            }
            $category->delete();
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
        }else{
            $category->delete();
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
//
    }
}
