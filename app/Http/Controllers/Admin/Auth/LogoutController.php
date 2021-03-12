<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function AdminLogout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Admin logout successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }
}
