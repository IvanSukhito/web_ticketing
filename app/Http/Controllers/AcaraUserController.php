<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Category;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

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
        // dd(auth()->user()); // 

        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'quantity' => 'required|numeric', // Pastikan ini numeric
            'payment' => 'required|string|in:credit-card,bank-transfer,e_wallet,qris',
            'address' => 'required|string|max:255',
        ]);

        // Ambil detail acara dari database
        $acara = Acara::find($request->acara_id);
        // dd($acara);
        $ticket = Ticket::where('acara_id', $acara->id)->first();

        if (!$ticket) {
            return response()->json(['error' => 'Ticket not found for the selected event.'], 404);
        }
        if ($request->quantity > $ticket->max_buy) {
            return back()->withErrors(['quantity' => 'Jumlah tiket melebihi batas maksimal pembelian.']);
        }
        // Hitung total price berdasarkan kuantitas tiket dan harga tiket
        $total_price = $ticket->harga * $request->quantity;
        // $validateQty = Transaction::where('acara_id', $acara->id)->where('user_id', $user->id)->get();
        $validateQty = Auth::user()->transactions->where('acara_id', $acara->id)->sum('kuantitas');
        // dd($validateQty);
        // Buat transaksi
        if ($validateQty + $request->quantity > $ticket->max_buy) {
            return back()->withErrors(['quantity' => 'Jumlah tiket melebihi batas maksimal pembelian.']);
        }
        $transaction = Transaction::create([
            'acara_id' => $acara->id,
            'user_id' => auth()->user()->id, // pastikan user sudah login
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
            'kuantitas' => $request->quantity,
            'total_price' => $total_price,
            'payment_method' => $request->payment,
            'status' => 'Unpaid',
        ]);

        // Debug data transaksi
        // $getTransaction = [
        //     [
        //         'acara_id' => $acara,
        //         'user_id' => auth()->user()->id, // pastikan user sudah login
        //         'name' => $request->name,
        //         'phone_number' => $request->phone_number,
        //         'address' => $request->address,
        //         'email' => $request->email,
        //         'kuantitas' => $request->quantity,
        //         'total_price' => $total_price,
        //         'payment_method' => $request->payment_method,
        //         'status' => 'Unpaid',
        //     ]
        // ];

        // // Uncomment dd below for debugging purposes
        // dd($getTransaction);

        return redirect()->route('home')->with('success', 'Transaction created successfully.');
    }
}
