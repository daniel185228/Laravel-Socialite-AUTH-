<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function authProviderRedirect($provider)
    {
       if($provider){
        return Socialite::driver($provider)->redirect();
       }
        abort(404);
    }

    public function socialAuthentication($provider)
    {
        if($provider){
            $socialUser = Socialite::driver($provider)->user();
            
            
              $userEmail = $socialUser->email ?? "{$provider}_user_" . $socialUser->id . "@example.com";
              $userName = $socialUser->name ?? $socialUser->nickname; 

              $user = User::where('auth_provider_id', $socialUser->id)
              ->orWhere('email', $userEmail)
              ->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $userName,
                    'email' => $userEmail,
                    'phone' => null, 
                    'password' => Hash::make(Str::random(16)),  
                    'auth_provider' => $provider,
                    'auth_provider_id' => $socialUser->id,
                ]);
    
                Auth::login($user);
            }
    
            return redirect()->route('dashboard'); 
        }
        abort(404);
      
    }

}
