@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<style>
/* Custom styles to match the exact design */
.password-field {
    font-family: monospace;
    letter-spacing: 1px;
}
</style>

<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
    <!-- Header -->
    <div class="py-4 border-b">
        <h2 class="text-xl font-semibold">Add New user</h2>
    </div>
    <!-- Container -->
    <div class="bg-white rounded-lg shadow-md w-full">
        <!-- Form Content -->
        <div class="p-6">
            <form class="space-y-6">
                <!-- Name and Amount Row -->
                <div class="flex space-x-4">
                    <!-- Name Field -->
                    <div class="flex-1">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                        <input type="text" id="name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter your name">
                    </div>

                    <!-- Amount Field -->
                    <div class="flex-1">
                        <label for="amount" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                        <input type="email" id="amount"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Client Name">
                    </div>
                </div>

                <!-- Transaction Type and Date Row -->
                <div class="flex space-x-4">
                    <!-- Transaction Type Field -->
                    <div class="flex-1">
                        <label for="transaction-type" class="block text-gray-700 text-sm font-medium mb-2">Role</label>
                        <select id="transaction-type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="cash-in" class="text-gray-100" selected>Select Role</option>
                            <option value="cash-out">Admin</option>
                            <option value="cash-out">Project Manager</option>
                            <option value="cash-out">Employ</option>
                            <option value="cash-out">Cient</option>
                            <option value="cash-out">Editor</option>
                        </select>
                    </div>

                    <div class="flex-1">
                        <label for="transaction-type"
                            class="block text-gray-700 text-sm font-medium mb-2">Access</label>
                        <select id="transaction-type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="cash-in" class="text-gray-100" selected>Select Access type</option>
                            <option value="cash-out">Website Editor</option>
                            <option value="cash-out">Project Manager</option>
                            <option value="cash-out">Full access</option>
                            <option value="cash-out">View Only</option>
                        </select>
                    </div>
                </div>

                <div class="flex-1">
                    <label for="amount" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                    <input type="email" id="amount"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Phone Number">
                </div>
                <div class="">
                    <!-- Title -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                        Generate Password
                    </h1>

                    <!-- Password Input Section -->
                    <div class="mb-6">
                        <div class="flex gap-5 items-center shadow-sm rounded-md overflow-hidden">
                            <input type="text" id="passwordField" value="ThE428!zudFVtxz{%1NZ"
                class="password-field flex-1 border border-gray-200 bg-gray-50 px-3 py-2 focus:outline-none text-gray-700 text-sm"
                readonly>
            <button id="generateBtn"
                class="bg-[#7114EF] text-white px-4 py-2 text-sm font-medium transition-colors duration-200">
                Generate
            </button>
            <button id="copyBtn"
                class="bg-[#7114EF] hover:bg-purple-700 text-white px-4 py-2 text-sm font-medium transition-colors duration-200">
                Copy
            </button>
        </div>
    </div>

    <!-- Checkbox Section -->
    <div class="mb-8">
        <label class="flex items-start cursor-pointer">
            <input type="checkbox" id="sendEmail"
                class="mt-1 h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                checked>
            <span class="ml-3 text-gray-700 text-sm leading-5">
                Send the new user an <span class="font-medium text-purple-600">email</span> about their account.
            </span>
        </label>
    </div>

    <!-- Add New User Button -->
    <button id="addUserBtn"
        class="w-full bg-[#7114EF] text-white font-semibold py-3 rounded-lg shadow-md transition-transform duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
         Add New User
    </button>
</div>

            </form>
        </div>
    </div>
</body>


</html>


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
        
        // Add new user functionality
        document.getElementById('addUserBtn').addEventListener('click', function() {
            const password = document.getElementById('passwordField').value;
            const sendEmail = document.getElementById('sendEmail').checked;
            
            // In a real application, this would send the data to a server
            alert(`User added!\nPassword: ${password}\nSend email: ${sendEmail ? 'Yes' : 'No'}`);
        });
    </script>
@endpush