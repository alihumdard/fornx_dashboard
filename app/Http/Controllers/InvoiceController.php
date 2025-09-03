<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function information(Request $request): View
    {
        $selectedTemplate = $request->template;
        $invoiceDetails = [
            'number' => 'INV-001',
            'date' => now()->format('Y-m-d'),
            'template' => $selectedTemplate,
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
            'calculated_total' => 'required|numeric',
             'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.rate' => 'required|numeric',
            'items.*.amount' => 'required|numeric',
        ]);

        // Map calculated_total → total_amount
        $validatedData['total_amount'] = $validatedData['calculated_total'];
        unset($validatedData['calculated_total']);

        // Save invoice
        $invoice = Invoice::create($validatedData);

        foreach ($validatedData['items'] as $item) {
            $invoice->items()->create($item);
        }



        return redirect()->route('invoices.client')->with('invoice_id', $invoice->id)->with('success', 'Invoice has been saved successfully!');
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

        $invoices = Invoice::all();

        return view('pages.invoice.all_invoice_users', compact('users', 'invoices'));
    }

    public function payment(): View
    {
        $clients = Client::all();
        return view('pages.invoice.payment', compact('clients'));
    }

    // app/Http/Controllers/InvoiceController.php
    public function show(Invoice $invoice)
    {
        // Eager load items to avoid N+1 query problem
        $invoice->load('items');

        // map id to template
        $templateId = $invoice->invoice_template_id;

        switch ($templateId) {
            case 1:
                $viewName = "pages.invoice.templates.template_1";
                break;
            case 2:
                $viewName = "pages.invoice.templates.template_2";
                break;
            case 3:
                $viewName = "pages.invoice.templates.template_3";
                break;
            default:
                $viewName = "pages.invoice.templates.template_1"; // fallback
        }

        return view($viewName, compact('invoice'));
    }

    public function sendInvoice(Request $request)
{
    $request->validate([
        'invoice_id' => 'required|exists:invoices,id',
        'clients' => 'required',
    ]);
    $clientIds = json_decode($request->clients, true);
    $invoice = Invoice::findOrFail($request->invoice_id);

    // Generate PDF from invoice view
    $pdf = Pdf::loadView('emais.invoices.pdf', compact('invoice'));

    foreach ($clientIds as $id) {
        $client = Client::find($id);

        if ($client) {
            Mail::send('emails.invoice', ['invoice' => $invoice, 'client' => $client], function($message) use ($client, $pdf, $invoice) {
                $message->to($client->email)
                        ->subject("Invoice #{$invoice->id}")
                        ->attachData($pdf->output(), "invoice_{$invoice->id}.pdf");
            });
        }
    }

    return redirect()->back()->with('success', 'Invoice sent successfully!');
}

}
