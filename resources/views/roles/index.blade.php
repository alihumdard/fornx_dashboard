@extends('layouts.main')
@section('title', 'Role')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Roles</h1>
        <a href="{{ route('roles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">+ Add Role</a>
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
            @foreach($roles as $role)
                <tr>
                    <td class="border px-3 py-2">{{ $role->id }}</td>
                    <td class="border px-3 py-2">{{ $role->name }}</td>
                    <td class="border px-3 py-2 flex gap-2">
                        <a href="{{ route('roles.edit', $role->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Delete this role?')">
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
