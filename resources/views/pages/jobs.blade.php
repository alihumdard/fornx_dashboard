@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<!-- Jobs Section -->
<div class="max-w-7xl mx-auto  mt-12 sm:mt-0">

    <!-- Header Stats -->
    <h1 class="text-2xl font-semibold mb-4">Jobs</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Job Posts -->
        <div class="bg-white shadow rounded-xl p-5 gap-4">
            <!-- Icon -->
            <div class="">
                <i class="fas fa-briefcase text-2xl p-3 bg-purple-100 text-purple-600 rounded-lg"></i>
            </div>

            <!-- Text -->
            <div class="pt-5 pl-1">
                <p class="text-gray-500 text-sm ">Job Posts</p>
                <p class="text-xl font-bold">60</p>
            </div>
        </div>


        <!-- Total Applications -->
        <div class="bg-white shadow rounded-xl p-5 gap-4">
            <div class="">
                <i class="fas fa-file-alt text-2xl p-3 bg-orange-100 text-orange-600 rounded-lg"></i>
            </div>
            <div class="pt-5 pl-1">
                <p class="text-gray-500 text-sm">Total Applications</p>
                <p class="text-xl font-bold">252</p>
            </div>
        </div>

        <!-- Shortlisted -->
        <div class="bg-white shadow rounded-xl p-5 gap-4">
            <div class="">
                <i class="fas fa-bookmark text-2xl p-3 bg-blue-100 text-blue-600 rounded-lg"></i>
            </div>
            <div class="pt-5 pl-1">
                <p class="text-gray-500 text-sm">Shortlisted</p>
                <p class="text-xl font-bold">15</p>
            </div>
        </div>

        <!-- Interviews -->
        <div class="bg-white shadow rounded-xl p-5 gap-4">
            <div class="">
                <i class="fas fa-comments text-2xl p-3 bg-yellow-100 text-yellow-600 rounded-lg"></i>
            </div>
            <div class="pt-5 pl-1">
                <p class="text-gray-500 text-sm">Interview</p>
                <p class="text-xl font-bold">10</p>
            </div>
        </div>

    </div>

    <!-- Recent Job Posts -->
    <div class="bg-white shadow rounded-xl p-6 ">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold">Recent Job Posts</h2>
            <div id="filterButtons" class="flex bg-gray-100 rounded-full p-2">
                <button data-filter="monthly" class="px-4 py-1 text-md] rounded-full transition">Monthly</button>
                <button data-filter="weekly" class="px-10 mx-5 py-1 text-md rounded-full transition">Weekly</button>
                <button data-filter="today"
                    class="px-4 py-1 text-md rounded-full transition bg-gradient-to-r from-purple-500 to-blue-500 text-white shadow">
                    Today
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-600 text-sm border-b">
                        <th class="py-3 px-4">Job Title</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Openings</th>
                        <th class="py-3 px-4">Applications</th>
                        <th class="py-3 px-4">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    <tr class="border-b">
                        <td class="py-3 px-4">UI UX Designer</td>
                        <td class="py-3 px-4">Full Time</td>
                        <td class="py-3 px-4">12</td>
                        <td class="py-3 px-4">135</td>
                        <td class="py-3 px-4"><span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">Full Stack Dev</td>
                        <td class="py-3 px-4">Full Time</td>
                        <td class="py-3 px-4">08</td>
                        <td class="py-3 px-4">100</td>
                        <td class="py-3 px-4"><span
                                class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Inactive</span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">DevOps</td>
                        <td class="py-3 px-4">Internship</td>
                        <td class="py-3 px-4">12</td>
                        <td class="py-3 px-4">05</td>
                        <td class="py-3 px-4"><span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3 px-4">Android Dev</td>
                        <td class="py-3 px-4">Full Time</td>
                        <td class="py-3 px-4">04</td>
                        <td class="py-3 px-4">45</td>
                        <td class="py-3 px-4"><span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4">IOS Developer</td>
                        <td class="py-3 px-4">Full Time</td>
                        <td class="py-3 px-4">18</td>
                        <td class="py-3 px-4">96</td>
                        <td class="py-3 px-4"><span
                                class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">Inactive</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const buttons = document.querySelectorAll('#filterButtons button');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Reset all buttons
        buttons.forEach(b => {
          b.classList.remove("bg-gradient-to-r", "from-purple-500", "to-blue-500", "text-white", "shadow");
          b.classList.add("hover:bg-white");
        });

        // Set active button
        btn.classList.remove("hover:bg-white");
        btn.classList.add("bg-gradient-to-r", "from-purple-500", "to-blue-500", "text-white", "shadow");

        // For demo: just log the active filter
        console.log("Active Tab:", btn.dataset.filter);
      });
    });
  </script>
@endpush