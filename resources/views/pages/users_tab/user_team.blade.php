@extends('layouts.main')
@section('title', 'Dashbaord')
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
        <button id="createTeamBtn"
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Create Team
        </button>
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
                    <p class="text-gray-600">20 Members</p>
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
                    <p class="text-gray-600">25 Members</p>
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
                    <p class="text-gray-600">10 Members</p>
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
                    <p class="text-gray-600">15 Members</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabs Section -->
    <div class="bg-white rounded-lg shadow-md mb-6">
        <div class="flex border-b border-gray-200">
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600 tab-active"
                data-team="all">All Teams</button>
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600" data-team="web">Web
                Developer</button>
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600" data-team="app">App
                Developer</button>
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600"
                data-team="wordpress">WordPress Developer</button>
            <button class="tab-btn px-6 py-3 font-medium text-gray-700 hover:text-blue-600"
                data-team="designer">Designer</button>
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
                    <!-- Table rows will be generated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Create Team Modal -->
<div id="createTeamModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-xl">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Create a new team</h2>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6">
            <form>
                <!-- Team Name Field -->
                <div class="mb-6">
                    <label for="teamName" class="block text-gray-700 text-sm font-medium mb-2">Team Name</label>
                    <input type="text" id="teamName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Enter team name">
                </div>
                
                <!-- Members Field -->
                <div class="mb-6">
                    <label for="members" class="block text-gray-700 text-sm font-medium mb-2">Members</label>
                    <div class="relative">
                        <input type="text" id="members" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Add members by name or email">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Members List -->
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">Team Members (3)</h3>
                    <div class="space-y-3">
                        <!-- Member 1 -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                    <span class="text-purple-800 font-medium">TK</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Titus Kitamura</p>
                                    <p class="text-xs text-gray-500">xyz@gmail.com</p>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">Developer</span>
                        </div>
                        
                        <!-- Member 2 -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                    <span class="text-purple-800 font-medium">TK</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Titus Kitamura</p>
                                    <p class="text-xs text-gray-500">xyz@gmail.com</p>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">Developer</span>
                        </div>
                        
                        <!-- Member 3 -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                    <span class="text-purple-800 font-medium">TK</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Titus Kitamura</p>
                                    <p class="text-xs text-gray-500">xyz@gmail.com</p>
                                </div>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">Developer</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
            <button id="cancelBtn" class="px-4 py-2 text-gray-600 hover:text-gray-800 mr-2">Cancel</button>
            <button id="createBtn" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-md transition duration-300">Create</button>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
// Sample team data
const teamMembers = [{
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'Web Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'App Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'WordPress Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'Designer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'Web Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'App Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'WordPress Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'Designer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'Web Developer'
    },
    {
        name: 'Ali',
        email: 'all@gmail.com',
        role: 'Developer',
        status: 'Active',
        team: 'App Developer'
    }
];
// Function to render table
function renderTable(filter = 'all') {
    const tableBody = document.getElementById('teamTableBody');
    tableBody.innerHTML = '';
    const filteredMembers = filter === 'all' ?
        teamMembers :
        teamMembers.filter(member => {
            if (filter === 'web') return member.team === 'Web Developer';
            if (filter === 'app') return member.team === 'App Developer';
            if (filter === 'wordpress') return member.team === 'WordPress Developer';
            if (filter === 'designer') return member.team === 'Designer';
            return true;
        });
    filteredMembers.forEach(member => {
        const row = document.createElement('tr');
        row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${member.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${member.email}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${member.role}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            ${member.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${member.team}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
        tableBody.appendChild(row);
    });
}
// Tab functionality
document.querySelectorAll('.tab-btn').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove active class from all tabs
        document.querySelectorAll('.tab-btn').forEach(t => t.classList.remove('tab-active'));
        // Add active class to clicked tab
        this.classList.add('tab-active');
        // Filter table based on selected team
        const teamFilter = this.getAttribute('data-team');
        renderTable(teamFilter);
    });
});
// Modal functionality
const createTeamBtn = document.getElementById('createTeamBtn');
const createTeamModal = document.getElementById('createTeamModal');
const cancelBtn = document.getElementById('cancelBtn');
const createBtn = document.getElementById('createBtn');
const teamNameInput = document.getElementById('teamName');
const membersInput = document.getElementById('members');

createTeamBtn.addEventListener('click', () => {
    createTeamModal.classList.remove('hidden');
});

cancelBtn.addEventListener('click', () => {
    createTeamModal.classList.add('hidden');
});

createBtn.addEventListener('click', () => {
    const teamName = teamNameInput.value;
    
    if (teamName.trim() === '') {
        alert('Please enter a team name');
        return;
    }
    
    // Here you would normally send the data to your backend
    console.log('Creating team:', teamName);
    
    // Show success message
    alert(`Team "${teamName}" created successfully!`);
    
    // Reset form and close modal
    teamNameInput.value = '';
    membersInput.value = '';
    createTeamModal.classList.add('hidden');
});

// Close modal when clicking outside
window.addEventListener('click', (event) => {
    if (event.target === createTeamModal) {
        createTeamModal.classList.add('hidden');
    }
});

// Initialize table
renderTable();
</script>
@endpush