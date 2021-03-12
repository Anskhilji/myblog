<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function Login()
    {
        if (Auth::guard()->check()){
            return redirect()->route('dashboard');
        }
        return view('admin.auth.login');
    }
    public function AdminLogin(Request $request)
    {

        $validatedData = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
        ]);

        $check = User::first();
        $email = decrypt($check->email);
        $hashedPassword = $check->password;

        if ($email == $request->email && Hash::check($request->password,$hashedPassword)){
                Auth::login($check);
                return redirect()->route('dashboard');
        }else{
            $notification = array(
                'message' => 'incorrect login credentials',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
}
