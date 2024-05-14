<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraUserController extends Controller
{
    public function index(Request $request, $slug)
    {
        $acara = Acara::fetch($slug);

        return view('frontend.details', compact('acara'));
    }
}
