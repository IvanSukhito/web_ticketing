<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function CallBackGoogle()
    {
        try {
            //code...
            $google = Socialite::driver('google')->user();

            $user = User::where('email', $google->getEmail())->first();

            if (!$user) {
                # tahun
                $tahun = date('Y');
                # generatepass
                $generate_pass = str_replace(' ', '', $google->getName() . $tahun);

                # code...
                $new_user = User::create([
                    'name' => $google->getName(),
                    'email' => $google->getEmail(),
                    'role' => 'user',
                    'password' => bcrypt($generate_pass),
                    'google_id' => $google->getId(),
                ]);

                Auth::login($new_user);

                return redirect()->route('home');
            } else {
                Auth::login($user);
                if ($user->role == 'user') {
                    return redirect()->route('home');
                } elseif ($user->role == 'vendor') {
                    return redirect()->route('vendor.dashboards');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd('something went wrong' . $th->getMessage());
        }
    }
}
