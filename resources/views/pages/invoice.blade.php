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
        max-width: 780px;
        margin: 0 auto;
        line-height: 1.4;
    }

    /* Header Styles */
    .header {
        margin-bottom: 28px;
        display: flex;
    }

    .main-title {
        display: flex;
        align-items: baseline;
        margin-bottom: 2px;
    }

    .company-name {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .company-tag {
        font-size: 16px;
        font-weight: 600;
        margin-left: 8px;
        position: relative;
        top: -1px;
    }

    .company-fullname {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.3px;
    }

    .contact-info {
        /* margin-top: 14px; */
        font-size: 13px;
        padding-left: 15px;
        line-height: 1.5;
        color: #4d4d4d;
    }

    /* Divider */
    .divider {
        border-top: 1px solid #e6e6e6;
        margin: 22px 0;
    }

    /* Billed To Section */
    .section-title {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .billed-to {
        margin-bottom: 26px;
        /* background-color: gainsboro */
    }

    .billed-to-company {
        font-weight: 600;
        margin-bottom: 1px;
    }

    .billed-to-address {
        font-size: 13px;
        line-height: 1.5;
        color: #4d4d4d;
    }

    /* Invoice Table */
    .invoice-table {
        /* width: 100%; */
        border-collapse: collapse;
        margin-bottom: 28px;
        font-size: 13px;
    }

    .invoice-table tr {
        border-bottom: 1px solid #f2f2f2;
    }

    .invoice-table tr:last-child {
        border-bottom: none;
    }

    .invoice-table td {
        padding: 7px 0;
        vertical-align: top;
    }

    .bold-text {
        font-weight: 600;
    }

    .align-right {
        text-align: right;
    }

    /* Items Table */
    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 28px;
        font-size: 13px;
    }

    .items-table th {
        text-align: left;
        padding: 7px 0;
        font-weight: 600;
        border-bottom: 1px solid #f2f2f2;
    }

    .items-table td {
        padding: 7px 0;
        vertical-align: top;
    }

    .items-table tr {
        border-bottom: 1px solid #f2f2f2;
    }

    .items-table tr:last-child {
        border-bottom: none;
    }

    .light-text {
        color: #808080;
        font-style: italic;
    }

    /* Footer */
    .footer {
        margin-top: 28px;
        font-size: 13px;
    }

    .terms {
        margin-top: 18px;
    }

    .terms-title {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .invoice-table {
        width: 100%;
        max-width: 600px;
        border-collapse: collapse;
        font-size: 13px;
        line-height: 1.4;
    }

    .invoice-table th {
        text-align: left;
        padding: 8px 10px 8px 0;
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid #eee;
    }

    .invoice-table td {
        padding: 8px 10px 8px 0;
        vertical-align: top;
        border-bottom: 1px solid #eee;
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
    </style>
</head>

<body style="background-color: #e6e6e6;">
    <div style="background-color: white; padding: 25px;">
        <!-- Header -->
        <div class="header">
            <div class="flex justify-center">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="h-12 w-28 object-contain">
            </div>

            <div class="contact-info">
                <div class="company-fullname">FRONXSOLUTION</div>
                <div>www.website.com</div>
                <div>hello@email.com</div>
                <div>+91 00000 00000</div>
            </div>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <table class="invoice-table">
            <tr>
                <th width="40%">Billed to</th>
                <th width="30%">Invoice number</th>
                <th width="30%" class="align-right">Invoice of (USD)</th>
            </tr>
            <tr>
                <td class="bold-text">Company Name</td>
                <td>#AB2324-01</td>
                <td class="" style="color: blue; font-size: 20px;">$4,950.00</td>
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