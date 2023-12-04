<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile_index(){
        return view('backend.profile.index');
    }

    public function profile_image_change(Request $request)
    {
        $image = $request->file('image');
        if($image != ""){
            if(Auth::user()->image != 'backend/assets/images/default.jpg'){
                if(file_exists($request->old_image)){
                    unlink($request->old_image);
                }
            }
            $imag_ext = $image->getClientOriginalExtension();
            $hexCode = hexdec(uniqid());
            $full_name = $hexCode.'.'.$imag_ext;
            $upload_location = 'backend/assets/images/profile/';
            $last_image = $upload_location.$full_name;
            Image::make($image)->save($last_image);
            User::findOrFail(Auth::id())->update([
                'image' => $last_image,
            ]);

            return redirect()->route('profile.index')->with('success', 'Profile Image Update success');
        }

    }

    public function profile_content_change(Request $request)
    {
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('profile.index')->with('success', 'Profile Content Update success');
    }

    public function password_change( Request $request)
    {
        $request->validate([
            '*' => 'required',
        ],[
            'old_password.required' => 'The old Password Required.',
            'new_password.required' => 'The New Password Required.',
            'confirm_password.required' => 'The Confirm Password Required.',
        ]);
        if(Hash::check($request->current_password, Auth::user()->password)){
            if($request->confirm_password == $request->new_password){
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($request->new_password),
                ]);
                Auth::logout();
                return redirect()->route('login');
            }else {
                return redirect()->back()->with('fail', 'New Password and Confirm Password are not metch !');
            }
        }
        else {
            return back()->with('fail', 'Old Password and current password are not match');
        }
    }

}
