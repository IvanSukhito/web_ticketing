<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    //
    public function index(){
        $activeMenu = "my-account";
        return view('Frontend.User.profile',[
            'activeMenu' => $activeMenu
        ]);
    }
    public function changePass(){

        $activeMenu = "change-password"; 
        return view('Frontend.User.profile', [
            'activeMenu' => $activeMenu
        ]);
    }

    public function updatePass(Request $request){
        $userId = Auth::user()->id;

        $validate = $request->validate([
           
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'confirm_password' => 'required|same:new_password',
        ],
         [
            'new_password.min' => 'Password baru minimal 8 huruf',
            'new_password.regex' => 'Password baru harus berisi hurufkecil, 1 huruf besar, 1 angka, and 1 special karakter (@$!%*#?&).',
            'confirm_password.same' => 'Password konfirmasi tidak sesuai.',
        ]);

        $user = User::whereId($userId)->first();

    
        if(!Hash::Check($request->old_password, $user->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        if($request->new_password == $request->confirm_password and auth()->user()->id == $user->id){
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            Auth::logout();
            return redirect()->route('login')->with("success", "Ubah Password, Silahkan Login Kembali!");

        }else{
            return back()->with("error", "Password and Confirm Password Doesn't match!");

        }
        dd($validate);
        dd($userId);
    }
}
