<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class InvoiceController extends Controller
{
    // Your existing payment function
    public function payment(Invoice $invoice): View
    {
        $clients = Client::all();
        $invoice->load('items');
        return view('pages.invoice.payment', compact('clients', 'invoice'));
    }

    // New function to start PayPal payment
    public function payWithPayPal(Invoice $invoice)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('invoices.paypal.success', ['invoice' => $invoice->id]),
                "cancel_url" => route('invoices.paypal.cancel', ['invoice' => $invoice->id]),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($invoice->total_amount, 2),
                    ],
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }
        
        return redirect()->route('invoices.payment', $invoice->id)->with('error', 'Something went wrong with PayPal.');
    }

    // New function for PayPal success
    public function paypalSuccess(Request $request, Invoice $invoice)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
    
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Update invoice status in your database
            $invoice->update(['status' => 'paid']);
            // Redirect with a success message
            return redirect()->route('invoices.show', $invoice->id)->with('success', 'Payment successful!');
        }
    
        // Redirect with an error message
        return redirect()->route('invoices.payment', $invoice->id)->with('error', 'Payment failed or was not completed.');
    }

    // New function for PayPal cancellation
    public function paypalCancel(Invoice $invoice)
    {
        return redirect()->route('invoices.payment', $invoice->id)->with('error', 'You have cancelled the payment.');
    }
}