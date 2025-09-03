@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class=" bg-white rounded-xl shadow-sm p-6  mt-12 sm:mt-0">

    <!-- Heading -->
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Select Client</h2>

    <!-- Step Tabs -->
    <div class="border-b border-gray-200 mb-4">
        <nav class="flex space-x-6">
            <span class="pb-2 text-sm font-medium text-indigo-600 border-b-2 border-indigo-600">Clients</span>
        </nav>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p class="font-bold">Success!</p>
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <!-- Table -->
    <div class="overflow-hidden rounded-xl border border-gray-100">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 font-medium text-gray-700">Name</th>
                    <th class="px-6 py-3 font-medium text-gray-700">Email</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                @if($clients->isEmpty())
                <p class="text-gray-500 text-center py-8">No clients found. Please add a new client first.</p>
                @else

                @foreach($clients as $client)
                <tr>
                    <td class="px-6 py-3">{{ $client->name }}</td>
                    <td class="px-6 py-3">{{ $client->email }}</td>
                    <td class="px-6 py-3 text-right">
                        <button data-id="{{ $client->id }}" onclick="showInvoicePopup()"
                            class="px-3 py-1 text-sm rounded-md border border-indigo-500 bg-gradient-to-r from-indigo-500 to-blue-500 text-white shadow hover:opacity-90">
                            Select
                        </button>
                    </td>
                </tr>
                @endforeach

                @endif

            </tbody>
        </table>
    </div>

    <!-- Invoice Popup -->
    <div id="invoicePopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-8 rounded-xl shadow-xl w-96 text-center">
            <!-- Checkmark icon -->
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <!-- Title -->
            <h3 class="text-lg font-medium text-gray-900 mb-2">Invoice Successfully Sent</h3>

            <!-- Back button -->
            <div class="mt-6">
                <button onclick="hideInvoicePopup()"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Invoice
                </button>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end gap-3 mt-6">
        <button class="px-5 py-2 rounded-lg border border-purple-500 text-purple-600 hover:bg-purple-50">
            Cancel
        </button>
        <button class="px-5 py-2 rounded-lg bg-gradient-to-r from-purple-500 to-blue-600 text-white shadow hover:opacity-90">
            Proceed
        </button>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function showInvoicePopup() {
        document.getElementById('invoicePopup').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling when popup is open
    }

    function hideInvoicePopup() {
        document.getElementById('invoicePopup').classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
    }
</script>
@endpush