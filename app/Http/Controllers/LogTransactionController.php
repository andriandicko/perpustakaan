<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogTransactionController extends Controller
{
    public function index()
    {
        $LogTransaction = Transaction::with(['user', 'book'])->get();
        return view('contents.log.log-transaction', [
            'LogTransaction' => $LogTransaction,
        ]);
    }
}
