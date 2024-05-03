<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketRequest;
use App\Models\Acara;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Acara $acara)
    {
        $tickets = Ticket::where('acara_id', $acara->id)->paginate(10);
        return view('admin.tiket.index', [
            'tickets' => $tickets,
            'acara' => $acara,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Acara $acara)
    {
        return view('admin.tiket.create', [
            'acara' => $acara
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Acara $acara)
    {

        $requestData = $request->all();
        $requestData['acara_id'] = $acara->id;

        Ticket::create($requestData);
        return redirect()->route('admin.acara.tickets.index', $acara->id)->with('success', 'Tiket Berhasil Di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acara $acara, Ticket $ticket)
    {
        return view('admin.tiket.edit', [
            'ticket' => $ticket,
            'acara' => $acara,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Acara $acara, Request $request, string $id)
    {
        //update ticket
        // dd($request->all());
        Ticket::find($id)->update($request->all());
        return redirect()->route('admin.acara.tickets.index', ['acara' => $acara->id])->with('success', 'Tiket Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara, Ticket $ticket)
    {
        $ticket->delete();
        // return redirect()->route('admin.acara.tickets.index', $acara->id)->with('success', 'Tiket Berhasil Di tambahkan');
        return redirect()->route('admin.acara.tickets.index', ['acara' => $acara->id])->with('success', 'Tiket Berhasil Dihapus');
    }
}
