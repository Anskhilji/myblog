<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ShowPost()
    {
        return view('admin.post.show');
    }

    public function CreatePost()
    {
        return view('admin.post.create_post');
    }
}
