@extends('layouts.main')
@section('title', 'Team Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header with Create Team Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Teams</h1>
        <button id="createTeamBtn"
            class="bg-[#7114EF] hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
            <i class="fas fa-plus mr-2"></i> Create Team
        </button>
    </div>

    <!-- Teams Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Team Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Leader</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Members</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($teams as $team)
                    <tr class="cursor-pointer hover:bg-gray-50"
                        onclick="loadMembers({{ $team->id }})">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $team->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $team->leader->name ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $team->users->count() }}</td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <!-- Edit -->
                            <button class="text-blue-600 hover:text-blue-900 mr-2"
                                onclick="event.stopPropagation(); editTeam({{ $team->id }}, '{{ $team->name }}', {{ $team->user_id ?? 'null' }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <!-- Delete -->
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Delete this team?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Members Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Team Members</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    </tr>
                </thead>
                <tbody id="membersTable" class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td colspan="3" class="text-center py-4 text-sm text-gray-500">Select a team to view members.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create/Edit Team Modal -->
<div id="teamModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
        <form id="teamForm" method="POST">
            @csrf
            <input type="hidden" id="formMethod" name="_method" value="POST">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 id="modalTitle" class="text-xl font-semibold text-gray-800">Create Team</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <label for="teamName" class="block text-gray-700 text-sm font-medium mb-2">Team Name</label>
                    <input type="text" name="name" id="teamName"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">
                    <label for="leader" class="block text-gray-700 text-sm font-medium mb-2">Leader</label>
                    <select name="user_id" id="leader"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-purple-500">
                        <option value="">-- Select Leader --</option>
                        @foreach ($leaders as $leader)
                        <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                <button type="button" onclick="closeModal()"
                    class="px-4 py-2 text-gray-600 hover:text-gray-800 mr-2">Cancel</button>
                <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadMembers(teamId) {
        fetch(`/teams/${teamId}/members`)
            .then(res => res.json())
            .then(data => {
                const tbody = document.getElementById('membersTable');
                tbody.innerHTML = '';
                if (data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="3" class="text-center py-4 text-sm text-gray-500">No members in this team.</td></tr>';
                } else {
                    data.forEach(member => {
                        tbody.innerHTML += `
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">${member.name}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">${member.email}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">${member.role ?? ''}</td>
                        </tr>`;
                    });
                }
            });
    }

    const modal = document.getElementById('teamModal');
    const form = document.getElementById('teamForm');
    const methodInput = document.getElementById('formMethod');
    const modalTitle = document.getElementById('modalTitle');
    const teamNameInput = document.getElementById('teamName');
    const leaderSelect = document.getElementById('leader');

    document.getElementById('createTeamBtn').addEventListener('click', () => {
        form.action = "{{ route('teams.store') }}";
        methodInput.value = "POST";
        modalTitle.innerText = "Create Team";
        teamNameInput.value = "";
        leaderSelect.value = "";
        modal.classList.remove('hidden');
    });

    function editTeam(id, name, leaderId) {
        form.action = `/teams/${id}`;
        methodInput.value = "PUT";
        modalTitle.innerText = "Edit Team";
        teamNameInput.value = name;
        leaderSelect.value = leaderId ?? "";
        modal.classList.remove('hidden');
    }

    function closeModal() {
        modal.classList.add('hidden');
    }
</script>
@endpush