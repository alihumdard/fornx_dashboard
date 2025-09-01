@extends('layouts.main')
@section('title', 'Permission')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Permissions</h1>
        <a href="{{ route('permissions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">+ Add Permission</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">ID</th>
                <th class="border px-3 py-2">Name</th>
                <th class="border px-3 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td class="border px-3 py-2">{{ $permission->id }}</td>
                    <td class="border px-3 py-2">{{ $permission->name }}</td>
                    <td class="border px-3 py-2 flex gap-2">
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Delete this permission?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
