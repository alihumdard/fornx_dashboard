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

        Transaction::create($request->only(['name','amount','type','date','notes']));

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    // 🔹 Edit form
    public function edit(Transaction $transaction)
    {
        return view('pages.Transactions_tab.edit_transaction', compact('transaction'));
    }

    // 🔹 Update data
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|string|in:Cash In,Cash Out',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $transaction->update($request->only(['name','amount','type','date','notes']));

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    // 🔹 Delete
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
