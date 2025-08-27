@extends('layouts.main')
@section('title', 'All Users')

@section('content')

<div class="max-w-7xl mx-auto">
    <!-- Header with Add User Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Users</h1>
        <a href="{{ route('users.store') }}"
            class="bg-[#7114EF] hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Add User
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Access</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last
                            Login</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($user->status == 1) bg-green-100 text-green-800
                                @elseif($user->status == 2) bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-800 @endif">
                                @if($user->status == 1) Active
                                @elseif($user->status == 2) Pending
                                @else Inactive @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full Access</td> <!-- Placeholder -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->updated_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-{{ $user->id }}">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-{{ $user->id }}"
                                    class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                                    role="menu">
                                    <div class="py-1">
                                        <button
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-left"
                                            role="menuitem">Block</button>
                                        <button
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 w-full text-left"
                                            role="menuitem">Unblock</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-sm text-gray-500">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Dropdown functionality for each row
document.querySelectorAll('.dropdown-toggle').forEach(button => {
    button.addEventListener('click', function(event) {
        event.stopPropagation();
        const dropdownId = this.getAttribute('data-dropdown');
        const dropdown = document.getElementById(dropdownId);

        // Close all other dropdowns
        document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
            if (d.id !== dropdownId) {
                d.classList.add('hidden');
            }
        });

        // Toggle current dropdown
        dropdown.classList.toggle('hidden');
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown-toggle') && !event.target.closest('[id^="dropdown-"]')) {
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    }
});
</script>
@endpush
