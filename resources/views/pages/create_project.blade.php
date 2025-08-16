@extends('layouts.main')
@section('title', 'Dashboard')
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
    padding: 1.5rem;
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
    padding: 1rem 1.5rem;
    display: flex;
    justify-content: space-between;
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
<div class="bg-white rounded-lg shadow-md w-full p-6">
    <!-- Title -->
    <h1 class="text-xl font-semibold text-gray-800 mb-6">Create Project</h1>
    <!-- Form Fields -->
    <form id="projectForm" class="space-y-6">
        <!-- Row 1 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="projectName" class="block text-sm font-medium text-gray-700 mb-1">Project Name</label>
                <input type="text" id="projectName" name="projectName"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter project name">
            </div>
            <div class="flex-1">
                <label for="clientName" class="block text-sm font-medium text-gray-700 mb-1">Client Name</label>
                <input type="text" id="clientName" name="clientName"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter client name">
            </div>
        </div>
        <!-- Row 2 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                <div class="relative">
                    <select id="country" name="country"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none dropdown-open">
                        <option value="pakistan" selected>Pakistan</option>
                        <option value="usa">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="canada">Canada</option>
                        <option value="australia">Australia</option>
                        <option value="germany">Germany</option>
                        <option value="france">France</option>
                        <option value="japan">Japan</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <label for="platform" class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
                <div class="relative">
                    <select id="platform" name="platform"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none dropdown-open">
                        <option value="fiver" selected>Fiver</option>
                        <option value="upwork">Upwork</option>
                        <option value="freelancer">Freelancer</option>
                        <option value="guru">Guru</option>
                        <option value="peopleperhour">PeoplePerHour</option>
                        <option value="toptal">Toptal</option>
                        <option value="direct">Direct Client</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 3 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                <div class="relative">
                    <select id="priority" name="priority"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none">
                        <option value="high">High</option>
                        <option value="medium" selected>Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
            </div>
            <div class="flex-1">
                <label for="technology" class="block text-sm font-medium text-gray-700 mb-1">Technology</label>
                <div class="relative">
                    <select id="technology" name="technology"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 appearance-none">
                        <option value="laravel">Laravel</option>
                        <option value="react">React</option>
                        <option value="vue">Vue</option>
                        <option value="angular">Angular</option>
                        <option value="flutter">Flutter</option>
                        <option value="node">Node.js</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Row 4 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                <input type="date" id="startDate" name="startDate"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="flex-1">
                <label for="endDate" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                <input type="date" id="endDate" name="endDate"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
        </div>
        <!-- Row 5 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="earnFrom" class="block text-sm font-medium text-gray-700 mb-1">Earn From Project</label>
                <input type="text" id="earnFrom" name="earnFrom"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter earning">
            </div>
            <div class="flex-1">
                <label for="paidOutside" class="block text-sm font-medium text-gray-700 mb-1">Paid to Outside</label>
                <input type="text" id="paidOutside" name="paidOutside"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Enter amount paid">
            </div>
        </div>
        <!-- Row 6 -->
        <div class="flex gap-6">
            <div class="flex-1">
                <label for="workDoneBy" class="block text-sm font-medium text-gray-700 mb-1">Work Done by</label>
                <input type="text" id="workDoneBy" name="workDoneBy"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Add Person">
            </div>
            <div class="flex-1">
                <label for="projectDoneBy" class="block text-sm font-medium text-gray-700 mb-1">Project Done by</label>
                <div class="flex gap-2">
                    <input type="text" id="projectDoneBy" name="projectDoneBy"
                        class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Project Guide">
                    <button type="button" onclick="openModal()"
                        class="px-4 py-2 bg-[#7114EF] text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Select Guide
                    </button>
                </div>
            </div>
        </div>
        <!-- Save Button -->
        <button type="submit"
            class="bg-[#7114EF] w-20 text-white font-medium py-2 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
            Save
        </button>
    </form>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="modal-backdrop fixed inset-0 bg-black/50" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="modal-content fixed inset-0 flex items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-hidden flex flex-col animate-fadeIn">

            <!-- Modal Header -->
            <div
                class="flex items-center justify-between border-b px-6 py-4">
                <h2 class="text-lg font-semibold">Project Details</h2>
                <button onclick="closeModal()" class="text-black hover:text-gray-200 transition">
                    ✕
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body flex-1 overflow-y-auto p-6 space-y-4">

                <!-- Reference Website -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Reference Website</label>
                    <input type="text" placeholder="Add Website URL"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none">
                </div>

                <!-- Project Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Project Description</label>
                    <input type="text" placeholder="Enter project description"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none">
                </div>

                <!-- CPANEL -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">CPanel</label>
                    <input type="text" placeholder="Enter CPanel details"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none">
                </div>

                <!-- Credentials -->
                <div>
                    <p class="text-sm font-semibold text-gray-800 mb-2">Credentials</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-700 mb-1">Login</label>
                            <input type="text" placeholder="Enter login"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 mb-1">Password</label>
                            <input type="text" placeholder="Enter password"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none">
                        </div>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                    <textarea placeholder="Enter any notes"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none"></textarea>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="border-t px-6 py-4 flex justify-end gap-3 bg-gray-50">
                <button onclick="closeModal()"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                    Cancel
                </button>
                <button
                    class="px-4 py-2 rounded-lg bg-[#7114EF] text-white font-medium hover:bg-purple-700 transition">
                    Save
                </button>
            </div>

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
    document.getElementById('projectDoneBy').value = guideName;
    closeModal();
}

function filterGuides() {
    const searchTerm = document.getElementById('searchGuide').value.toLowerCase();
    const guideItems = document.querySelectorAll('.guide-item');

    guideItems.forEach(item => {
        const name = item.querySelector('.font-medium').textContent.toLowerCase();
        const department = item.querySelector('.text-sm').textContent.toLowerCase();

        if (name.includes(searchTerm) || department.includes(searchTerm)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection