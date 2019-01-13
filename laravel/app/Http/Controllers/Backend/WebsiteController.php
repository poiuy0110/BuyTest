<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Website;

class WebsiteController extends Controller
{
    //
    public function edit()
    {
        $website = Website::find(1);
        if (empty($website))
            return view('backend.website.edit');
        else 
            return view('backend.website.edit', compact('website'));
    }
     
    public function update(Request $request)
    {
        $website = Website::find(1);
        if (empty($website)) {
            // 沒有資料 -> 新增
            $website = new Website;
        }
        $website->title = $request->input('title');
        $website->subtitle = $request->input('subtitle');
        $website->footer = $request->input('footer');
        $website->save();
        return redirect()->route('admin.website.edit');
    }


}
