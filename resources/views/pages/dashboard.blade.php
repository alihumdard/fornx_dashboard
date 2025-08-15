<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Custom styles for responsive behavior */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (max-width: 1023px) {
            .sidebar-mobile {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 50;
                transform: translateX(-100%);
            }
            
            .sidebar-mobile.active {
                transform: translateX(0);
            }
        }
        
        /* For horizontal scrolling on small screens */
        .overflow-x-auto {
            -webkit-overflow-scrolling: touch;
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-transition sidebar-mobile w-64 pt-20 bg-black text-white flex flex-col lg:static lg:transform-none">
            <!-- Create new project button -->
            <div class="p-4">
                <button class="w-full bg-gradient-to-r from-purple-500 to-blue-500 text-white py-3 px-4 rounded-xl flex items-center justify-center gap-2 font-medium">
                    <span class="text-3xl text-blue-600 rounded-lg bg-white px-2 py-1">＋</span> Create new project
                </button>
            </div>
            <!-- Menu -->
            <nav class="flex-1 px-3 space-y-2 text-sm overflow-y-auto">
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-white text-blue-600 mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8h7V3H3v5zM14 8h7V3h-7v5zM14 21h7v-5h-7v5zM3 21h7v-5H3v5z" />
                    </svg>
                    Dashboard
                </a>
                <div>
                    <!-- Pages Link -->
                    <div>
                        <button id="pages-toggle" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                            Pages
                            <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Items -->
                        <div id="pages-dropdown" class="hidden pl-10 mt-1 space-y-1">
                            <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 1</a>
                            <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 2</a>
                            <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 3</a>
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="toggleDropdown('transactionDropdown1', 'arrowIcon1')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                        Transaction
                        <svg id="arrowIcon1" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="transactionDropdown1" class="hidden ml-8 mt-1 space-y-1">
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Transaction 1</a>
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Transaction 2</a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleDropdown('usersDropdown', 'arrow-users')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Users
                        <svg id="arrow-users" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="usersDropdown" class="hidden ml-8 mt-1 space-y-1">
                        <a href="#" class="block p-2 rounded hover:bg-white/10">All users</a>
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Add new users</a>
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Profile</a>
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Teams</a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleDropdown('ClientsDropdown', 'arrow-Clients')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Clients
                        <svg id="arrow-Clients" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="ClientsDropdown" class="hidden ml-8 mt-1 space-y-1">
                        <a href="#" class="block p-2 rounded hover:bg-white/10">All Clients</a>
                        <a href="#" class="block p-2 rounded hover:bg-white/10">Add new Clients</a>
                    </div>
                </div>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 6h6m-6-12h6" />
                    </svg>
                    Resource mgmt
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 16h10" />
                    </svg>
                    Project template
                </a>
                <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15l-4-4m0 0l4-4m-4 4h12" />
                    </svg>
                    Menu settings
                </a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-6">
            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <div class="flex items-center">
                    <!-- Mobile menu button -->
                    <button id="menu-toggle" class="mr-4 lg:hidden text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-2xl lg:text-3xl font-bold">Dashboard</h1>
                </div>
                
                <div class="flex items-center gap-2 lg:gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Search for anything..." class="border border-gray-300 rounded-lg pl-8 lg:pl-10 pr-4 py-2 w-40 lg:w-72 text-sm focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 lg:w-5 lg:h-5 absolute left-2 lg:left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z" />
                        </svg>
                    </div>
                    <div class="border p-1 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 lg:w-6 lg:h-6">
                            <title>Bell</title>
                            <path d="M15 17h5l-1.5-1.5a6.5 6.5 0 0 1-1.9-4.6V10a5.6 5.6 0 1 0-11.2 0v.9c0 1.7-.7 3.3-1.9 4.6L2 17h5" />
                            <path d="M9.5 17a2.5 2.5 0 0 0 5 0" />
                        </svg>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:w-6 lg:h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405M4 4h16v12H4z" />
                    </svg>
                    <div class="flex items-center gap-2">
                        <img src="https://via.placeholder.com/40" class="rounded-full w-8 h-8 lg:w-10 lg:h-10" alt="">
                        <div class="hidden md:block">
                            <p class="font-semibold text-sm">Alex meian</p>
                            <p class="text-xs text-gray-500">Admin</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
            
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
                    <!-- Project Summary Table -->
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
                    <!-- Left Section: Today Task -->
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
        </main>
    </div>

    <script>
        // Toggle sidebar on mobile
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (event) => {
            if (window.innerWidth < 1024 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Pages dropdown toggle
        const toggleBtn = document.getElementById('pages-toggle');
        const dropdown = document.getElementById('pages-dropdown');
        const arrowIcon = document.getElementById('arrow-icon');
        
        toggleBtn.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            arrowIcon.classList.toggle('rotate-180');
        });
        
        // Generic dropdown toggle function
        function toggleDropdown(dropdownId, arrowId) {
            const dropdown = document.getElementById(dropdownId);
            const arrow = document.getElementById(arrowId);
            dropdown.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        }
        
        // Set progress ring to 72%
        document.addEventListener('DOMContentLoaded', function() {
            const circle = document.querySelector('.progress-ring__circle');
            if (circle) {
                const radius = circle.r.baseVal.value;
                const circumference = radius * 2 * Math.PI;
                
                circle.style.strokeDasharray = `${circumference} ${circumference}`;
                circle.style.strokeDashoffset = circumference;
                
                const offset = circumference - 72 / 100 * circumference;
                circle.style.strokeDashoffset = offset;
            }
        });
    </script>
</body>
</html>