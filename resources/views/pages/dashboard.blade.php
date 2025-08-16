@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')
<!-- Overview Cards -->
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 lg:mb-8">
        <h1 class="text-2xl lg:text-3xl text-gray-900 mb-4 md:mb-0">overview</h1>
        <div>
            <select class="border p-2 text-sm w-full md:w-auto" name="text" id="">
                <option value="">last 30 days</option>
                <option value="">last 10 days</option>
                <option value="">last 5 days</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        <!-- Revenue Card -->
        <div class="bg-white rounded-xl shadow-md p-4 lg:p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-lg" style="background-color: #DBEAFE;">
                    <i class="fas fa-dollar-sign text-xl" style="color: #2563EB;"></i>
                </div>
            </div>
            <div class="mb-2">
                <span class="text-sm font-medium text-gray-500">Total Revenue</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">$32,450</h3>
            </div>
            <div class="flex items-center">
                <span class="flex items-center mr-2" style="color: #10B981;">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>12.5%</span>
                </span>
                <span class="text-xs lg:text-sm text-gray-500">from last month</span>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="bg-white rounded-xl shadow-md p-4 lg:p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-lg" style="background-color: #D1FAE5;">
                    <i class="fas fa-users text-xl" style="color: #10B981;"></i>
                </div>
            </div>
            <div class="mb-2">
                <span class="text-sm font-medium text-gray-500">Projects</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">1,250</h3>
            </div>
            <div class="flex items-center">
                <span class="flex items-center mr-2" style="color: #10B981;">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>8.2%</span>
                </span>
                <span class="text-xs lg:text-sm text-gray-500">from last month</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white rounded-xl shadow-md p-4 lg:p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-lg" style="background-color: #EDE9FE;">
                    <i class="fas fa-shopping-cart text-xl" style="color: #8B5CF6;"></i>
                </div>
            </div>
            <div class="mb-2">
                <span class="text-sm font-medium text-gray-500">Time spents</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">456</h3>
            </div>
            <div class="flex items-center">
                <span class="flex items-center mr-2" style="color: #EF4444;">
                    <i class="fas fa-arrow-down mr-1"></i>
                    <span>3.1%</span>
                </span>
                <span class="text-xs lg:text-sm text-gray-500">from last month</span>
            </div>
        </div>

        <!-- Growth Card -->
        <div class="bg-white rounded-xl shadow-md p-4 lg:p-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 rounded-lg" style="background-color: #FEF3C7;">
                    <i class="fas fa-chart-line text-xl" style="color: #F59E0B;"></i>
                </div>
            </div>
            <div class="mb-2">
                <span class="text-sm font-medium text-gray-500">Resources</span>
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">24.3%</h3>
            </div>
            <div class="flex items-center">
                <span class="flex items-center mr-2" style="color: #10B981;">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>5.7%</span>
                </span>
                <span class="text-xs lg:text-sm text-gray-500">from last month</span>
            </div>
        </div>
    </div>
</div>

<!-- Project Summary & Progress -->
<div class="max-w-7xl mx-auto mt-6 lg:mt-10">
    <h1 class="text-xl lg:text-2xl font-bold text-gray-800 mb-4 lg:mb-6">Project Dashboard</h1>
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-7/12 bg-white rounded-lg shadow-md p-4 lg:p-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                <h2 class="text-lg lg:text-xl font-semibold text-gray-800 mb-3 md:mb-0">Project Summary</h2>
                <div class="flex flex-wrap gap-2">
                    <select class="border p-1 text-sm">
                        <option value="text">project</option>
                    </select>
                    <select class="border p-1 text-sm">
                        <option value="text">project manger</option>
                    </select>
                    <select class="border p-1 text-sm">
                        <option value="text">Status</option>
                    </select>
                </div>
            </div>
            <div class="overflow-x-auto custom-scrollbar">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Manager</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Nelsa web development</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Zain Ahmad</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">May 25, 2023</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">100%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Datascale AI app</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Sami Khan</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Jun 20, 2023</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Delayed</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 35%"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">35%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Cloud Migration</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Alex Johnson</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Jul 15, 2023</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 65%"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">65%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Mobile App Redesign</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Maria Garcia</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Aug 1, 2023</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">45%</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Security Audit</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">David Chen</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Jun 30, 2023</td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">100%</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Overall Progress Dashboard -->
        <div class="w-full lg:w-5/12 bg-white rounded-lg shadow-md p-4 lg:p-6">
            <h2 class="text-lg lg:text-xl font-semibold text-gray-800 mb-4">Overall Progress</h2>
            <!-- Circular Progress Indicator -->
            <div class="flex justify-center my-6">
                <div class="relative w-40 h-40 lg:w-48 lg:h-48">
                    <svg class="progress-ring w-full h-full" viewBox="0 0 120 120">
                        <!-- Background circle -->
                        <circle cx="60" cy="60" r="54" fill="none" stroke="#e5e7eb" stroke-width="8" />
                        <!-- Progress circle -->
                        <circle class="progress-ring__circle" cx="60" cy="60" r="54" fill="none" stroke="#3b82f6" stroke-width="8" stroke-linecap="round" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl lg:text-4xl font-bold text-gray-800">72%</span>
                        <span class="text-xs lg:text-sm text-gray-500">Completion Rate</span>
                    </div>
                </div>
            </div>
            <!-- Project Statistics -->
            <div class="mt-6 lg:mt-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4 text-center">
                    <div class="rounded-lg">
                        <p class="text-xl lg:text-2xl font-bold text-gray-800">95</p>
                        <p class="text-xs lg:text-sm text-gray-500">Total Projects</p>
                    </div>
                    <div class="rounded-lg">
                        <p class="text-xl lg:text-2xl font-bold text-green-700">26</p>
                        <p class="text-xs lg:text-sm text-green-700">Completed</p>
                    </div>
                    <div class="rounded-lg">
                        <p class="text-xl lg:text-2xl font-bold text-red-700">35</p>
                        <p class="text-xs lg:text-sm text-red-700">Delayed</p>
                    </div>
                    <div class="rounded-lg">
                        <p class="text-xl lg:text-2xl font-bold text-blue-700">35</p>
                        <p class="text-xs lg:text-sm text-blue-700">In Progress</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Today Task & Workload -->
<div class="max-w-7xl mx-auto mt-6 lg:mt-10 mb-10">
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-1/2 bg-white rounded-lg shadow-md p-4 lg:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 lg:mb-6">
                <h2 class="text-lg lg:text-xl font-bold text-gray-800 mb-3 sm:mb-0">Today task</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-blue-500 text-white rounded-md text-sm font-medium">All 10</button>
                    <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md text-sm font-medium">Important</button>
                </div>
            </div>
            <div class="space-y-4 overflow-y-auto max-h-96">
                <!-- Task 1 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Create landing page design</p>
                            <p class="text-xs text-gray-500">Due: Today</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Approved</span>
                </div>
                <!-- Task 2 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Update user documentation</p>
                            <p class="text-xs text-gray-500">Due: Tomorrow</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">In review</span>
                </div>
                <!-- Task 3 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Fix responsive issues</p>
                            <p class="text-xs text-gray-500">Due: May 20</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">On going</span>
                </div>
                <!-- Task 4 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Prepare project report</p>
                            <p class="text-xs text-gray-500">Due: Today</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">Approved</span>
                </div>
                <!-- Task 5 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Client meeting preparation</p>
                            <p class="text-xs text-gray-500">Due: May 22</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">In review</span>
                </div>
                <!-- Task 6 -->
                <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Database optimization</p>
                            <p class="text-xs text-gray-500">Due: May 25</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-full">On going</span>
                </div>
            </div>
        </div>

        <!-- Right Section: Projects Workload -->
        <div class="w-full lg:w-1/2 bg-white rounded-lg shadow-md p-4 lg:p-6">
            <div class="mb-4 lg:mb-6">
                <h2 class="text-lg lg:text-xl font-bold text-gray-800">Projects Workload</h2>
                <p class="text-sm text-gray-500">Last 3 months</p>
            </div>
            <!-- Vertical Bar Chart -->
            <div class="flex items-end justify-between h-48 lg:h-64 mb-4 lg:mb-6 overflow-x-auto custom-scrollbar">
                <!-- Zain -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-28 lg:h-32">
                        <div class="w-full bg-blue-600 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Zain</div>
                </div>
                <!-- Sami -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-24 lg:h-28">
                        <div class="w-full bg-green-600 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Sami</div>
                </div>
                <!-- Salman -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-36 lg:h-40">
                        <div class="w-full bg-purple-600 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Salman</div>
                </div>
                <!-- Ahmed -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-20 lg:h-24">
                        <div class="w-full bg-yellow-500 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Ahmed</div>
                </div>
                <!-- Fatima -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-32 lg:h-36">
                        <div class="w-full bg-red-500 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Fatima</div>
                </div>
                <!-- Omar -->
                <div class="flex flex-col items-center w-1/6 min-w-[60px]">
                    <div class="text-sm font-medium text-gray-700 mb-1">10</div>
                    <div class="w-[60%] bg-gray-200 rounded-t h-28 lg:h-32">
                        <div class="w-full bg-indigo-600 rounded-t" style="height: 100%"></div>
                    </div>
                    <div class="text-sm font-medium text-gray-700 mt-2">Omar</div>
                </div>
            </div>
            <!-- Chart Legend -->
            <div class="flex flex-wrap gap-2 mt-4 lg:mt-6">
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-blue-600 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Zain</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-600 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Sami</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-purple-600 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Salman</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-yellow-500 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Ahmed</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-red-500 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Fatima</span>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-indigo-600 rounded-full mr-1"></div>
                    <span class="text-xs text-gray-600">Omar</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
    
</script>
@endpush