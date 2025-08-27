@extends('layouts.main')
@section('title', 'Transactions')

@section('content')

<div class="py-4">
    <h1 class="text-2xl font-semibold text-gray-800">Transaction</h1>
</div>
<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Table Container -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Amount</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Transaction Type</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Updated At</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($transactions as $transaction)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $transaction->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($transaction->amount, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->type == 'Cash In' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $transaction->type }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($transaction->date)->format('Y - m - d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->updated_at->format('Y - m - d') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-sm text-gray-500">No transactions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
