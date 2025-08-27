@extends('layouts.main')
@section('title', 'Add New User')

@section('content')

<style>
/* Custom styles to match the exact design */
.password-field {
    font-family: monospace;
    letter-spacing: 1px;
}
</style>

<!-- Header -->
<div class="py-4 border-b">
    <h2 class="text-xl font-semibold">Add New user</h2>
</div>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Container -->
<div class="bg-white rounded-lg shadow-md w-full mt-4">
    <!-- Form Content -->
    <div class="p-6">
        <form class="space-y-6" action="{{ route('users.add') }}" method="POST">
            @csrf
            <!-- Name and Email Row -->
            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <!-- Name Field -->
                <div class="flex-1">
                    <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter user's name" value="{{ old('name') }}" required>
                </div>

                <!-- Email Field -->
                <div class="flex-1">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter user's email" value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- Role and Access Row -->
            <div class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-4">
                <!-- Role Field -->
                <div class="flex-1">
                    <label for="role" class="block text-gray-700 text-sm font-medium mb-2">Role</label>
                    <select id="role" name="role"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Role</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Project Manager" {{ old('role') == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
                        <option value="Employee" {{ old('role') == 'Employee' ? 'selected' : '' }}>Employee</option>
                        <option value="Client" {{ old('role') == 'Client' ? 'selected' : '' }}>Client</option>
                        <option value="Editor" {{ old('role') == 'Editor' ? 'selected' : '' }}>Editor</option>
                    </select>
                </div>

                <div class="flex-1">
                    <label for="access" class="block text-gray-700 text-sm font-medium mb-2">Access</label>
                    <select id="access" name="access"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Access type</option>
                        <option value="Website Editor">Website Editor</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="Full access">Full access</option>
                        <option value="View Only">View Only</option>
                    </select>
                </div>
            </div>

            <div class="flex-1">
                <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                <input type="text" id="phone" name="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Number" value="{{ old('phone') }}">
            </div>
            <div class="">
                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    Generate Password
                </h1>

                <!-- Password Input Section -->
                <div class="mb-6">
                    <div class="flex gap-5 items-center shadow-sm rounded-md overflow-hidden">
                        <input type="text" id="passwordField" name="password" value="ThE428!zudFVtxz{%1NZ"
                            class="password-field flex-1 border border-gray-200 bg-gray-50 px-3 py-2 focus:outline-none text-gray-700 text-sm"
                            required>
                        <button type="button" id="generateBtn"
                            class="bg-[#7114EF] text-white px-4 py-2 text-sm font-medium transition-colors duration-200">
                            Generate
                        </button>
                        <button type="button" id="copyBtn"
                            class="bg-[#7114EF] hover:bg-purple-700 text-white px-4 py-2 text-sm font-medium transition-colors duration-200">
                            Copy
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Add New User Button -->
            <button type="submit"
                class="w-full bg-[#7114EF] text-white font-semibold py-3 rounded-lg shadow-md transition-transform duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Add New User
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
 <script>
        // Password generation functionality
        document.getElementById('generateBtn').addEventListener('click', function() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=';
            let password = '';
            const passwordLength = 20;
            
            for (let i = 0; i < passwordLength; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                password += characters[randomIndex];
            }
            
            document.getElementById('passwordField').value = password;
        });
        
        // Copy to clipboard functionality
        document.getElementById('copyBtn').addEventListener('click', function() {
            const passwordField = document.getElementById('passwordField');
            passwordField.select();
            passwordField.setSelectionRange(0, 99999); // For mobile devices
            
            navigator.clipboard.writeText(passwordField.value).then(function() {
                // Show copied feedback
                const originalText = document.getElementById('copyBtn').textContent;
                document.getElementById('copyBtn').textContent = 'Copied!';
                document.getElementById('copyBtn').classList.add('bg-green-100', 'text-green-700');
                
                setTimeout(function() {
                    document.getElementById('copyBtn').textContent = originalText;
                    document.getElementById('copyBtn').classList.remove('bg-green-100', 'text-green-700');
                }, 2000);
            }).catch(function(err) {
                console.error('Failed to copy: ', err);
            });
        });
    </script>
@endpush
