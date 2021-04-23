<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.general_setting', compact('setting'));
    }

    public function StoreSetting(Request $request)
    {
        $validatedData = $request->validate([
           'logo_image' => 'nullable',
           'favicon' => 'nullable',
           'og_image' => 'nullable',
           'smtp_email' => 'nullable|email',
           'smtp_password' => 'nullable|max:50',
           'google_analytic' => 'nullable|max:2500',
           'web_master' => 'nullable|max:2500',
           'bing_master' => 'nullable|max:2500',
        ]);
          Setting::first()->update([
              'logo_image' => $request->logo_image,
              'favicon' => $request->favicon,
              'og_image' => $request->og_image,
//              'smtp_email' => $request->smtp_email,
//              'smtp_password' => encrypt($request->smtp_password),
              'google_analytic' => $request->google_analytic,
              'web_master' => $request->web_master,
              'bing_master' => $request->bing_master,
          ]);
          $notification = array(
              'message' => 'Setting Updated Successfully!',
              'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);


    }
}
