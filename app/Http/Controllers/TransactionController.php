<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show($acaraId)
    {
        $transactions = Transaction::where('acara_id', $acaraId)->get();

        return view('vendor-client.transaction.index', [
            'transactions' => $transactions,
        ]);
    }
}
