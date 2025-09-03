@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class="max-w-7xl mx-auto p-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-600 to-blue-500 rounded-xl px-8 pt-8 pb-20 text-white shadow-md">
        <h1 class="text-2xl font-semibold">HR Admin Dashboard</h1>
        <p class="mt-2 text-sm text-gray-100">Manage employees, track attendance, and process payroll efficiently</p>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 -mt-10 px-2">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium text-gray-600">Total Employees</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2a3 3 0 00-5.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2a3 3 0 015.356-1.857M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mt-2">45</p>
            <p class="text-sm text-gray-500">Overall company employees</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium text-gray-600">Active Today</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mt-2">42</p>
            <p class="text-sm text-gray-500">42/45 employees present</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium text-gray-600">Total Hours Today</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mt-2">336h</p>
            <p class="text-sm text-gray-500">Across all employees</p>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-sm font-medium text-gray-600">Pending Leaves</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mt-2">2</p>
            <p class="text-sm text-gray-500">Require approval</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-10 bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex gap-32 p-4 bg-gray-50 border-b border-gray-200">
            <a href="#" id="emp-management-tab"
                class="tab-link px-5 py-2.5 rounded-lg text-gray-600 font-medium transition-all duration-300">
                Employee Management
            </a>
            <a href="#" id="leave-request-tab"
                class="tab-link px-5 py-2.5 rounded-lg text-gray-600 font-medium transition-all duration-300">
                Leave Request
            </a>
            <a href="#" id="attendance-detail-tab"
                class="tab-link px-5 py-2.5 rounded-lg text-gray-600 font-medium  transition-all duration-300">
                Attendance Detail
            </a>
            <a href="#" id="salary-management-tab"
                class="tab-link px-5 py-2.5 rounded-lg text-gray-600 font-medium  transition-all duration-300">
                Salary Management
            </a>
        </div>


        <div class="p-6">
            <div id="emp-management-content" class="content-section">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Employee Management</h2>
                        <p class="text-gray-500 mt-1">Monitor all employee attendance and status</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 md:mt-0">
                        <div class="relative">
                            <input type="text" placeholder="Search Employees..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                        <select
                            class="py-2 px-4 border border-gray-300 rounded-lg text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Select Department</option>
                            <option>Development</option>
                            <option>Design</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Department</th>
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6">Check In</th>
                                <th class="py-4 px-6">Check Out</th>
                                <th class="py-4 px-6">Today Hours</th>
                                <th class="py-4 px-6">Monthly Hours</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-6 text-gray-700">Ahmad Ali</td>
                                <td class="py-4 px-6 text-gray-700">Development</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">Checked
                                        in</span>
                                </td>
                                <td class="py-4 px-6 text-gray-700">09:00 AM</td>
                                <td class="py-4 px-6 text-gray-700">--</td>
                                <td class="py-4 px-6 text-gray-700">--</td>
                                <td class="py-4 px-6 text-gray-700">176h</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-700">Fatima Khan</td>
                                <td class="py-4 px-6 text-gray-700">Design</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">Checked
                                        out</span>
                                </td>
                                <td class="py-4 px-6 text-gray-700">09:00 AM</td>
                                <td class="py-4 px-6 text-gray-700">06:00 PM</td>
                                <td class="py-4 px-6 text-gray-700">8.5h</td>
                                <td class="py-4 px-6 text-gray-700">176h</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 text-gray-700">Fahad Basra</td>
                                <td class="py-4 px-6 text-gray-700">Marketing</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-600">Absent</span>
                                </td>
                                <td class="py-4 px-6 text-gray-700">--</td>
                                <td class="py-4 px-6 text-gray-700">--</td>
                                <td class="py-4 px-6 text-gray-700">--</td>
                                <td class="py-4 px-6 text-gray-700">176h</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="leave-request-content" class="content-section hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Leave Requests</h2>
                        <p class="text-gray-500 mt-1">Approve or reject employee leave requests</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 md:mt-0">
                        <div class="relative">
                            <input type="text" placeholder="Search Employees..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                <th class="py-4 px-6">Employee</th>
                                <th class="py-4 px-6">Start Date</th>
                                <th class="py-4 px-6">End Date</th>
                                <th class="py-4 px-6">Days</th>
                                <th class="py-4 px-6">Reason</th>
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-6 text-gray-700">Ahmad Ali</td>
                                <td class="py-4 px-6 text-gray-700">2024-08-25</td>
                                <td class="py-4 px-6 text-gray-700">2024-08-27</td>
                                <td class="py-4 px-6 text-gray-700">3 days</td>
                                <td class="py-4 px-6 text-gray-700">Family wedding</td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">Pending</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="p-2 rounded-full bg-green-500 text-white hover:bg-green-600 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                            </svg>
                                        </button>
                                        <button
                                            class="p-2 rounded-full bg-red-500 text-white hover:bg-red-600 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div id="attendance-detail-content" class="content-section hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">All Employees Attendance Details</h2>
                        <p class="text-gray-500 mt-1">View attendance records for all employees</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 md:mt-0">
                        <div class="flex items-center gap-3 mt-4 md:mt-0">
                            <div class="relative">
                                <input type="text" placeholder="Search Employees..."
                                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </div>

                            <!-- 👇 Select ki jagah ye date input -->
                            <input type="date" class="py-2 px-4 border border-gray-300 rounded-lg text-gray-600 
               focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64" />
                        </div>


                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                <th class="py-4 px-6">Date</th>
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Department</th>
                                <th class="py-4 px-6">Check In</th>
                                <th class="py-4 px-6">Check Out</th>
                                <th class="py-4 px-6">Total Hourse</th>
                                <th class="py-4 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-6 text-gray-700">2024-08-25</td>
                                <td class="py-4 px-6 text-gray-700">Ahmad Ali</td>
                                <td class="py-4 px-6 text-gray-700">Science</td>
                                <td class="py-4 px-6 text-gray-700">3 days</td>
                                <td class="py-4 px-6 text-gray-700">5 days</td>
                                <td class="py-4 px-6">
                                    8h
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">Pending</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="salary-management-content" class="content-section hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">Salary Management</h2>
                        <p class="text-gray-500 mt-1">Generate salary slips and manage payroll</p>
                    </div>
                    <div class="flex items-center gap-3 mt-4 md:mt-0">
                        <div class="relative">
                            <input type="text" placeholder="Search Employees..."
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full md:w-64">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-sm font-semibold uppercase tracking-wider">
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Department</th>
                                <th class="py-4 px-6">Base Salary</th>
                                <th class="py-4 px-6">Hourse Worked</th>
                                <th class="py-4 px-6">Deduction</th>
                                <th class="py-4 px-6">Final Salary</th>
                                <th class="py-4 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="py-4 px-6 text-gray-700">Ahmad Ali</td>
                                <td class="py-4 px-6 text-gray-700">Science</td>
                                <td class="py-4 px-6 text-gray-700">RS: 49,000</td>
                                <td class="py-4 px-6 text-gray-700">150hr/150hr</td>
                                <td class="py-4 px-6 text-red-700">-Rs. 0</td>
                                <td class="py-4 px-6">
                                    Rs: 60,000
                                </td>
                                <td class="py-4 px-6 cursor-pointer">
                                    <a id="openModal"
                                        class="inline-block px-3 py-2 text-sm font-semibold rounded-full bg-blue-100 text-blue-600 cursor-pointer">
                                        Generate Slip
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between p-6 border-t border-gray-200">
            <span class="text-sm text-gray-600">Showing 1-10 from 100</span>
            <div class="flex items-center gap-2">
                <a href="#"
                    class="text-gray-500 hover:text-gray-900 font-medium px-3 py-2 rounded-md transition-colors duration-200">Back</a>
                <a href="#"
                    class="px-3 py-2 text-gray-700 rounded-md hover:bg-gray-200 font-medium transition-colors duration-200">1</a>
                <a href="#" class="px-3 py-2 text-gray-700 rounded-md bg-gray-200 font-bold">2</a>
                <a href="#"
                    class="px-3 py-2 text-gray-700 rounded-md hover:bg-gray-200 font-medium transition-colors duration-200">3</a>
                <a href="#"
                    class="px-3 py-2 text-gray-700 rounded-md hover:bg-gray-200 font-medium transition-colors duration-200">4</a>
                <span class="text-gray-500">...</span>
                <a href="#"
                    class="px-3 py-2 text-gray-700 rounded-md hover:bg-gray-200 font-medium transition-colors duration-200">25</a>
                <a href="#"
                    class="text-gray-500 hover:text-gray-900 font-medium px-3 py-2 rounded-md transition-colors duration-200">Next</a>
            </div>
        </div>
    </div>
    <!-- Modal Background -->
    <div id="payslipModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">

        <!-- Modal Box -->
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl">

            <!-- Header -->
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h2 class="text-lg font-semibold">Employee Payslip</h2>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border rounded-md text-gray-600 text-sm">⬇ Download</button>
                    <button class="px-3 py-1 border rounded-md text-gray-600 text-sm">✉ Email</button>
                    <button id="closeModal" class="text-gray-600 text-lg font-bold">&times;</button>
                </div>
            </div>

            <!-- Banner -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-500 text-center py-6 text-white">
                <h1 class="text-xl font-bold">FRONXS Solution</h1>
                <p class="text-sm">Manage employees, track attendance, and process payroll efficiently</p>
            </div>

            <!-- Salary Slip Info -->
            <div class="px-6 py-4 grid grid-cols-2 text-sm border-b">
                <div>
                    <p class="font-medium">Salary Slip</p>
                    <p class="text-gray-600">Pay Period: August 2025</p>
                </div>
                <div class="text-right">
                    <p class="font-medium">Generated on</p>
                    <p class="text-gray-600">22/08/2025</p>
                </div>
            </div>

            <!-- Employee Info -->
            <div class="px-6 py-4 text-sm border-b space-y-1">
                <p><span class="font-medium">Employee Name:</span> Ahmad Khan</p>
                <p><span class="font-medium">Employee ID:</span> EMP-001</p>
                <p><span class="font-medium">Department:</span> Development</p>
                <p><span class="font-medium">Email:</span> ahmad@company.com</p>
            </div>

            <!-- Salary Breakdown -->
            <div class="px-6 py-4 text-sm">
                <h3 class="font-semibold mb-3">Salary Breakdown</h3>
                <div class="flex justify-between"><span>Basic Salary:</span><span>Rs. 75,000</span></div>
                <div class="flex justify-between"><span>Expected Hours:</span><span>160 hours</span></div>
                <div class="flex justify-between"><span>Actual Hours Worked:</span><span class="text-red-500">8
                        hours</span></div>
                <div class="flex justify-between"><span>Deduction:</span><span class="text-red-500">- Rs. 3,750</span>
                </div>

                <div class="flex justify-between font-bold text-lg mt-3">
                    <span>Net Salary:</span>
                    <span class="text-green-600">Rs. 71,250</span>
                </div>

                <span class="inline-block mt-3 px-3 py-1 bg-red-100 text-red-600 rounded-md text-xs font-medium">
                    Deduction Applied
                </span>

                <p class="text-gray-600 text-xs mt-2">
                    Salary has been adjusted due to 8 hours shortage from expected working hours.
                </p>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 text-center text-xs text-gray-500 py-4 px-6">
                This is a computer-generated payslip and does not require a signature.<br>
                For any queries, please contact HR Department at <span
                    class="text-blue-600">hr@fronxsolution.com</span><br>
                © 2025 Fronx Solution. All rights reserved.
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-link');
    const sections = document.querySelectorAll('.content-section');
    const defaultTabClasses = 'text-gray-600 hover:bg-gray-100';
    const activeTabClasses = 'bg-blue-500 text-white shadow-md';

    function setActiveTab(activeTab) {
        tabs.forEach(tab => {
            tab.classList.remove(...activeTabClasses.split(' '));
            tab.classList.add(...defaultTabClasses.split(' '));
        });
        activeTab.classList.remove(...defaultTabClasses.split(' '));
        activeTab.classList.add(...activeTabClasses.split(' '));
    }

    function showSection(sectionId) {
        sections.forEach(section => {
            section.classList.add('hidden');
        });
        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.classList.remove('hidden');
        }
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            setActiveTab(e.currentTarget);
            const targetId = e.currentTarget.id.replace('-tab', '-content');
            showSection(targetId);
        });
    });

    // Set the first tab and its content to be active by default
    const firstTab = document.querySelector('#emp-management-tab');
    if (firstTab) {
        const firstSectionId = firstTab.id.replace('-tab', '-content');
        setActiveTab(firstTab);
        showSection(firstSectionId);
    }
});
</script>

<script>
const modal = document.getElementById("payslipModal");
const openModal = document.getElementById("openModal");
const closeModal = document.getElementById("closeModal");

openModal.addEventListener("click", () => modal.classList.remove("hidden"));
closeModal.addEventListener("click", () => modal.classList.add("hidden"));
</script>
@endpush