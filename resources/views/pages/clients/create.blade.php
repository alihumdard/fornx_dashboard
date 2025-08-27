@extends('layouts.main')
@section('title', 'Add New Client')

@section('content')

<div class="max-w-4xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Client</h1>
        <a href="{{ route('clients.index') }}" class="text-sm text-blue-600 hover:underline">
            <i class="fas fa-arrow-left mr-2"></i>Back to All Clients
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-6">
                <div class="flex items-center space-x-6">
                    <div class="shrink-0">
                        <img id='preview_img' class="h-24 w-24 object-cover rounded-full" src="https://via.placeholder.com/150" alt="Current profile photo" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input type="file" name="photo" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                          file:mr-4 file:py-2 file:px-4
                          file:rounded-full file:border-0
                          file:text-sm file:font-semibold
                          file:bg-violet-50 file:text-violet-700
                          hover:file:bg-violet-100
                        "/>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name') }}" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('phone') }}">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-6 py-3 text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                    Save Client
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadFile(event) {
        var output = document.getElementById('preview_img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endpush
