<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/********** Models ***************/
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function facebookRedirect()
    {
            return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {

            try {
                $user = Socialite::driver('facebook')->user();
                $isUser = User::where('fb_id', $user->id)->first();
                $avater = $user->getAvatar();
                if($isUser){
                    Auth::login($isUser);
                    return redirect('/');
                }else {
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'fb_id' => $user->id,
                        'avatar' => $avater
                    ]);
                    Auth::login($createUser);
                    return redirect('/');
                }

            } catch (\Exception $e) {
                dd($e->getMessage());
            }

    }




//
    public function githubRedirect()
    {
            return Socialite::driver('github')->redirect();
    }

    public function loginWithGithub()
    {

            try {
                $user = Socialite::driver('github')->user();
                // dd($user);
                $isUser = User::where('fb_id', $user->id)->first();
                $avater = $user->getAvatar();
                if($isUser){
                    Auth::login($isUser);
                    return redirect('/');
                }else {
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'fb_id' => $user->id,
                        'avatar' => $avater,
                        'password' => encrypt('admin123')
                    ]);
                    Auth::login($createUser);
                    return redirect('/');
                }

            } catch (\Exception $e) {
                // dd($e->getMessage());
            }

    }
}
