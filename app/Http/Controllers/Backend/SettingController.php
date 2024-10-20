<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Models\Setting;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function generalSetting ()
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1){
                $settings = Setting::first();
                return view('backend.admin.settings' ,compact('settings'));
            }
        }
    }

    public function updateSetting (Request $request)
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1){

                $settings = Setting::first();

                if(isset($request->logo)){
                    if($settings->logo && file_exists('backend/images/settings/'.$settings->logo)){
                        unlink('backend/images/settings/'.$settings->logo);
                    }
        
                    $imageName = rand().'-logoup-'.'.'.$request->logo->extension();
                    $request->logo->move('backend/images/settings/',$imageName);
        
                    $settings->logo = $imageName;
                }

                $settings->phone = $request->phone;
                $settings->email = $request->email;
                $settings->address = $request->address;
                $settings->fackbook = $request->fackbook;
                $settings->twitter = $request->twitter;
                $settings->linkedin = $request->linkedin;
                $settings->logo = $request->logo;

                $settings->save();
                
                toastr()->success('Updated Successfully');
                return redirect()->back();
            }
        }
    }

    public function homeBanner ()
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1){
                $homeBanner = HomeBanner::first();
                return view('backend.admin.home-banner', compact('homeBanner'));
            }
        }
    }

    public function updatehomeBanner ()
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1){
                $homeBanner = HomeBanner::first();
                
                if(isset($request->banner)){
                    if($homeBanner->banner && file_exists('backend/images/settings/'.$homeBanner->banner)){
                        unlink('backend/images/settings/'.$homeBanner->banner);
                    }
        
                    $imageName = rand().'-banner-'.'.'.$request->banner->extension();
                    $request->banner->move('backend/images/settings/',$imageName);
        
                    $homeBanner->banner = $imageName;
                }

                $homeBanner->save();
                toastr()->success('Updated Successfully');
                return redirect()->back();
            }
        }
    }

    //Authentication...
    public function adminLogout ()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function admincredntials ()
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1 || Auth::user()-> role = 2){
                $authUser = Auth::user();
                return view('backend.admin.credntials', compact('authUser'));
            }
        } 
    }

    public function admincredntialsUpdate (Request $request)
    {
        if(Auth::user()){
            if(Auth::user()-> role = 1 || Auth::user()-> role = 2){
                $authUser = Auth::user();
                if(password_verify($request->old_password, $authUser->password)){
                    $authUser->password = $request->password;
                    $authUser->save();
                    Auth::logout();
                    toastr()->success('Password has been changed successfully');
                    return redirect('/admin/login');
                }

                else{
                    toastr()->error("Old Password dosn't match");
                    return redirect()->back();
                }
            }
        }   
    }
}
