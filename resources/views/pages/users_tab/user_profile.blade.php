@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class="py-6">
    <div class="bg-white shadow rounded-lg p-6 mb-6 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="relative">
                <img src="{{ asset('assets/images/image.png') }}" alt="Profile"
                    class="w-48 h-48 rounded-lg object-cover">
                <button
                    class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-white/80 text-sm px-3 py-1 rounded-lg shadow">
                    Edit Photo
                </button>
            </div>
            <div>
                <p>Name:</p>
                <p class="text-gray-800 font-semibold"> Fahad</p>
                <p>Gender:</p>
                <p class="text-gray-600"> Male</p>
                <p>Email:</p>
                <p class="text-gray-600"> <a href="mailto:fahad@gmail.com" class="text-blue-600">fahad@gmail.com</a></p>
                <p>Phone Number:</p>
                <p class="text-gray-600"> 0304 8776869</p>
            </div>
        </div>
        <button class="bg-blue-600 text-white md:mt-40 px-6 py-2 rounded-lg shadow hover:bg-blue-700">Edit</button>
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
                    <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                      <tr>
                        <td class="px-4 py-3">Web Development</td>
                        <td class="px-4 py-3"><span
                                class="bg-green-100 text-green-600 px-3 py-1 rounded">Completed</span></td>
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
                                <div class="bg-purple-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-gray-600 text-xs">75%</span>
                        </td>
                        <td class="px-4 py-3 text-blue-600"><a href="#">Website</a></td>
                        <td class="px-4 py-3">2024-06-07</td>
                        <td class="px-4 py-3 space-x-2">
                            <button onclick="openModal()" class="text-blue-600"><i class="fa-solid fa-pen"></i></button>
                            <button class="text-red-600"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- Modal Background -->
                    <div id="editModal" class="fixed inset-0 bg-black/40 flex items-center justify-center hidden z-50">
                        <div class="bg-white w-full max-w-5xl rounded-xl shadow-lg p-6">

                            <!-- Header Row -->
                            <div class="grid grid-cols-6 gap-4 border-b pb-3">
                                <p class="font-semibold">Product</p>
                                <p class="font-semibold">Status</p>
                                <p class="font-semibold">Users</p>
                                <p class="font-semibold">Progress</p>
                                <p class="font-semibold">Preview</p>
                                <p class="font-semibold">Due Date</p>
                            </div>

                            <!-- Editable Row -->
                            <div class="grid grid-cols-6 gap-4 items-center py-3">
                                <div>Web Development</div>

                                <div>
                                    <select class="border rounded px-2 py-1">
                                        <option>Completed</option>
                                        <option>In Progress</option>
                                        <option>Pending</option>
                                    </select>
                                </div>

                                <div class="flex -space-x-2">
                                    <img class="w-8 h-8 rounded-full border" src="https://i.pravatar.cc/40?img=1">
                                    <img class="w-8 h-8 rounded-full border" src="https://i.pravatar.cc/40?img=2">
                                    <span
                                        class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-full text-sm">+2</span>
                                </div>

                                <div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-32 bg-gray-200 rounded-full h-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width:75%"></div>
                                        </div>
                                        <span class="text-sm">75%</span>
                                    </div>
                                </div>

                                <div>
                                    <a href="#" class="text-blue-600 hover:underline">Website</a>
                                </div>

                                <div>
                                    <input type="date" class="border rounded px-2 py-1" value="2024-06-07">
                                </div>
                            </div>

                            <!-- Project Detail -->
                            <div class="mt-4">
                                <label class="block text-sm font-semibold mb-1">Project Detail</label>
                                <textarea class="w-full border rounded-lg p-3 text-sm"
                                    rows="3">Project detail discussion</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-end gap-3 mt-6">
                                <button onclick="closeModal()"
                                    class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">Cancel</button>
                                <button class="px-4 py-2 rounded-lg bg-purple-600 text-white hover:bg-purple-700">Save
                                    Changes</button>
                            </div>

                        </div>
                    </div>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4 text-sm">
            <p>Showing 1-10 from 100</p>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-1 border rounded">Back</button>
                <button class="px-3 py-1 border rounded bg-blue-600 text-white">2</button>
                <button class="px-3 py-1 border rounded">3</button>
                <button class="px-3 py-1 border rounded">4</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>
        </div>
    </div>

    <!-- Footer Stats -->
    <div class="grid grid-cols-3 gap-6 mt-6">
        <div class="bg-white p-6 shadow rounded-lg">
            <p class="text-gray-600">Revenue</p>
            <h2 class="text-2xl font-bold">$500 <span class="text-green-600 text-sm">↑</span></h2>
            <p class="text-xs text-gray-500">10% more than previous month</p>
        </div>
        <div class="bg-white p-6 shadow rounded-lg">
            <p class="text-gray-600">Projects</p>
            <h2 class="text-2xl font-bold">5 <span class="text-red-600 text-sm">↓</span></h2>
            <p class="text-xs text-gray-500">10% less than previous month</p>
        </div>
        <div class="bg-white p-6 shadow rounded-lg flex flex-col items-center">
            <p class="text-gray-600 mb-2">Overall Progress</p>
            <div class="relative w-24 h-24">
                <svg class="w-24 h-24">
                    <circle cx="48" cy="48" r="40" stroke="gray" stroke-width="8" fill="none" class="opacity-20" />
                    <circle cx="48" cy="48" r="40" stroke="purple" stroke-width="8" fill="none" stroke-linecap="round"
                        stroke-dasharray="251" stroke-dashoffset="40" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center text-xl font-bold">84%</span>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
function openModal() {
    document.getElementById('editModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>
@endpush