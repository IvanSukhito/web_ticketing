<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class VendorPasswordController extends Controller
{
    //

    public function edit(){


        $user = Auth::user();
        return view('vendor-client.profile.change-password', [
            'user' => $user,
        ]);
    }
    public function update(Request $request, $user){

        $validate = $request->validate([
            'name' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'confirm_password' => 'required|same:new_password',
        ],
         [
            'new_password.min' => 'Password baru minimal 8 huruf',
            'new_password.regex' => 'Password baru harus berisi hurufkecil, 1 huruf besar, 1 angka, and 1 special karakter (@$!%*#?&).',
            'confirm_password.same' => 'Password konfirmasi tidak sama dengan password',
        ]);


        $user = User::where('id', $user)->first();
        #kasih notifikasi
        
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
            return back()->with("error", "Old Password Doesn't match!");

        }
    }
}
