<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcaraUserController extends Controller
{
    public function index(Request $request, $slug)
    {

        $acara = Acara::where('slug', $slug)->with('ticket', 'category')->firstOrFail();
        $category = $acara->category; // Mengambil kategori terkait

        return view('frontend.details', compact('acara', 'category'));
    }
    public function checkout(Request $request, $slug)
    {
        $acara = Acara::where('slug', $slug)->firstOrFail();

        return view('Frontend.checkout', compact('acara'));
    }

    public function checkoutPay(Request $request)
    {

        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|number|',
            'quantity' => 'required|string|in:manual_transfer',
            'payment_method' => 'required|string|in:credit-card,bank-transfer,e_wallet,qris',
            'address' => 'required|string|max:255',
        ]);

        $transaction = Transaction::create([
            'acara_id' => $acara->id,
            'user_id' => $user->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
            'kuantitas' => $request->quantity,
            'total_price' => $request->total_price,
        ]);
    }
}
