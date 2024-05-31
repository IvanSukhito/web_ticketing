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
        // $acara = Acara::fetch($slug);
        // $kategori = Category::all();
        // $tickets = Ticket::all();
        // $acara = Acara::where('slug', $slug)->with('category', 'ticket')->first();
        $acara = Acara::where('slug', $slug)->with('ticket', 'category')->firstOrFail();
        $category = $acara->category; // Mengambil kategori terkait
        // return view('frontend.details', compact('acara', 'kategori', 'tickets'));
        return view('frontend.details', compact('acara', 'category'));
    }
}
