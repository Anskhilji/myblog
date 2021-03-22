<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use DB;
use Mail;

class SubscriberController extends Controller
{
    public function SubscriberList()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscriber.show_subscribers', compact('subscribers'));
    }

    public function SubscriberStore(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'name' => 'required|min:2|max:25|string|regex:/^[a-zA-ZÑñ\s]+$/',
           'email' => 'required|email|unique:subscribers,email',
        ],[
            'name.regex' => 'only character are allowed',
        ]);
        if($validation->fails()){
            return response()->json([
               'name' => $validation->errors()->get('name'),
               'email' => $validation->errors()->get('email'),
            ]);
        }else{
            Subscriber::create([
                'name' => $request->name,
                'email' => $request->email,
            ]);
           return response()->json([
                   'message' => "Thanks for your subscription 🙂",
                   'alert' => "success"
                ]);
            }

    }

    public function SubscriberEdit($id)
    {
        $subscriber = Subscriber::where('id',$id)->first();
        return view('admin.subscriber.edit', compact('subscriber'));

    }

    public function SubscriberUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
           'name' => 'required|string|regex:/^[a-zA-ZÑñ\s]+$/|min:3|max:50',
           'email' => 'required|email',
        ]);

        Subscriber::where('id', $id)->update([
           'name' => $request->name,
           'email' => $request->email,
        ]);

        $notification = array(
            'message'       => 'Subscriber Updated Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function SubscriberDelete(Subscriber $subscriber)
    {
        $subscriber->delete();

        $notification = array(
            'message'       => 'Subscriber Deleted Successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);
    }

//    Send Email
    public function SendEmailShowList()
    {
        $subscribers = Subscriber::all();
       return view('admin.subscriber.send_email', compact('subscribers'));
    }


    public function SendEmailToSubscriberd(Request $request)
    {
        $validatedData = $request->validate([
           'selected_email' => 'required',
           'email_subject' => 'required|min:2|max:255',
            'email_detail' => 'required|min:20|max:2500'
        ],[
            'selected_email.required' => 'Please select an email'
        ]);
        if ($request->has('select_all')){

            $subscribers = Subscriber::all();
            $comma_seperated = array();
            $comma_names = array();
            foreach ($subscribers as $sub){
                $comma_seperated[] = $sub->email;
                $comma_names[] = $sub->name;

                Mail::send('admin.subscriber.email_template',array('body' => request('email_detail')),function ($message) use ($sub) {
                    $message->to($sub->email,$sub->name)->subject(request('email_subject'));
                    $message->from('anskhilji900@gmail.com','My Blog');
                });
            }

            $notification = array(
                'message'       => 'Email Send Successfully',
                'alert-type'    => 'success'
            );

            return redirect()->back()->with($notification);


        }

        if ($request->has('selected_email')){
            $subscribers = DB::table('subscribers')
                ->whereIn('id', $request->selected_email)
                ->get();

            if (count($subscribers)){
                foreach ($subscribers as $sub){

                    Mail::send('admin.subscriber.email_template',array('body' => request('email_detail')),function ($message) use ($sub) {
                        $message->to($sub->email,$sub->name)->subject(request('email_subject'));
                        $message->from('anskhilji900@gmail.com','My Blog');
                    });
                }

                $notification = array(
                    'message'       => 'Email Send Successfully',
                    'alert-type'    => 'success'
                );

                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message'       => 'Email is Not Exist',
                    'alert-type'    => 'warning'
                );

                return redirect()->back()->with($notification);
            }

        }




    }

}
