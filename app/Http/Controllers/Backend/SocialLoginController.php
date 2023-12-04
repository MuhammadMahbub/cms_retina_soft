<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;


class SocialLoginController extends Controller
{
    // google api login settings
    public function LoginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function CallbackFronGoogle(){

        $user = Socialite::driver('google')->user();

        $is_user = User::where('email', $user->getEmail())->first();

        if(!$is_user){
            $saveUser = User::updateOrCreate([
                'google_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'image' => 'backend/assets/images/default.jpg',
                'role' => 2,
                'isban' => 1,
                'password' => Hash::make($user->getEmail()),
            ]);
        }else {
            $saveUser = User::where('email', $user->getEmail())->update([
                'google_id' => $user->getId(),
            ]);
            $saveUser = User::where('email', $user->getEmail())->first();
        }

        Auth::login($saveUser);
        return redirect()->route('home');

    }


}
