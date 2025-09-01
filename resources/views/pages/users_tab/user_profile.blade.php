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
            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">All Projects </button>
            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">In Progress </button>
            <button class="bg-gray-100 px-4 py-2 rounded-full text-sm">Canceled</button>
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
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
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


@endsection

@push('scripts')
<script>
function openModal() {
    document.getElementById('editProfileModal').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('editProfileModal').classList.add('hidden');
}
</script>
@endpush

