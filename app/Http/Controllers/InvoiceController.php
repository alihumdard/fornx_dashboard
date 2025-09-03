<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Client;

class InvoiceController extends Controller
{
    /**
     * Display the invoice template page.
     */
    public function template(): View
    {
        $pageTitle = 'Invoice Templates';
        return view('pages.invoice.invoice_template_selection')->with('pageTitle', $pageTitle);
    }

    /**
     * Display the invoice information page.
     */
    public function information(): View
    {
        $invoiceDetails = [
            'number' => 'INV-001',
            'date' => now()->format('Y-m-d'),
        ];
        return view('pages.invoice.invoice_add_info', [
            'invoiceDetails' => $invoiceDetails
        ]);
    }

    /**
     * Handle the POST request to store a new invoice.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'invoice_number' => 'required|string|unique:invoices',
            'reference' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'subject' => 'nullable|string|max:255',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'invoice_template_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required|string|in:draft,sent,paid,cancelled',
        ]);

        // Create a new Invoice model instance
        Invoice::create($validatedData);

        return redirect()->route('invoices.client')->with('success', 'Invoice has been saved successfully!');
    }

    /**
     * Display the invoice client page with a list of clients.
     */
    public function client(): View
    {
        $clients = Client::all();
        return view('pages.invoice.invoice_client_selection', compact('clients'));
    }

    /**
     * Display the all invoice users page with a list of users.
     */
    public function users(): View
    {
        $users = User::all();
        return view('pages.invoice.all_invoice_users', compact('users'));
    }

    public function payment(): View
    {
        $clients = Client::all();
        return view('pages.invoice.payment', compact('clients'));
    }
}
