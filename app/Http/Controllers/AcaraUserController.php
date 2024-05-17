<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AcaraUserController extends Controller
{
    public function index(Request $request, $slug)
    {
        $acara = Acara::fetch($slug);
        $categories = Category::all();
        $tickets = Ticket::all();
        return view('frontend.details', compact('acara', 'categories', 'tickets'));
    }
}
