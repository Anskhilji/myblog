<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Home;
use Illuminate\Http\Request;
use DB;
class CMSController extends Controller
{
    public function ShowHome()
    {
        $where = trim(request()->segment(2));
        $home = Home::where("page_title",$where)->first();
        return view('admin.cms.home', compact('home'));
    }

    public function StoreHome(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
        ]);
        Home::updateOrCreate(
            ["page_title"=>$request->page_title],[
           'page_title' => $request->page_title,
           'meta_title' => $request->meta_title,
           'meta_title' => $request->meta_title,
           'meta_description' => $request->meta_description,
           'meta_tags' => $request->meta_tags,
           'home_schema' => json_encode($request->home_schema),
           'og_image' => request('og-image'),
        ]);
        $notification = array(
            'message' => 'Home Meta Settings Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//contact
    public function ShowContact()
    {
        $where = trim(request()->segment(2));
        $contact = Home::where('page_title', $where)->first();
        return view('admin.cms.contact', compact('contact'));
    }

    public function StoreContact(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',

        ]);
        Home::updateOrCreate(
        ["page_title"=>$request->page_title],[
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'home_schema' => json_encode($request->home_schema),
            'og_image' => request('og-image'),
        ]);
        $notification = array(
            'message' => 'Contact Meta Settings Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//    Privacy Policy

    public function ShowPrivacyPolicy()
    {
        $where = trim(request()->segment(2));

        $privacy_policy = Home::where('page_title', $where)->first();
        return view('admin.cms.privacy_policy', compact('privacy_policy'));
    }

    public function PrivacyPlicy()
    {
        $categories = Category::all();
        $where = trim(request()->segment(1));
        $privacy_policy = Home::where('page_title', $where)->first();
        return view('frontend.pages.privacy_policy', compact('categories', 'privacy_policy'));
    }

    public function StorePrivacyPolicy(Request $request)
    {

        $validatedData = $request->validate([
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
            'privacy_policy_detail' => 'required|max:5000',
        ]);
        Home::updateOrCreate(
            ["page_title"=>$request->page_title],[
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'home_schema' => json_encode($request->home_schema),
            'og_image' => request('og-image'),
            'detail' => $request->privacy_policy_detail,
        ]);
        $notification = array(
            'message' => 'Privacy Policy Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//    Terms & Condition
    public function TermsCondition()
    {
        $categories = Category::all();
        $where = trim(request()->segment(1));
        $terms_condtion = Home::where('page_title', $where)->first();
        return view('frontend.pages.terms_&_condition', compact('categories', 'terms_condtion'));
    }

    public function ShowTermCondition()
    {
        $where = trim(request()->segment(2));
        $terms_condition = Home::where('page_title', $where)->first();
        return view('admin.cms.terms_condition', compact('terms_condition'));
    }

    public function StoreTermCondition(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
            'terms_condition_detail' => 'required|max:5000',
        ]);
        Home::updateOrCreate(
            ["page_title"=>$request->page_title],[
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'home_schema' => json_encode($request->home_schema),
            'og_image' => request('og-image'),
            'detail' => $request->terms_condition_detail,
        ]);
        $notification = array(
            'message' => 'Terms & Condition Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

//    faqs

    public function Faqs()
    {
        $faqs = Faq::orderBy('order','asc')->get();
        $categories = Category::all();
        return view('frontend.pages.faqs', compact('categories', 'faqs'));
    }

    public function ShowFaqs()
    {
        $faqs = Faq::orderBy('order','asc')->get();
        return view('admin.cms.faqs', compact('faqs'));
    }

    public function StoreFaqs(Request $request)
    {
        $validatedData = $request->validate([
           'question' => 'required',
           'ans' => 'required',
        ],
        [
            'ans.required' => 'answer field is required',
        ]);

        Faq::create([
            'question' => $request->question,
            'ans' => $request->ans
        ]);

        $notification = array(
          'message' => 'faqs inserted successfully',
          'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function StoreFaqsOrder(Request $request)
    {
        $orders = $request->order;
        foreach ($orders as $k => $v){
            $faq = Faq::findOrFail($v);
            if(isset($faq->id)){
                $faq->order = $k;
                $faq->save();
            }
        }
        $notification = array(
            'message' => 'Faqs Order Changed successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

//    faqs list

    public function FaqsList()
    {
        $faqs = Faq::all();

        return view('admin.cms.faqs_list', compact('faqs'));
    }

    public function FaqsDelete(Faq $faq)
    {
        $faq->delete();
        $notification = array(
            'message' => 'Faqs deleted ShowFaqssuccessfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function FaqsEdit($id)
    {
        $faqs = Faq::find($id);
        return view('admin.cms.faqs_edit', compact('faqs'));
    }

    public function FaqsUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'ans' => 'required',
        ],
            [
                'ans.required' => 'answer field is required',
            ]);


        Faq::where('id',$id)->update([
           'question' => $request->question,
           'ans' => $request->ans,
        ]);
        $notification = array(
            'message' => 'Faqs updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('faqs.list')->with($notification);
    }

//    faqs meta setting

    public function FaqsMeta()
    {
        $where = trim(\request()->segment(2));
        $faqs = Home::where('page_title',$where)->first();
        return view('admin.cms.faqs_meta', compact('faqs'));
    }

    public function StoreFaqsMeta(Request $request)
    {
        $validatedData = $request->validate([
            'meta_title' => 'required|min:3|max:255|',
            'meta_description' => 'nullable|min:3|max:500|',
            'meta_tags' => 'nullable|min:2|max:255|',
        ]);

        Home::updateOrCreate(
            ['page_title' => $request->page_title],[
            'page_title' => $request->page_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,
            'home_schema' => json_encode($request->faqs_schema),
            'og_image' => $request->og_image,
        ]);
        $notification = array(
            'message' => 'Faqs meta setting updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
