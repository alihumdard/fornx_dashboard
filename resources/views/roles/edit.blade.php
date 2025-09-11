@extends('layouts.main')
@section('title', 'Edit Role')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Role Name</label>
            <input type="text" name="name" value="{{ $role->name }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Permissions</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($permissions as $permission)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                               {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                        <span>{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
            Update Role
        </button>
    </form>
</div>
@endsection
