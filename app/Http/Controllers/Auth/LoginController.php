<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('provider_id', $githubUser->getId())->first();
        // GitHub name may be null, if so - substitute it with the first part of email address
        $ghName = $githubUser->getName();
        $ghEmail = $githubUser->getEmail();
        $shortName = explode("@", $ghEmail)[0];
        $finalName = (is_null($ghName)) ? $shortName : $ghName;
        // Create new user
        if (! $user) {
            $user = User::create([
                'name' => $finalName,
                'email' => $githubUser->getEmail(),
                'provider_id' => $githubUser->getId(),
            ]);
        }
        auth()->login($user, true);
        return redirect('dashboard');
    }


}
