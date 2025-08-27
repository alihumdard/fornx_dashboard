<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('pages.Transactions_tab.tansections', compact('transactions'));
    }

    public function create()
    {
        return view('pages.Transactions_tab.add_transaction');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|string|in:Cash In,Cash Out',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Transaction::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'type' => $request->type,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }
}
