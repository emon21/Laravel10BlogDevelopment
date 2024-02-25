<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
        $setting = Setting::first();
        return view('backend.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
        $setting = Setting::first();

        // return $setting;

        $setting->site_name = $request->site_name;

        //logo upload
        if($request->has('site_logo')){
            $img_url = time().'.'.$request->site_logo->getClientOriginalextension();
            $request->site_logo->move('backend/post/', $img_url);
            $setting->site_logo = 'backend/post/'.$img_url;
            $setting->save();
        }
        $setting->about_site = $request->about_site;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->reddit = $request->reddit;
        $setting->email = $request->email;
        $setting->copyright = $request->copyright;
        $setting->save();
        // return redirect()->route('setting.index');
        $notification = array('message' => ' Setting Updated Successfully !!', 'alert-type' => 'success','timeOut' => 30000,);
        return redirect()->route('setting.index')->with($notification);
    }


}
