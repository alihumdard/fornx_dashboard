@extends('layouts.main')
@section('title', 'ADD ROLE')

@section('content')
<div class="max-w-lg mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Create Role</h1>

    <form action="{{ route('roles.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Role Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('roles.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
