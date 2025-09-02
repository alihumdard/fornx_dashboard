@extends('layouts.main')
@section('title', 'All Projects')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">All Projects</h1>
        <div style="display: flex; gap: 10px;">

            <button type="button" onclick="openModal()"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
                        
                <i class="fas fa-plus mr-2"></i> Assign Project
                </button>

                        <a href="{{ route('projects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md flex items-center transition duration-300">
                <i class="fas fa-plus mr-2"></i> Create New Project
            </a>
        </div>
    </div>
        @if(session('success'))
            <div class="alert-message mb-4 p-3 rounded-md bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-message mb-4 p-3 rounded-md bg-red-100 text-red-800">
                {{ session('error') }}
            </div>
        @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($projects as $project)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $project->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $project->client->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->status == 'Completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-700' }}">{{ $project->status }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $project->progress }}%</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No projects found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="projectAssignForm" action="{{ route('projects.assign') }}" method="POST" class="space-y-4 md:space-y-6">
     @csrf

     <div id="modal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="modal-backdrop fixed inset-0 bg-black/50" onclick="closeModal()"></div>
    <!-- Modal Content -->
    <div class="modal-content fixed inset-0 flex items-center justify-center p-2 sm:p-4">
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-full sm:max-w-3xl max-h-[90vh] overflow-hidden flex flex-col animate-fadeIn">
            <!-- Modal Header -->
            <div
                class="flex items-center justify-between border-b px-4 py-3 sm:px-6 sm:py-4">
                <h2 class="text-lg font-semibold">User Details</h2>
                <button onclick="closeModal()" class="text-black hover:text-gray-200 transition">
                    ✕
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body flex-1 overflow-y-auto p-4 space-y-4">
                <!-- Reference Website -->
    
           <div class="flex gap-4">
    <div class="flex-1">
        <label for="user" class="block mb-1">Select User</label>
        <select name="user_id" id="user" class="w-full border rounded-lg px-3 py-2">
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex-1">
        <label for="project" class="block mb-1">Select Project</label>
        <select name="project_id" id="project" class="w-full border rounded-lg px-3 py-2">
            <option value="">Select Project</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </div>
    </div>

    <div class="flex justify-end gap-3">
        <button type="button" onclick="closeModal()" class="px-4 py-2 border">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#7114EF] text-white rounded-lg">Assign</button>
    </div>
</form>

<script>
    setTimeout(() => {
        document.querySelectorAll('.alert-message').forEach(el => el.remove());
    }, 3000);
</script>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});

</script>
@endsection
