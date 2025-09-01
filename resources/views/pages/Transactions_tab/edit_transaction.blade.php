@extends('layouts.main')
@section('title', 'Edit Transaction')

@section('content')
<div class="py-4 border-b">
    <h2 class="text-xl font-semibold">Edit Transaction</h2>
</div>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white rounded-lg shadow-md w-full mt-4">
    <div class="p-6">
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <div class="flex-1">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $transaction->name) }}" class="w-full border px-3 py-2 rounded-md" required>
                </div>

                <div class="flex-1">
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}" class="w-full border px-3 py-2 rounded-md" required>
                </div>
            </div>

            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <div class="flex-1">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="w-full border px-3 py-2 rounded-md">
                        <option value="Cash In" {{ old('type', $transaction->type) == 'Cash In' ? 'selected' : '' }}>Cash In</option>
                        <option value="Cash Out" {{ old('type', $transaction->type) == 'Cash Out' ? 'selected' : '' }}>Cash Out</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" value="{{ old('date', $transaction->date) }}" class="w-full border px-3 py-2 rounded-md" required>
                </div>
            </div>

            <div>
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" class="w-full border px-3 py-2 rounded-md">{{ old('notes', $transaction->notes) }}</textarea>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('transactions.index') }}" class="px-4 py-2 border rounded-md">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
