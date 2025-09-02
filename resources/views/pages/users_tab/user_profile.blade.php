@extends('layouts.main')
@section('title', 'User Profile')

@section('content')

<div class="py-6">
    <div class="bg-white shadow rounded-lg p-6 mb-6 flex flex-col md:flex-row items-start md:items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <img src="{{ asset($user->user_pic) ?? asset('assets/images/image.png') }}" alt="Profile"
                    class="w-48 h-48 rounded-lg object-cover">
                {{-- <button
                    class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-white/80 text-sm px-3 py-1 rounded-lg shadow">
                    Edit Photo
                </button> --}}
            </div>
            <div>
                <p>Name:</p>
                <p class="text-gray-800 font-semibold">{{ $user->name }}</p>
                <p>Gender:</p>
                <p class="text-gray-600">Male</p> <!-- Placeholder -->
                <p>Email:</p>
                <p class="text-gray-600"> <a href="mailto:{{ $user->email }}" class="text-blue-600">{{ $user->email }}</a></p>
                <p>Phone Number:</p>
                <p class="text-gray-600">{{ $user->phone ?? 'N/A' }}</p>
            </div>
        </div>
        <button onclick="openModal()" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 self-start md:self-end">Edit</button>
    </div>

    <!-- Projects Tabs -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex space-x-4 mb-6">
            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm flex items-center space-x-2">
                <span>All Projects</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-semibold" style="background-color:#dfd1fa; color:rgb(101,32,240);">
                    {{ $counts['all'] }}
                </span>
            </button>

            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm flex items-center space-x-2">
                <span>In Progress</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-semibold" style="background-color:#dfd1fa; color:rgb(101,32,240);">
                    {{ $counts['in_progress'] }}
                </span>
            </button>

            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm flex items-center space-x-2">
                <span>Canceled</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-semibold" style="background-color:#dfd1fa; color:rgb(101,32,240);">
                    {{ $counts['canceled'] }}
                </span>
            </button>

            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm flex items-center space-x-2">
                <span>Completed</span>
                <span class="px-2 py-0.5 rounded-full text-xs font-semibold" style="background-color:#dfd1fa; color:rgb(101,32,240);">
                    {{ $counts['completed'] }}
                </span>
            </button>
        </div>


        <!-- Projects Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Users</th>
                        <th class="px-4 py-3">Progress</th>
                        <th class="px-4 py-3">Preview</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($projects as $project)
                    <tr>
                        <td class="px-4 py-3">{{ $project->name }}</td>
                        <td class="px-4 py-3"><span
                                class="px-3 py-1 rounded {{ $project->status == 'Completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-700' }}">{{ $project->status }}</span></td>
                        <td class="px-4 py-3">
                            <div class="flex -space-x-2">
                                <img src="https://i.pravatar.cc/30?img=1"
                                    class="w-8 h-8 rounded-full border-2 border-white">
                                <img src="https://i.pravatar.cc/30?img=2"
                                    class="w-8 h-8 rounded-full border-2 border-white">
                                <span
                                    class="w-8 h-8 flex items-center justify-center bg-purple-600 text-white rounded-full text-xs">+2</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: {{ $project->progress }}%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">{{ $project->progress }}%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick='openEditModal(@json($project))' class="text-blue-600">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No projects found for this user.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="editProfileModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-lg font-semibold mb-4">Edit Profile</h3>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block text-sm">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block text-sm">Gender</label>
                <select name="gender" class="w-full border px-3 py-2 rounded">
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="block text-sm">Profile Picture</label>
                <input type="file" name="user_pic" class="w-full">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<div id="editProjectProgress" action="{{ route('projects.updateProgress', $project->id) }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-5xl">
        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gray-100 rounded-t-lg flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-700">Edit Project</h3>
            <button type="button" onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Table Form -->
        <form id="editProjectForm" method="POST" class="overflow-x-auto">
            @csrf
            @method('PUT')

            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Users</th>
                        <th class="px-4 py-3">Progress</th>
                        <th class="px-4 py-3">Preview</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="divide-y">
                        <!-- Product -->
                        <td class="px-4 py-3">
                            <input type="text" id="editProjectName" name="name" readonly
                                   class="w-full border rounded-lg px-3 py-2 bg-gray-100 text-gray-700">
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-3">
                            <select name="status" id="editProjectStatus"
                                    class="w-full border rounded-lg px-3 py-2 text-gray-700">
                                    <option value="Pending">Pending</option>

                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Canceled">Canceled</option>
                            </select>
                        </td>

                        <!-- Users -->
                        <td class="px-4 py-3">
                            <div class="flex -space-x-2">
                                <img src="https://i.pravatar.cc/30?img=1"
                                    class="w-8 h-8 rounded-full border-2 border-white">
                                <img src="https://i.pravatar.cc/30?img=2"
                                    class="w-8 h-8 rounded-full border-2 border-white">
                                <span
                                    class="w-8 h-8 flex items-center justify-center bg-purple-600 text-white rounded-full text-xs">+2</span>
                            </div>
                        </td>

                        <!-- Progress -->
                        <td class="px-4 py-3">
                            <select name="progress" id="editProjectProgressDropdown"
                                    class="w-full border rounded-lg px-3 py-2 text-gray-700">
                                <option value="0">0%</option>

                                <option value="25">25%</option>
                                <option value="50">50%</option>
                                <option value="75">75%</option>
                                <option value="100">Completed</option>
                            </select>
                        </td>

                        <!-- Preview -->
                        <td class="px-4 py-3 text-blue-600">
                            <a href="#" id="editProjectPreviewLink">Website</a>
                        </td>

                        <!-- Due Date -->
                        <td class="px-4 py-3">
                            <input type="text" id="editProjectDueDate" name="end_date" readonly
                                   class="w-full border rounded-lg px-3 py-2 bg-gray-100 text-gray-700">
                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-3 space-x-2">
                            <button type="button" onclick="toggleDescription()" class="text-blue-600">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div id="descriptionWrapper" class="hidden px-6 py-4">
                <label for="editProjectDescription" class="block text-sm font-medium text-gray-600 mb-1">
                    Description
                </label>
                <textarea id="editProjectDescription" name="description" rows="4"
                          class="w-full border rounded-lg px-3 py-2 text-gray-700"></textarea>
            </div>

            <!-- Save button -->
            <div class="flex justify-end px-6 py-4 border-t">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>








@endsection

@push('scripts')

<script>
function toggleDescription() {
    const desc = document.getElementById('descriptionWrapper');
    desc.classList.toggle('hidden');
}
</script>
<script>
function openModal() {
    document.getElementById('editProfileModal').classList.remove('hidden');
}


function closeModal() {
    document.getElementById('editProfileModal').classList.add('hidden');
}

function openEditModal(project) {
    console.log(project);
    document.getElementById('editProjectName').value = project.name;
    document.getElementById('editProjectStatus').value = project.status;
    document.getElementById('editProjectProgressDropdown').value = project.progress;
    document.getElementById('editProjectDueDate').value = project.end_date;

    document.getElementById('editProjectForm').action = `/projects/${project.id}`;

    document.getElementById('editProjectProgress').classList.remove('hidden');
}

// Close modal
function closeEditModal() {
    document.getElementById('editProjectProgress').classList.add('hidden');
}

</script>
@endpush

