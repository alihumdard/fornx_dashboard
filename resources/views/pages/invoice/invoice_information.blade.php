@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="px-4 space-y-8">
    
    <!-- Profile Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Profile</h1>
        <p class="text-gray-600">Manage your company information</p>
    </div>

    <!-- Company Information Card -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-6 border-b pb-2">Company Information</h2>

        <!-- Upload Company Logo Section -->
        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Company Logo</label>
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-md bg-gray-100 flex items-center justify-center mr-4 shadow-inner">
                    <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl"></i>
                </div>
                <div class="flex-1">
                    <div
                        class="border border-gray-300 rounded-md px-4 py-2 bg-white hover:bg-gray-50 cursor-pointer transition duration-150 ease-in-out">
                        <span class="text-sm text-gray-600">Choose file or drag here</span>
                        <input type="file" class="hidden" id="logo-upload">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">JPG, PNG or GIF (max. 2MB)</p>
                </div>
            </div>
        </div>

        <!-- Company Information Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Company Name -->
            <div>
                <label for="company-name" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                <input type="text" id="company-name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter company name">
            </div>

            <!-- Website -->
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                <input type="text" id="website"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="https://example.com">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="company@example.com">
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" id="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="+1 (555) 123-4567">
            </div>

            <!-- Address (Full Width) -->
            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <textarea id="address" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter company address"></textarea>
            </div>
        </div>
    </div>

    <!-- Invoice Detail Card -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <!-- Heading -->
        <h2 class="text-sm font-semibold text-blue-600 mb-4">Invoice Detail</h2>

        <!-- Form Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Billed to</label>
                <input type="text" placeholder="Company name"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" placeholder="Phone number"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <textarea placeholder="Company address"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
        </div>

        <!-- Invoice Fields -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Invoice Number</label>
                <input type="text" placeholder="invoice number"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Reference</label>
                <input type="text" placeholder="Reference"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Invoice of USD</label>
                <input type="text" placeholder="Amount"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" placeholder="Title"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Invoice Date</label>
                <input type="text" placeholder="Date"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Due date</label>
                <input type="text" placeholder="Due date"
                    class="w-full mt-1 rounded-md border-gray-300 text-sm px-3 py-2 focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>

        <!-- Item Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600 border-t border-gray-200">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-2 px-3 font-medium">Item Detail</th>
                        <th class="py-2 px-3 font-medium">Qty</th>
                        <th class="py-2 px-3 font-medium">Rate</th>
                        <th class="py-2 px-3 font-medium">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-3">Service name</td>
                        <td class="py-2 px-3">1</td>
                        <td class="py-2 px-3">$3,000.0</td>
                        <td class="py-2 px-3">$3,000.0</td>
                    </tr>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-3">Service name</td>
                        <td class="py-2 px-3">1</td>
                        <td class="py-2 px-3">$3,000.0</td>
                        <td class="py-2 px-3">$3,000.0</td>
                    </tr>
                </tbody>
            </table>

            <!-- Totals -->
            <div class="flex flex-col items-end mt-4 space-y-1 text-sm text-gray-700">
                <div class="flex justify-between w-1/3">
                    <span>Subtotal</span>
                    <span>$3,000.0</span>
                </div>
                <div class="flex justify-between w-1/3">
                    <span>Tax(10%)</span>
                    <span>$3,000.0</span>
                </div>
                <div class="flex justify-between w-1/3 font-semibold border-t pt-2">
                    <span>Total</span>
                    <span>$3,000.0</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-sm text-gray-700">
            <p class="font-medium">Thanks for the business.</p>
            <p class="text-gray-500">Terms and condition — Please pay within 15 days of receiving this invoice.</p>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex justify-end space-x-3">
            <button
                class="px-4 py-2 border rounded-md text-sm font-medium text-gray-600 bg-white hover:bg-gray-100 shadow-sm">Cancel</button>
            <button
                class="px-5 py-2 rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow">Proceed</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // File upload functionality
    document.querySelector('.border.border-gray-300.rounded-md.px-4.py-2')
        .addEventListener('click', function () {
            document.getElementById('logo-upload').click();
        });

    // Handle file selection
    document.getElementById('logo-upload').addEventListener('change', function (e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            document.querySelector('.text-sm.text-gray-600').textContent = fileName;
        }
    });
</script>
@endpush
