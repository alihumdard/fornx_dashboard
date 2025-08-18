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
        padding: 20px;
        color: #1a1a1a;
        max-width: 780px;
        margin: 0 auto;
        line-height: 1.4;
        background-color: #e6e6e6;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        body {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 10px;
        }
    }

    .invoice-container {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .invoice-container {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {
        .invoice-container {
            padding: 15px;
        }
    }

    /* Header Styles */
    .header {
        margin-bottom: 28px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }

    .logo-container {
        /* flex: 1; */
        display: flex;
        padding-right: 5px;
        justify-content: center;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .logo-container {
            margin-bottom: 15px;
        }
    }

    .company-logo {
        height: 50px;
        max-width: 150px;
        object-contain;
    }

    @media (max-width: 480px) {
        .company-logo {
            height: 40px;
            max-width: 120px;
        }
    }

    .contact-info {
        flex: 1;
        font-size: 14px;
        line-height: 1.5;
        color: #4d4d4d;
    }

    @media (max-width: 768px) {
        .contact-info {
            margin-top: 15px;
            font-size: 13px;
        }
    }

    .company-fullname {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.3px;
        margin-bottom: 8px;
    }

    @media (max-width: 480px) {
        .company-fullname {
            font-size: 20px;
        }
    }

    /* Divider */
    .divider {
        border-top: 1px solid #e6e6e6;
        margin: 22px 0;
    }

    @media (max-width: 480px) {
        .divider {
            margin: 15px 0;
        }
    }

    /* Section Title */
    .section-title {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 13px;
        }
    }

    /* Invoice Table */
    .invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 28px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .invoice-table {
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .invoice-table {
            font-size: 12px;
            margin-bottom: 20px;
        }
    }

    .invoice-table th {
        text-align: left;
        padding: 8px 10px 8px 0;
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid #eee;
    }

    .bg {
        background: #f2f2f2;
        padding: 10px;
        border-radius: 10px;
    }

    .invoice-table td {
        padding: 8px 10px 8px 0;
        vertical-align: top;
        border-bottom: 1px solid #eee;
    }

    @media (max-width: 480px) {

        .invoice-table th,
        .invoice-table td {
            padding: 6px 5px 6px 0;
        }
    }

    .invoice-table tr:last-child td {
        border-bottom: none;
    }

    .bold-text {
        font-weight: 600;
    }

    .align-right {
        text-align: right;
    }

    .light-text {
        color: #666;
    }

    /* Items Table */
    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 28px;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .items-table {
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .items-table {
            font-size: 12px;
            margin-bottom: 20px;
        }
    }

    .items-table th {
        text-align: left;
        padding: 8px 0;
        font-weight: 600;
        border-bottom: 1px solid #f2f2f2;
    }

    .items-table td {
        padding: 8px 0;
        vertical-align: top;
    }

    @media (max-width: 480px) {

        .items-table th,
        .items-table td {
            padding: 6px 0;
        }
    }

    .items-table tr {
        border-bottom: 1px solid #f2f2f2;
    }

    .items-table tr:last-child {
        border-bottom: none;
    }

    /* Footer */
    .footer {
        margin-top: 28px;
        font-size: 14px;
    }

    @media (max-width: 480px) {
        .footer {
            margin-top: 20px;
            font-size: 13px;
        }
    }

    .terms {
        margin-top: 18px;
    }

    @media (max-width: 480px) {
        .terms {
            margin-top: 15px;
        }
    }

    .terms-title {
        font-weight: 600;
        margin-bottom: 4px;
    }

    /* Mobile adjustments for tables */
    @media (max-width: 480px) {

        .invoice-table,
        .items-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .invoice-table tr,
        .items-table tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
    }

    /* Highlight important elements */
    .invoice-amount {
        color: blue;
        font-weight: 600;
    }

    @media (max-width: 480px) {
        .invoice-amount {
            font-size: 16px;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-container">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="company-logo">
            </div>
            <div class="contact-info">
                <div class="company-fullname">FRONXSOLUTION</div>
                <div>www.website.com</div>
                <div>hello@email.com</div>
                <div>+91 00000 00000</div>
            </div>

            <div style="display: flex; flex-direction: column; padding-top: 10px; color: #666;">
                <span>Business address</span>
                <span>AB0234-01</span>
            
            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <div class="bg">
            <!-- Invoice Details Table -->
            <table class="invoice-table">
                <tr>
                    <th width="40%">Billed to</th>
                    <th width="30%">Invoice number</th>
                    <th width="30%" class="align-right">Invoice of (USD)</th>
                </tr>
                <tr>
                    <td class="bold-text">Company Name</td>
                    <td>#AB2324-01</td>
                    <td class="invoice-amount">$4,950.00</td>
                </tr>
                <tr>
                    <td>Company address</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>City, Country - 00000</td>
                    <td class="light-text">Reference</td>
                    <td></td>
                </tr>
                <tr>
                    <td>+0 (000) 123-4567</td>
                    <td>INV-057</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="light-text">Subject</td>
                    <td class="light-text">Invoice date</td>
                    <td class="light-text">Due date</td>
                </tr>
                <tr>
                    <td class="bold-text">Design System</td>
                    <td>01 Aug, 2023</td>
                    <td>15 Aug, 2023</td>
                </tr>
            </table>

            <!-- Divider -->
            <div class="divider"></div>

            <!-- Item Details -->
            <div>
                <div class="section-title">ITEM DETAIL</div>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th width="50%"></th>
                            <th width="15%">QTY</th>
                            <th width="15%">RATE</th>
                            <th width="20%">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bold-text">Item Name</td>
                            <td>1</td>
                            <td>$3,000.00</td>
                            <td>$3,000.00</td>
                        </tr>
                        <tr>
                            <td class="light-text">Item description</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="bold-text">Item Name</td>
                            <td>1</td>
                            <td>$1,500.00</td>
                            <td>$1,500.00</td>
                        </tr>
                        <tr>
                            <td class="light-text">Item description</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Divider -->
        <div class="divider"></div>

        <!-- Footer -->
        <div class="footer">
            <div>Thanks for the business.</div>
            <div class="terms">
                <div class="terms-title">Terms & Conditions</div>
                <div>Please pay within 15 days of receiving this invoice.</div>
            </div>
        </div>
    </div>
</body>

</html>