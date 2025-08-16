@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')


<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
    <!-- Header -->
    <div class="py-4 border-b">
        <h2 class="text-xl font-semibold">Add Transaction</h2>
    </div>
    <!-- Container -->
    <div class="bg-white rounded-lg shadow-md w-full">
        <!-- Form Content -->
        <div class="p-6">
            <form class="space-y-6">
                <!-- Name and Amount Row -->
                <div class="flex space-x-4">
                    <!-- Name Field -->
                    <div class="flex-1">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your name">
                    </div>

                    <!-- Amount Field -->
                    <div class="flex-1">
                        <label for="amount" class="block text-gray-700 text-sm font-medium mb-2">Amount</label>
                        <input type="text" id="amount"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter amount">
                    </div>
                </div>

                <!-- Transaction Type and Date Row -->
                <div class="flex space-x-4">
                    <!-- Transaction Type Field -->
                    <div class="flex-1">
                        <label for="transaction-type" class="block text-gray-700 text-sm font-medium mb-2">Transaction
                            Type</label>
                        <select id="transaction-type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="cash-in" selected>Cash In</option>
                            <option value="cash-out">Cash Out</option>
                        </select>
                    </div>

                    <!-- Date Field -->
                    <div class="flex-1">
                        <label for="date" class="block text-gray-700 text-sm font-medium mb-2">Date</label>
                        <input type="date" id="date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Notes (Textarea) -->
                <div>
                    <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">Notes</label>
                    <textarea id="notes" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Write additional details..."></textarea>
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
</body>


</html>


@endsection

@push('scripts')
<script>
</script>
@endpush