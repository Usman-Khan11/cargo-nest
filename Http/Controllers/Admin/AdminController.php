<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserLogin;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminNotification;
use Image;

class AdminController extends Controller
{

    public function dashboard()
    {
        $data['seo_title']      = "Dashboard";
        $data['seo_desc']       = "Dashboard";
        $data['seo_keywords']   = "Dashboard";
        $data['page_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }


    public function profile()
    {
        $page_title = 'Profile';
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('page_title', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $user = Auth::guard('admin')->user();

        if ($request->hasFile('image')) {
            try {
                $old = $user->image ?: null;
                $user->image = uploadImage($request->image, 'assets/admin/images/profile/', '400X400', $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Your profile has been updated.'];
        return redirect()->route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $page_title = 'Password Setting';
        $admin = Auth::guard('admin')->user();
        return view('admin.password', compact('page_title', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::guard('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password Do not match !!'];
            return back()->withErrors(['Invalid old password.']);
        }
        $user->update([
            'password' => bcrypt($request->password)
        ]);
        $notify[] = ['success', 'Password Changed Successfully.'];
        return redirect()->route('admin.password')->withNotify($notify);
    }


    public function notifications(){
        $notifications = AdminNotification::orderBy('id','desc')->paginate(getPaginate());
        $page_title = 'Notifications';
        return view('admin.notifications',compact('page_title','notifications'));
    }

    public function notificationRead($id){
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        return redirect($notification->click_url);
    }
    
    public function generalSetting(){
        $data['seo_title']      = "General Setting";
        $data['seo_desc']       = "General Setting";
        $data['seo_keywords']   = "General Setting";
        $data['page_title'] = "General Setting";
        $data['generalSetting'] = GeneralSetting::first();
        return view('admin.general_setting', $data);
    }
    
    public function saveGeneralSetting(Request $request){
        $generalSetting = GeneralSetting::first();
        $generalSetting->sitename = $request->sitename;
        $generalSetting->footer_desc = $request->footer_desc;
        $generalSetting->phone = $request->phone;
        $generalSetting->whatsapp = $request->whatsapp;
        $generalSetting->email = $request->email;
        $generalSetting->address = $request->address;
        $generalSetting->iframe = $request->iframe;
        $generalSetting->facebook = $request->facebook;
        $generalSetting->twitter = $request->twitter;
        $generalSetting->linkedin = $request->linkedin;
        $generalSetting->youtube = $request->youtube;
        $generalSetting->instagram = $request->instagram;
        $generalSetting->pinterest = $request->pinterest;
        $generalSetting->privacy_policy = $request->privacy_policy;
        $generalSetting->meta_title = $request->meta_title;
        $generalSetting->meta_keywords = $request->meta_keywords;
        $generalSetting->meta_desc = $request->meta_desc;

        if ($request->hasFile('logo')) 
        {
            $files = $request->file('logo');
            $filename = 'logo.' . $files->getClientOriginalExtension();
            $directory = 'assets/img/logo/';
            $path = $files->move($directory, $filename);
            $generalSetting->logo = $filename;
        }
        
        $generalSetting->save();
        
        $notify[] = ['success', 'Setting Updated Successfully.'];
        return redirect()->route('admin.general_setting')->withNotify($notify);
    }
}
