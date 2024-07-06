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
        $ticket = Ticket::where('acara_id', $acara->id)->first();
        $category = $acara->category; // Mengambil kategori terkait

        return view('frontend.details', compact('acara', 'category'));
    }
    public function checkout(Request $request, $slug)
    {
        $acara = Acara::where('slug', $slug)->firstOrFail();
        // TEMP STORE TO SESSION

        $request > session()->put('acara_id', $acara);


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


        // ambil acara id 
        $acara = $request->session()->get('acara_id');

        // dd($acara); 
        // SELECT * FROM tickets WHERE acara_id = [acara_id] LIMIT 1;

        // yang terjual 1 dan tiket quantitynya ada 5 berarti 5-1 = 4, maka tersisa tiketnya 4 
        //  5 > 4 = true, 
        // if ($ticket->quantity > $remainingTickets) {
        //     return back()->withErrors(['quantity' => 'Jumlah tiket yang diminta melebihi stok yang tersedia.']);
        // }





        $ticket = Ticket::where('acara_id', $acara->id)->first();
        // Hitung jumlah tiket yang telah terjual,dari table transactions dicari tiap acara_id dan menjumlah kuantitas dari acara id tersebut
        $totalSoldTickets = Transaction::where('acara_id', $acara->id)->sum('kuantitas');
        // Cek apakah kuantitas yang diminta melebihi jumlah tiket yang tersedia, 

        // 5-3 = 2 (remaining tiket)
        $remainingTickets = $ticket->kuantitas - $totalSoldTickets;

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
        // 5(ticket->quantity)5-1 = 4 (remaining ticket)
        // 3 (req->quantity), 5-3= 2 (remaining ticket)
        if ($request->quantity >  $remainingTickets) {
            return back()->withErrors(['quantity' => 'Tiket yang tersedia hanya ' . $remainingTickets . ' tiket.']);
        } elseif ($request->quantity <= $remainingTickets) {
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
        }

        // $transaction = Transaction::create([
        //     'acara_id' => $acara->id,
        //     'user_id' => auth()->user()->id, // pastikan user sudah login
        //     'name' => $request->name,
        //     'phone_number' => $request->phone_number,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'kuantitas' => $request->quantity,
        //     'total_price' => $total_price,
        //     'payment_method' => $request->payment,
        //     'status' => 'Unpaid',
        // ]);

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
