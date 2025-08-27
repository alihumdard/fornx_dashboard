@extends('layouts.main')
@section('title', 'Add Transaction')

@section('content')

<!-- Header -->
<div class="py-4 border-b">
    <h2 class="text-xl font-semibold">Add Transaction</h2>
</div>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Container -->
<div class="bg-white rounded-lg shadow-md w-full mt-4">
    <!-- Form Content -->
    <div class="p-6">
        <form class="space-y-6" action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <!-- Name and Amount Row -->
            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <!-- Name Field -->
                <div class="flex-1">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your name" value="{{ old('name') }}" required>
                </div>

                <!-- Amount Field -->
                <div class="flex-1">
                    <label for="amount" class="block text-gray-700 text-sm font-medium mb-2">Amount</label>
                    <input type="text" id="amount" name="amount"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter amount" value="{{ old('amount') }}" required>
                </div>
            </div>

            <!-- Transaction Type and Date Row -->
            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <!-- Transaction Type Field -->
                <div class="flex-1">
                    <label for="type" class="block text-gray-700 text-sm font-medium mb-2">Transaction
                        Type</label>
                    <select id="type" name="type"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Cash In" {{ old('type') == 'Cash In' ? 'selected' : '' }}>Cash In</option>
                        <option value="Cash Out" {{ old('type') == 'Cash Out' ? 'selected' : '' }}>Cash Out</option>
                    </select>
                </div>

                <!-- Date Field -->
                <div class="flex-1">
                    <label for="date" class="block text-gray-700 text-sm font-medium mb-2">Date</label>
                    <input type="date" id="date" name="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('date') }}" required>
                </div>
            </div>

            <!-- Notes (Textarea) -->
            <div>
                <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">Notes</label>
                <textarea id="notes" name="notes" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Write additional details...">{{ old('notes') }}</textarea>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
