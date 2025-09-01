@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class="py-6  mt-12 sm:mt-0">
    <div class="bg-white shadow rounded-lg p-6 mb-6 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <img src="{{ asset('assets/images/image.png') }}" alt="Profile"
                    class="w-48 h-48 rounded-lg object-cover">
                <button
                    class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-white/80 text-sm px-3 py-1 rounded-lg shadow">
                    Edit Photo
                </button>
            </div>
            <div>
                <p>Name:</p>
                <p class="text-gray-800 font-semibold"> Fahad</p>
                <p>Gender:</p>
                <p class="text-gray-600"> Male</p>
                <p>Email:</p>
                <p class="text-gray-600"> <a href="mailto:fahad@gmail.com" class="text-blue-600">fahad@gmail.com</a></p>
                <p>Phone Number:</p>
                <p class="text-gray-600"> 0304 8776869</p>
            </div>
        </div>
    </div>

    <!-- Projects Tabs -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2>Transtions</h2>

        <!-- Projects Table -->
        <div class="overflow-x-auto">
            <!-- Table -->
            <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                <thead class="bg-gray-100 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Invoice Date</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                     <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">Title</td>
                        <td class="px-4 py-3 text-gray-600">2024-04-05</td>
                        <td class="px-4 py-3 text-gray-600">2024-09-07</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">$30,000.00</td>
                        <td class="px-4 py-3">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openInvoice()"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Popup Modal -->
            <div id="invoiceModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white w-11/12 max-w-2xl rounded-lg shadow-lg p-6 relative">

                    <!-- Close Button -->
                    <button onclick="closeInvoice()"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">
                        &times;
                    </button>

                    <!-- Invoice Design Content -->
                    <div class="invoice-container text-sm">
                        <div class="header flex justify-between items-start mb-6">
                            <div class="logo-container">
                                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Logo" class="h-12 max-w-[150px]">
                            </div>
                            <div class="contact-info text-gray-600">
                                <div class="font-bold text-lg">FRONXSOLUTION</div>
                                <div>www.website.com</div>
                                <div>hello@email.com</div>
                                <div>+91 00000 00000</div>
                            </div>
                            <div class="text-gray-500 text-sm">
                                <span>Business address</span><br>
                                <span>City, State ,IN 000 000</span><br>
                                <span>TAX ID 00XXX1234XX</span>
                            </div>
                        </div>

                        <div class="divider border-t my-4"></div>

                        <!-- Invoice Table -->
                        <table class="w-full text-sm mb-4">
                            <tr class="font-semibold text-gray-700">
                                <th class="text-left w-2/5">Billed to</th>
                                <th class="w-1/3">Invoice number</th>
                                <th class="text-right w-1/3">Invoice of (USD)</th>
                            </tr>
                            <tr>
                                <td class="font-semibold">Company Name</td>
                                <td>#AB2324-01</td>
                                <td class="text-blue-600 font-bold text-right">$4,950.00</td>
                            </tr>
                            <tr>
                                <td>Company address</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>City, Country - 00000</td>
                                <td class="text-gray-500">Reference</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>+0 (000) 123-4567</td>
                                <td>INV-057</td>
                                <td></td>
                            </tr>
                            <tr class="text-gray-500">
                                <td>Subject</td>
                                <td>Invoice date</td>
                                <td>Due date</td>
                            </tr>
                            <tr>
                                <td class="font-semibold">Design System</td>
                                <td>01 Aug, 2023</td>
                                <td>15 Aug, 2023</td>
                            </tr>
                        </table>

                        <div class="divider border-t my-4"></div>

                        <!-- Items Table -->
                        <div>
                            <div class="font-semibold text-gray-700 mb-2 uppercase">Item Detail</div>
                            <table class="w-full text-sm border-t">
                                <thead>
                                    <tr class="font-semibold text-gray-700">
                                        <th class="text-left w-1/2">Item</th>
                                        <th class="w-1/6">QTY</th>
                                        <th class="w-1/6">Rate</th>
                                        <th class="w-1/6 text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t">
                                        <td class="font-semibold">Item Name</td>
                                        <td>1</td>
                                        <td>$3,000.00</td>
                                        <td class="text-right">$3,000.00</td>
                                    </tr>
                                    <tr class="text-gray-500">
                                        <td>Item description</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="border-t">
                                        <td class="font-semibold">Item Name</td>
                                        <td>1</td>
                                        <td>$1,500.00</td>
                                        <td class="text-right">$1,500.00</td>
                                    </tr>
                                    <tr class="text-gray-500">
                                        <td>Item description</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="divider border-t my-4"></div>

                        <!-- Footer -->
                        <div class="text-gray-700">
                            <div>Thanks for the business.</div>
                            <div class="mt-3">
                                <div class="font-semibold">Terms & Conditions</div>
                                <div>Please pay within 15 days of receiving this invoice.</div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t">
                            <button onclick="closeInvoice()"
                                class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg shadow-sm transition">
                                Cancel
                            </button>
                            <button
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4 text-sm">
            <p>Showing 1-10 from 100</p>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 border rounded">Back</button>
                <button class="px-3 py-1 border rounded bg-blue-600 text-white">2</button>
                <button class="px-3 py-1 border rounded">3</button>
                <button class="px-3 py-1 border rounded">4</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>
        </div>
    </div>

</div>


@endsection

@push('scripts')
<!-- JS -->
<script>
function openInvoice() {
    document.getElementById("invoiceModal").classList.remove("hidden");
}

function closeInvoice() {
    document.getElementById("invoiceModal").classList.add("hidden");
}
</script>

@endpush