<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Internallink;
use Illuminate\Http\Request;

class InternalLinksController extends Controller
{
    public function InternalLink()
    {
        $links = Internallink::first();
        return view('admin.setting.internal_links', compact('links'));
    }

    public function InternalLinkStore(Request $request)
    {
        $flight = Internallink::updateOrCreate(
            ['id' => 1],
            [
                'target' => $request->target,
                'types_of_links' => $request->type,
                'max_links_in_one_article' => $request->max,
                'fixed_percent' => $request->fx,
                'max_links_limit' => $request->max_1,
                'max_links_on_same_anchor_text' => $request->max_p,
                'max_links_on_different_anchor_text' => $request->max_d,
                'max_links_on_its_own_article' => $request->max_s,
            ]
        );

        $notification = array(
            'message' => 'Links Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
