<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 40px;
        color: #1a1a1a;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.4;
        background-color: #f8f9fa;
    }

    .invoice-container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    /* Header Styles */
    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 30px;
        border-bottom: 2px solid #4a6cf7;
        padding-bottom: 20px;
    }

    .invoice-title {
        font-size: 28px;
        font-weight: 700;
        color: #1a1a1a;
        letter-spacing: 1px;
        margin: 0;
    }

    .company-info {
        text-align: right;
    }

    .company-name {
        font-size: 22px;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0 0 5px 0;
    }

    .company-details {
        font-size: 14px;
        color: #4d4d4d;
        margin: 3px 0;
    }

    /* Billed To Section */
    .billed-section {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .billed-to {
        flex: 1;
    }

    .section-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .billed-details {
        font-size: 14px;
        color: #4d4d4d;
        margin: 5px 0;
    }

    .invoice-info {
        flex: 1;
        text-align: left;
    }

    .invoice-details {
        font-size: 14px;
        color: #4d4d4d;
        margin: 5px 0;
    }

    .invoice-number {
        font-weight: 600;
        color: #1a1a1a;
    }

    /* Items Table */
    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .items-table th {
        text-align: left;
        padding: 12px 10px;
        font-weight: 600;
        color: #1a1a1a;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e6e6e6;
        font-size: 14px;
    }

    .items-table td {
        padding: 12px 10px;
        vertical-align: top;
        border-bottom: 1px solid #f2f2f2;
        font-size: 14px;
    }

    .items-table tr:last-child td {
        border-bottom: none;
    }

    .item-name {
        font-weight: 600;
        color: #1a1a1a;
    }

    .item-description {
        color: #808080;
        font-style: italic;
        font-size: 13px;
    }

    /* Totals Section */
    .totals-section {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 30px;
    }

    .totals-table {
        width: 300px;
        border-collapse: collapse;
    }

    .totals-table td {
        padding: 8px 10px;
        font-size: 14px;
    }

    .totals-table .label {
        text-align: left;
        color: #4d4d4d;
    }

    .totals-table .value {
        text-align: right;
        font-weight: 600;
        color: #1a1a1a;
    }

    .totals-table .total-row {
        border-top: 1px solid #e6e6e6;
        font-weight: 700;
        font-size: 16px;
        color: #1a1a1a;
    }

    .totals-table .total-row .value {
        color: #4a6cf7;
    }

    /* Payment Section */
    .payment-section {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e6e6e6;
    }

    .payment-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #1a1a1a;
    }

    .payment-details {
        font-size: 14px;
        color: #4d4d4d;
        text-align: center;
        margin: 5px 0;
    }

    /* Footer */
    .invoice-footer {
        margin-top: 30px;
        font-size: 14px;
        color: #4d4d4d;
        text-align: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        body {
            padding: 20px;
        }

        .invoice-container {
            padding: 20px;
        }

        .invoice-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .company-info {
            text-align: center;
            margin-top: 15px;
        }

        .billed-section {
            flex-direction: column;
        }

        .invoice-info {
            text-align: left;
            margin-top: 15px;
        }

        .totals-section {
            justify-content: flex-start;
        }

        .totals-table {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 15px;
        }

        .invoice-container {
            padding: 15px;
        }

        .items-table th,
        .items-table td {
            padding: 8px 5px;
            font-size: 13px;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div>
                <h1 class="invoice-title">INVOICE</h1>
                <div class="billed-to">
                    <div class="section-title">Billed to</div>
                    <div class="billed-details">{{ $invoice->client_name ?? 'Client Company' }}</div>
                    <div class="billed-details">{{ $invoice->client_address ?? '456 Client Avenue' }}</div>
                    <div class="billed-details">{{ $invoice->client_city ?? 'Los Angeles' }}, {{ $invoice->client_state ?? 'CA' }} {{ $invoice->client_zip ?? '90001' }}</div>
                    <div class="billed-details">{{ $invoice->client_country ?? 'United States' }}</div>
                </div>
            </div>
            <div class="company-info">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="company-logo">

                <div class="company-details">{{ $invoice->address ?? '123 Business Street' }}</div>
                <div class="company-details">{{ $invoice->city ?? 'New York' }}, {{ $invoice->state ?? 'NY' }} {{ $invoice->zip ?? '10001' }}</div>
                <div class="company-details">{{ $invoice->country ?? 'United States' }}</div>
                <div class="company-details">Tax ID: {{ $invoice->tax_id ?? '12-3456789' }}</div>
            </div>
        </div>

        <!-- Billed To Section -->
        <div class="billed-section">
            <div class="invoice-info">
                <div class="invoice-details"><span class="invoice-number">Invoice #:</span> {{ $invoice->invoice_number ?? 'INV-2023-001' }}</div>
                <div class="invoice-details"><span class="invoice-number">Date:</span> {{ $invoice->invoice_date ? \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') : '' }}</div>
                <div class="invoice-details"><span class="invoice-number">Due Date:</span> {{ $invoice->due_date ? \Carbon\Carbon::parse($invoice->due_date)->format('d M, Y') : '' }}</div>
            </div>
        </div>

        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th width="50%">Item Name</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Rate</th>
                    <th width="20%">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                    <tr>
                        <td>
                            <div class="item-name">{{ $item->name }}</div>
                            <div class="item-description">{{ $item->description ?? '' }}</div>
                        </td>
                        <td>{{ $item->qty }}</td>
                        <td>${{ number_format($item->rate, 2) }}</td>
                        <td>${{ number_format($item->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals Section -->
        <div class="totals-section">
            <table class="totals-table">
                <tr>
                    <td class="label">Subtotal:</td>
                    <td class="value">${{ number_format($invoice->amount ?? 0, 2) }}</td>
                </tr>
                <tr>
                    <td class="label">Tax (10%):</td>
                    <td class="value">${{ number_format(($invoice->amount ?? 0) * 0.10, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td class="label">Total:</td>
                    <td class="value">US$ {{ number_format($invoice->total_amount ?? 0, 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Payment Section -->
        <div class="payment-section">
            <div class="payment-details">{{ $invoice->terms ?? 'Please pay within 15 days of receiving this invoice.' }}</div>
        </div>

        <!-- Footer -->
        <div class="invoice-footer">
            <div>{{ $invoice->website ?? 'www.fronxsolution.com' }} | {{ $invoice->email ?? 'hello@fronxsolution.com' }} | {{ $invoice->phone_number ?? '+1 (555) 123-4567' }}</div>
        </div>
    </div>
</body>


</html>