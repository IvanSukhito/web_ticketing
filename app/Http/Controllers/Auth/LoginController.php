<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/dashboard/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function authenticated(Request $request, $user)
    // {
    //     if ($user->role == 'admin') {

    //         return redirect()->route('admin.dashboard');
    //     } elseif ($user->role == 'user') {

    //         return redirect()->route('home');
    //     } elseif ($user->role == 'vendor') {

    //         return redirect()->route('vendor.dashboards');
    //     } else {

    //         Auth::logout();
    //         // flash('Anda tidak punya role')->error();
    //         return redirect()->route('login')->with('flash', 'Anda Tidak Punya Role');
    //     }
    // }
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'user') {
            // Redirect to intended URL or home
            return redirect()->intended(route('home'));
        } elseif ($user->role == 'vendor') {
            return redirect()->route('vendor.dashboards');
        } else {
            Auth::logout();
            // flash('Anda tidak punya role')->error();
            return redirect()->route('login')->with('flash', 'Anda Tidak Punya Role');
        }
    }
}
