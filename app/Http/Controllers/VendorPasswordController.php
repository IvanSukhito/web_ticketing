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
            'new_password' => 'required',
            'confirm_password' => 'required',
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
            return back()->with("status", "Password changed successfully!");

        }else{
            return back()->with("error", "Old Password Doesn't match!");

        }
    }
}
