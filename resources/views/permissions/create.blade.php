@extends('layouts.main')
@section('title', 'Add Permission')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Permission</h1>

    <form action="{{ route('permissions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Permission Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('permissions.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
