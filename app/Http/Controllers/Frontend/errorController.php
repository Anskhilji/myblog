<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class errorController extends Controller
{
    public function errorRedirect()
    {
        return view('frontend.404');
    }
}
