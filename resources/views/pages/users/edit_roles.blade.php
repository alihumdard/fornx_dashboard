@extends('layouts.main')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Assign Roles to <span class="text-purple-600">{{ $user->name }}</span></h2>

    <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            @foreach($roles as $role)
                <label class="flex items-center space-x-3 p-3 border rounded-lg hover:bg-purple-50 cursor-pointer">
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                        {{ in_array($role->name, $userRoles) ? 'checked' : '' }}
                        class="form-checkbox h-5 w-5 text-purple-600">
                    <span class="text-gray-700 font-medium">{{ $role->name }}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300">
            Update Roles
        </button>
        <a href="{{ route('users.all') }}" class="ml-4 text-gray-600 hover:text-gray-800">Cancel</a>
    </form>
</div>
@endsection
