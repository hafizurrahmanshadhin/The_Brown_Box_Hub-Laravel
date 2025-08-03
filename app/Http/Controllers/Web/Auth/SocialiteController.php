<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller {
    /**
     * Redirects the user to Google's OAuth page for authentication.
     *
     * @return RedirectResponse
     */
    public function GoogleRedirect(): RedirectResponse {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handles the callback after Google has authenticated the user.
     *
     * @return RedirectResponse
     */
    public function GoogleCallback(): RedirectResponse {
        $user = Socialite::driver('google')->user();
        // dd($user);

        // $findUser = User::where('google_id', $user->id)->first();
        $findUser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();

        if ($findUser) {
            if (!$findUser->google_id) {
                $findUser->update([
                    'google_id' => $user->id,
                    'avatar'    => $user->avatar,
                ]);
            }
            auth()->login($findUser);
        } else {
            $newUser = User::create([
                'firstName'            => $user->name,
                'email'                => $user->email,
                'password'             => bcrypt(Str::random(20)),
                'google_id'            => $user->id,
                'avatar'               => $user->avatar,
                'terms_and_conditions' => true,
            ]);

            auth()->login($newUser);
        }
        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Redirects the user to facebook's OAuth page for authentication.
     *
     * @return RedirectResponse
     */
    public function FacebookRedirect(): RedirectResponse {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handles the callback after facebook has authenticated the user.
     *
     * @return RedirectResponse
     */
    public function FacebookCallback(): RedirectResponse {
        $user = Socialite::driver('facebook')->user();
        // dd($user);

        // $findUser = User::where('google_id', $user->id)->first();
        $findUser = User::where('facebook_id', $user->id)->orWhere('email', $user->email)->first();

        if ($findUser) {
            if (!$findUser->google_id) {
                $findUser->update([
                    'facebook_id' => $user->id,
                    'avatar'      => $user->avatar,
                ]);
            }
            auth()->login($findUser);
        } else {
            $newUser = User::create([
                'firstName'            => $user->name,
                'email'                => $user->email,
                'password'             => bcrypt(Str::random(20)),
                'facebook_id'          => $user->id,
                'avatar'               => $user->avatar,
                'terms_and_conditions' => true,
            ]);

            auth()->login($newUser);
        }
        return redirect(route('dashboard', absolute: false));
    }
}
