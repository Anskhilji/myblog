<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
           'category' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:35|unique:categories,category_name',
        ]);

        Category::create([
            'category_name' => Str::ucfirst($request->category)
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

        $validatedData = $request->validate([
            'category' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:35|',
        ]);

        Category::where('id', $id)->update([
            'category_name' => Str::ucfirst($request->category)
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteCategory(Category $category)
    {
       $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
