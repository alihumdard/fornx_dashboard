<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .popup-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            max-width: 320px;
            width: 90%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .popup-overlay.active .popup-content {
            transform: translateY(0);
        }

        .success-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: blue;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen py-8  mt-12 sm:mt-0">
    <!-- Top Bar -->
    <div class="max-w-6xl mx-auto flex justify-between items-center mb-6 border-b pb-4">
        <div class="flex items-center">
            <button id="menu-toggle" class="mr-4 lg:hidden text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-2xl lg:text-3xl font-bold">Payment Detail</h1>
        </div>

        <div class="flex items-center gap-2 lg:gap-4">
            <div class="relative">
                <input type="text" placeholder="Search for anything..."
                    class="border border-gray-300 rounded-lg pl-8 lg:pl-10 pr-4 py-2 w-40 lg:w-72 text-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4 lg:w-5 lg:h-5 absolute left-2 lg:left-3 top-2.5 text-gray-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z" />
                </svg>
            </div>
            <div class="border p-1 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 lg:w-6 lg:h-6">
                    <title>Bell</title>
                    <path
                        d="M15 17h5l-1.5-1.5a6.5 6.5 0 0 1-1.9-4.6V10a5.6 5.6 0 1 0-11.2 0v.9c0 1.7-.7 3.3-1.9 4.6L2 17h5" />
                    <path d="M9.5 17a2.5 2.5 0 0 0 5 0" />
                </svg>
            </div>
            <div class="flex items-center gap-2">
                <img src="https://via.placeholder.com/40" class="rounded-full w-8 h-8 lg:w-10 lg:h-10" alt="">
                <div class="hidden md:block">
                    <p class="font-semibold text-sm">Alex meian</p>
                    <p class="text-xs text-gray-500">Admin</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 max-w-6xl">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-center mb-8">Payment Detail</h1>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="md:flex">
                <!-- Left Side - Order Summary -->
                <div class="md:w-1/2 p-6 border-r border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold mb-6 flex items-center gap-2">
                        <i class="fas fa-receipt text-blue-600"></i> Order Summary
                    </h2>

                    <!-- Items -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Item Name</span>
                            <span class="font-semibold text-gray-800">Quantity</span>
                            <span class="font-semibold text-gray-800">Rate</span>
                            <span class="font-semibold text-gray-800">Amount</span>
                        </div>
                        @foreach($invoice->items as $item)
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ $item->name }} <br>{{ $item->description ?? '' }}</span>
                            <span class="font-semibold text-gray-800">{{ $item->qty }}</span>
                            <span class="font-semibold text-gray-800">${{ number_format($item->rate, 2) }}</span>
                            <span class="font-semibold text-gray-800">${{ number_format($item->amount, 2) }}</span>

                        </div>
                        @endforeach
                        <div class="flex justify-between border-t border-gray-200 pt-3">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">${{ number_format(($invoice->amount ?? 0) * 0.10, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax (10%)</span>
                            <span class="font-medium">${{ number_format(($invoice->amount ?? 0) * 0.10, 2) }}</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="bg-blue-50 p-4 rounded-lg shadow-sm">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-800">Total</span>
                            <span class="text-lg font-bold text-blue-600">$ {{ number_format($invoice->total_amount ?? 0, 2) }}</span>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <div class="mt-8">
                        <h3 class="text-lg font-medium mb-4 flex items-center gap-2">
                            <i class="fas fa-credit-card text-green-600"></i> Payment Methods
                        </h3>
                        <div class="flex space-x-4">
                            <div
                                class="flex items-center justify-center w-16 h-10 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-100">
                                <i class="fab fa-cc-visa text-blue-600 text-2xl"></i>
                            </div>
                            <div
                                class="flex items-center justify-center w-16 h-10 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-100">
                                <i class="fab fa-cc-mastercard text-red-500 text-2xl"></i>
                            </div>
                            <div
                                class="flex items-center justify-center w-16 h-10 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-100">
                                <i class="fab fa-cc-paypal text-blue-500 text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Payment Form -->
                <div class="md:w-1/2 p-6">
                    <h2 class="text-xl font-semibold mb-4">Payment Information</h2>

                    <div class="mb-6">
                        <img src="{{ asset('assets/images/Credit.png') }}" alt="Logo" class="w-32 mb-6">
                        <div class="flex items-center justify-center my-8">
                            <a href="https://www.sandbox.paypal.com/ncp/payment/WLENTJXJYT9MJ"
                                class="py-3 px-8 bg-blue-600 text-white font-semibold rounded-md shadow-lg hover:bg-blue-700 transition duration-200 ease-in-out">
                                <i class="fab fa-paypal mr-2"></i> Pay with PayPal
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Success Popup -->
    <div id="paymentPopup" class="popup-overlay">
        <div class="popup-content">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Payment Done</h3>
            <p class="text-gray-600 mb-4">Your payment was successful</p>
            <button id="closePopup" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Close
            </button>
        </div>
    </div>

    <script>
        document.getElementById('payButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('paymentPopup').classList.add('active');
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('paymentPopup').classList.remove('active');
        });

        // Close popup when clicking outside
        document.getElementById('paymentPopup').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
            }
        });
    </script>
    <script>
        // Format card number input
        document.querySelector('input[placeholder="1234 5678 9012 3456"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Format expiry date input
        document.querySelector('input[placeholder="MM/YY"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // Format CVV input
        document.querySelector('input[placeholder="123"]').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '').substring(0, 3);
        });
    </script>
</body>

</html>