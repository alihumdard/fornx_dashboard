@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class="max-w-7xl mx-auto">
    <!-- Header with Add User Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Users</h1>
        <button
            class="bg-[#7114EF] hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Add User
        </button>
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
                    <!-- Row 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ahmad</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">ahm@gmail.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-07</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-1">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-1"
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
                    <!-- Row 2 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sara</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">sara@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Editor</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Limited Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-05</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-2">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-2"
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
                    <!-- Row 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">john@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Viewer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactive
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Read Only</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-28</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-3">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-3"
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
                    <!-- Row 4 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Emily</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">emily@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-06</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-4">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-4"
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
                    <!-- Row 5 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Michael</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">michael@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Editor</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Limited Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-04</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-5">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-5"
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
                    <!-- Row 6 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Lisa</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">lisa@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Viewer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Read Only</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-03</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-6">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-6"
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
                    <!-- Row 7 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">David</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">david@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-02</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-7">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-7"
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
                    <!-- Row 8 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sophia</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">sophia@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Editor</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Inactive
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Limited Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-8">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-8"
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
                    <!-- Row 9 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Robert</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">robert@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Viewer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Read Only</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-06-01</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-9">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-9"
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
                    <!-- Row 10 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Emma</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">emma@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full Access</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-31</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="relative inline-block text-left">
                                <button type="button"
                                    class="text-gray-600 hover:text-gray-900 focus:outline-none dropdown-toggle"
                                    data-dropdown="dropdown-10">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div id="dropdown-10"
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
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span
                    class="font-medium">100</span>
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    <i class="fas fa-chevron-left mr-1"></i> Back
                </button>
                <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md">1</button>
                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">2</button>
                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">3</button>
                <button
                    class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">...</button>
                <button
                    class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">25</button>
                <button class="px-3 py-1 text-sm bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </button>
            </div>
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
        document.querySelectorAll('[id^="dropdown-"]').forEach(dropdown => {
            if (dropdown.id !== dropdownId) {
                dropdown.classList.add('hidden');
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

// Handle Block/Unblock button clicks
document.querySelectorAll('[role="menuitem"]').forEach(button => {
    button.addEventListener('click', function() {
        const action = this.textContent.trim();
        const row = this.closest('tr');
        const statusCell = row.querySelector('td:nth-child(4) span');
        const userName = row.querySelector('td:nth-child(1)').textContent;

        if (action === 'Block') {
            statusCell.textContent = 'Inactive';
            statusCell.className =
                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800';
            alert(`${userName} has been blocked.`);
        } else if (action === 'Unblock') {
            statusCell.textContent = 'Active';
            statusCell.className =
                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800';
            alert(`${userName} has been unblocked.`);
        }

        // Close the dropdown
        this.closest('[id^="dropdown-"]').classList.add('hidden');
    });
});
</script>
@endpush