@extends('layouts.main')
@section('title', 'Team Management')

@section('content')
<style>
    .tab-active {
        border-bottom: 3px solid #3b82f6;
        color: #3b82f6;
    }
</style>
<div class="max-w-7xl mx-auto">
    <!-- Header with Create Team Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Team Management</h1>
        <a href="{{ route('teams.index') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Create Team
        </a>
    </div>
    <!-- Team Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Web Developers Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="items-center">
                <div class="mb-4">
                    <i class="fas fa-code text-blue-600 text-xl bg-blue-100 p-3 rounded-lg mr-4"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Web Developers</h3>
                    <p class="text-gray-600">{{ $teamCounts['Web Developers'] ?? 0 }} Members</p>
                </div>
            </div>
        </div>
        <!-- App Developer Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="items-center">
                <div class="mb-4">
                    <i class="fas fa-mobile-alt text-green-600 bg-green-100 p-3 rounded-lg mr-4 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">App Developer</h3>
                    <p class="text-gray-600">{{ $teamCounts['App Developer'] ?? 0 }} Members</p>
                </div>
            </div>
        </div>
        <!-- WordPress Developer Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="items-center">
                <div class="mb-4">
                    <i class="fab fa-wordpress text-purple-600 text-xl bg-purple-100 p-3 rounded-lg mr-4"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">WordPress Developer</h3>
                    <p class="text-gray-600">{{ $teamCounts['WordPress Developer'] ?? 0 }} Members</p>
                </div>
            </div>
        </div>
        <!-- Designer Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="items-center">
                <div class="mb-4">
                    <i class="fas fa-paint-brush text-yellow-600 bg-yellow-100 p-3 rounded-lg mr-4 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Designer</h3>
                    <p class="text-gray-600">{{ $teamCounts['Designer'] ?? 0 }} Members</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabs Section -->
    <div class="bg-white rounded-lg shadow-md mb-6">
        <div class="flex border-b border-gray-200 overflow-x-auto">
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600 tab-active whitespace-nowrap"
                data-team="all">All Teams</button>
            @foreach($teams as $team)
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600 whitespace-nowrap" data-team="{{ $team->id }}">{{ $team->name }}</button>
            @endforeach
        </div>
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
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="teamTableBody">
                    @foreach($allMembers as $member)
                    @foreach($member->teams as $team)
                    <tr class="team-member-row" data-team-id="{{ $team->id }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $member->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member->status == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $member->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $team->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab functionality
        const tabButtons = document.querySelectorAll('.tab-btn');
        const memberRows = document.querySelectorAll('.team-member-row');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active tab style
                tabButtons.forEach(btn => btn.classList.remove('tab-active'));
                this.classList.add('tab-active');

                const filter = this.getAttribute('data-team');

                // Filter table rows
                memberRows.forEach(row => {
                    if (filter === 'all' || row.getAttribute('data-team-id') === filter) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        // Modal functionality
        const createTeamBtn = document.getElementById('createTeamBtn');
        const createTeamModal = document.getElementById('createTeamModal');
        const cancelBtn = document.getElementById('cancelBtn');

        if (createTeamBtn) {
            createTeamBtn.addEventListener('click', () => {
                createTeamModal.classList.remove('hidden');
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', () => {
                createTeamModal.classList.add('hidden');
            });
        }

        window.addEventListener('click', (event) => {
            if (event.target === createTeamModal) {
                createTeamModal.classList.add('hidden');
            }
        });
    });
</script>
@endpush