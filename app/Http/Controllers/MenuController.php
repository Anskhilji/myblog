<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function ShowMenu()
    {
        $categories = Category::all();
        $menus = Setting::first();
        $menus_decode = json_decode($menus->menu);
//        dd($menus_decode);
        return view('admin.menu.show', compact('categories', 'menus_decode'));
    }

    public function StoreMenu(Request $request)
    {
        Setting::where('id',1)->update([
           'menu' => $request->data,
        ]);
        $notification = array(
            'message' => 'Menu Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
