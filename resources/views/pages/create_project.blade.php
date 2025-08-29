@extends('layouts.main')
@section('title', 'Create Project')

@section('content')
<style>
/* Custom styles to match the exact design */
.dropdown-open {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
}
/* Modal animation */
.modal-backdrop {
    animation: fadeIn 0.3s ease-out;
}
.modal-content {
    animation: slideIn 0.3s ease-out;
}
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
/* Modal custom styles to match screenshot */
.modal-header {
    background-color: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
}
.modal-body {
    padding: 1rem;
}
@media (min-width: 768px) {
    .modal-body {
        padding: 1.5rem;
    }
}
.guide-item {
    transition: all 0.2s ease;
}
.guide-item:hover {
    background-color: #f3f4f6;
    border-color: #8b5cf6;
}
.guide-item.selected {
    background-color: #ede9fe;
    border-color: #8b5cf6;
}
.modal-footer {
    background-color: #f9fafb;
    border-top: 1px solid #e5e7eb;
    padding: 1rem;
    display: flex;
    justify-content: space-between;
}
@media (min-width: 768px) {
    .modal-footer {
        padding: 1rem 1.5rem;
    }
}
.btn-cancel {
    background-color: #e5e7eb;
    color: #374151;
}
.btn-cancel:hover {
    background-color: #d1d5db;
}
.btn-primary {
    background-color: #3b82f6;
    color: white;
}
.btn-primary:hover {
    background-color: #2563eb;
}
</style>
<div class="bg-white rounded-lg shadow-md w-full p-4 md:p-6">
    <!-- Title -->
    <h1 class="text-xl font-semibold text-gray-800 mb-4 md:mb-6">Create Project</h1>
    
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Fields -->
    <form id="projectForm" action="{{ route('projects.store') }}" method="POST" class="space-y-4 md:space-y-6">
        @csrf
        <!-- Row 1 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Project Name</label>
                <input type="text" id="name" name="name"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter project name" value="{{ old('name') }}" required>
            </div>
            <div class="flex-1">
                <label for="client_id" class="block text-sm font-medium text-gray-700 mb-1">Client Name</label>
                 <select id="client_id" name="client_id"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    <option value="">Select a client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Row 2 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                <input type="text" id="country" name="country"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter country" value="{{ old('country') }}" required>
            </div>
            <div class="flex-1">
                <label for="platform" class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
                <input type="text" id="platform" name="platform"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="e.g., Fiverr, Upwork" value="{{ old('platform') }}" required>
            </div>
        </div>
        <!-- Row 3 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                <select id="priority" name="priority"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none">
                    <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ old('priority', 'Medium') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="flex-1">
                <label for="technology" class="block text-sm font-medium text-gray-700 mb-1">Technology</label>
                <input type="text" id="technology" name="technology"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="e.g., Laravel, React" value="{{ old('technology') }}" required>
            </div>
        </div>
        <!-- Row 4 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                <input type="date" id="start_date" name="start_date"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" value="{{ old('start_date') }}" required>
            </div>
            <div class="flex-1">
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                <input type="date" id="end_date" name="end_date"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" value="{{ old('end_date') }}" required>
            </div>
        </div>
        <!-- Row 5 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="earning" class="block text-sm font-medium text-gray-700 mb-1">Earn From Project</label>
                <input type="text" id="earning" name="earning"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter earning" value="{{ old('earning') }}" required>
            </div>
            <div class="flex-1">
                <label for="paid_outside" class="block text-sm font-medium text-gray-700 mb-1">Paid to Outside</label>
                <input type="text" id="paid_outside" name="paid_outside"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter amount paid" value="{{ old('paid_outside') }}" required>
            </div>
        </div>
        <!-- Row 6 -->
        <div class="flex flex-col md:flex-row gap-4 md:gap-6">
            <div class="flex-1">
                <label for="work_done_by" class="block text-sm font-medium text-gray-700 mb-1">Work Done by</label>
                <input type="text" id="work_done_by" name="work_done_by"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Add Person" value="{{ old('work_done_by') }}" required>
            </div>
            <div class="flex-1">
                <label for="project_guide" class="block text-sm font-medium text-gray-700 mb-1">Project Guide</label>
                <div class="flex flex-col sm:flex-row gap-2">
                    <input type="text" id="project_guide" name="project_guide"
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Project Guide" value="{{ old('project_guide') }}">
                    <button type="button" onclick="openModal()"
                        class="px-4 py-2 bg-[#7114EF] text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span class="hidden sm:inline">Select Guide</span>
                        <span class="sm:hidden">Select</span>
                    </button>
                </div>
            </div>
        </div>
        {{-- <input type="hidden" value="{{ $id }}" name="id">
        <!-- Save Button -->
        <div class="flex justify-start">
            <button type="submit"
                class="bg-[#7114EF] w-full sm:w-20 text-white font-medium py-2 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Save
            </button>
        </div> --}}
    {{-- </form> --}}
</div>
<!-- Modal -->
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
                <h2 class="text-lg font-semibold">Project Details</h2>
                <button onclick="closeModal()" class="text-black hover:text-gray-200 transition">
                    ✕
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body flex-1 overflow-y-auto p-4 space-y-4">
                <!-- Reference Website -->
    
    <div>
        <label>Reference Website</label>
        <input type="text" placeholder="Add Website URL" name="reference_website"
            class="w-full border rounded-lg px-3 py-2" value="{{ old('reference_website') }}">
    </div>

    <div>
        <label>Project Description</label>
        <input type="text" placeholder="Enter project description" name="description"
            class="w-full border rounded-lg px-3 py-2" value="{{ old('description') }}">
    </div>

    <div>
        <label>CPanel</label>
        <input type="text" placeholder="Enter CPanel details" name="cpanel_details"
            class="w-full border rounded-lg px-3 py-2" value="{{ old('cpanel_details') }}">
    </div>

    <div>
        <p>Credentials</p>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Login</label>
                <input type="text" placeholder="Enter login" name="login"
                    class="w-full border rounded-lg px-3 py-2">
            </div>
            <div>
                <label>Password</label>
                <input type="text" placeholder="Enter password" name="password"
                    class="w-full border rounded-lg px-3 py-2">
            </div>
        </div>
    </div>

    <div>
        <label>Notes</label>
        <textarea name="notes" class="w-full border rounded-lg px-3 py-2">{{ old('notes') }}</textarea>
    </div>

    <div class="flex justify-end gap-3">
        <button type="button" onclick="closeModal()" class="px-4 py-2 border">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-[#7114EF] text-white rounded-lg">Save</button>
    </div>
</form>

        </div>
    </div>
</div>
<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}
function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
function selectGuide(guideName) {
    document.getElementById('project_guide').value = guideName;
    closeModal();
}
// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection
