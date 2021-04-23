<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Mail;
class ContactUsController extends Controller
{
    public function showContactUs()
    {
        $categories = Category::all();
        return view('frontend.pages.contact_us', compact('categories'));
    }

    public function SubmitContactUsForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:50',
            'email' => 'required|email',
            'message' => 'required|min:10|max:3000',
        ]);

        Mail::send('admin.subscriber.email_template',array('body' => request('message')),function ($message) {
            $message->to('anskhilji900@gmail.com','My Blog')->subject('Contact us');
            $message->from(\request('email'),\request('name'));
        });

        return redirect()->back()->with('message','Your Message Send Successfully',);

    }

}
