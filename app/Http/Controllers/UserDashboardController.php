<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
