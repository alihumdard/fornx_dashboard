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
                        <th class="px-4 py-3">Company Name</th>
                        <th class="px-4 py-3">Invoice Date</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($invoices as $invoice)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $invoice->company_name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $invoice->invoice_date }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $invoice->due_date }}</td>
                        <td class="px-4 py-3 font-semibold text-blue-600">${{ number_format($invoice->total_amount, 2) }}</td>
                        <td class="px-4 py-3">
                            @if($invoice->status === 'draft')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">
                                Unpaid
                            </span>
                            @elseif($invoice->status === 'paid')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                Paid
                            </span>
                            @elseif($invoice->status === 'sent')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                Sent
                            </span>
                            @elseif($invoice->status === 'cancelled')
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700">
                                Cancelled
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center gap-2 flex justify-center">
                            <a href="{{ route('invoices.show', $invoice->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                View
                            </a>
                            <a href="{{ route('invoices.payment', $invoice->id) }}"
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-1.5 text-xs rounded-lg shadow-sm transition">
                                Pay Now
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>


        </div>


    </div>

</div>


@endsection

@push('scripts')
<!-- JS -->
<script>

</script>

@endpush